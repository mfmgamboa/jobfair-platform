<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Chat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ChatController extends Controller
{
    // View for testing (not required if you're using Vue only)
    public function index()
    {
        return view('chat.index');
    }

    // Fetch all messages between the current user and receiver
    public function fetchMessages($receiverId)
    {
        $userId = Auth::id();

        $messages = Chat::where(function ($query) use ($userId, $receiverId) {
            $query->where('sender_id', $userId)
                  ->where('receiver_id', $receiverId);
        })->orWhere(function ($query) use ($userId, $receiverId) {
            $query->where('sender_id', $receiverId)
                  ->where('receiver_id', $userId);
        })->orderBy('created_at', 'asc')->get();

        return response()->json($messages);
    }

    // Send message from current user to receiver
    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
            'receiver_id' => 'required|exists:users,id',
        ]);

        try {
            $chat = Chat::create([
                'sender_id' => Auth::id(),
                'receiver_id' => $request->receiver_id,
                'message' => $request->message,
            ]);

            Log::info('Message sent:', $chat->toArray());

            return response()->json(['success' => true, 'chat' => $chat], 201);
        } catch (\Exception $e) {
            Log::error('Chat send error:', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Failed to send message'], 500);
        }
    }

    // Return recent conversation partners (grouped by other user)
    public function recentConversations()
    {
        $userId = Auth::id();

        $chats = Chat::where('sender_id', $userId)
            ->orWhere('receiver_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get();

        // Group by the other participant
        $conversations = $chats->groupBy(function ($chat) use ($userId) {
            return $chat->sender_id === $userId ? $chat->receiver_id : $chat->sender_id;
        });

        return response()->json($conversations);
    }

    // Used by FloatingChat to get the name of the recipient
    public function recipientName($receiverId)
    {
        $user = User::find($receiverId);
        return response()->json(['name' => $user?->name ?? 'Unknown']);
    }
}
