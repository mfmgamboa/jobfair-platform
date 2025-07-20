<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Message;
use Illuminate\Support\Facades\Broadcast;
use App\Models\User;

class ChatController extends Controller
{
    /**
     * Fetch latest 50 messages (for testing or general chat).
     */
    public function index()
    {
        $messages = Message::with('user')
            ->latest()
            ->take(50)
            ->get()
            ->reverse();

        return response()->json($messages);
    }

    /**
     * Send a new message to a specific user.
     */
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'body' => 'required|string|max:1000',
            'receiver_id' => 'required|exists:users,id'
        ]);

        // Create the message
        $message = Message::create([
            'user_id' => Auth::id(),
            'receiver_id' => $request->receiver_id,
            'body' => $request->body
        ]);

        // Load relationships
        $message->load('user');

        // Get the sender
        $sender = Auth::user();

        // Broadcast to the receiver's private channel
        broadcast(new \App\Events\MessageSent($message, $sender))->toOthers();

        // Return message with sender info
        return response()->json([
            'message' => $message,
            'sender' => $sender
        ]);
    }
}