<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Events\ChatMessageSent;

class ChatController extends Controller
{
    public function sendMessage(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'message' => 'required|string|max:1000',
        ]);

        $sender = auth()->user();
        $receiver = User::findOrFail($request->receiver_id);
        $message = $request->message;

        // Broadcast the event
        broadcast(new ChatMessageSent($sender, $receiver, $message))->toOthers();

        return response()->json([
            'status' => 'Message sent!',
        ]);
    }
}
