<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use App\Events\MessageSent;

class MessageController extends Controller
{
    /**
     * Show all conversations for the authenticated user.
     */
    public function index()
    {
        $user = Auth::user();

        // Only fetch users they’re allowed to message based on role
        if ($user->hasRole('employer')) {
            $messages = Message::where('sender_id', $user->id)
                ->orWhere('receiver_id', $user->id)
                ->with('sender', 'receiver')
                ->latest()
                ->get();
        } elseif ($user->hasRole('jobseeker')) {
            $messages = Message::where('sender_id', $user->id)
                ->orWhere('receiver_id', $user->id)
                ->with('sender', 'receiver')
                ->latest()
                ->get();
        } else {
            $messages = collect(); // No access for other roles
        }

        return response()->json($messages);
    }

    /**
     * Store and broadcast a new message.
     */
    public function store(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'message' => 'required|string|max:1000',
        ]);

        $sender = Auth::user();
        $receiver = User::findOrFail($request->receiver_id);

        // Role-based access control
        if ($sender->hasRole('jobseeker') && !$receiver->hasRole('employer')) {
            return response()->json(['error' => 'Unauthorized.'], 403);
        }

        if ($sender->hasRole('employer') && !$receiver->hasRole('jobseeker')) {
            return response()->json(['error' => 'Unauthorized.'], 403);
        }

        $message = Message::create([
            'sender_id' => $sender->id,
            'receiver_id' => $receiver->id,
            'message' => $request->message,
        ]);

        broadcast(new MessageSent($message))->toOthers();

        return response()->json($message);
    }
}
