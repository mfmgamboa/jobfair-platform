<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use App\Events\MessageSent;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Show all messages for the logged-in user.
     */
    public function index()
    {
        $user = Auth::user();

        // Get users they've messaged with
        $contacts = User::where('id', '!=', $user->id)->get();

        return view('messages.index', compact('contacts'));
    }

    /**
     * Store a new message and broadcast it.
     */
    public function store(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'body' => 'required|string|max:1000',
        ]);

        $sender = Auth::user();

        $message = Message::create([
            'sender_id' => $sender->id,
            'receiver_id' => $request->receiver_id,
            'body' => $request->body,
        ]);

        broadcast(new MessageSent($message, $sender))->toOthers();

        return response()->json(['message' => 'Message sent!', 'data' => $message]);
    }
}
