<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Events\MessageSent;

class ChatController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $contacts = $user->hasRole('employer') 
            ? $user->receivedApplications()->with('jobseeker')->get()->pluck('jobseeker')
            : $user->applications()->with('employer')->get()->pluck('employer');

        return response()->json($contacts);
    }

    public function fetchMessages(User $user)
    {
        $authUserId = Auth::id();

        $messages = Message::where(function ($q) use ($user, $authUserId) {
                $q->where('from_id', $authUserId)->where('to_id', $user->id);
            })->orWhere(function ($q) use ($user, $authUserId) {
                $q->where('from_id', $user->id)->where('to_id', $authUserId);
            })
            ->orderBy('created_at', 'asc')
            ->get();

        return response()->json($messages);
    }

    public function sendMessage(Request $request)
    {
        $message = Message::create([
            'from_id' => Auth::id(),
            'to_id' => $request->to_id,
            'message' => $request->message,
        ]);

        broadcast(new MessageSent($message))->toOthers();

        return response()->json($message);
    }
}
