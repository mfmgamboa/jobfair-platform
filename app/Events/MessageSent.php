<?php

namespace App\Events;

use App\Models\Message;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class MessageSent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $sender;

    /**
     * Create a new event instance.
     */
    public function __construct(Message $message, User $sender)
    {
        $this->message = $message->load('sender'); // Make sure sender is loaded
        $this->sender = $sender;
    }

    /**
     * Get the channels the event should broadcast on.
     */
    public function broadcastOn(): Channel
    {
        // Broadcast to the receiver's private channel
        return new Channel('chat.' . $this->message->receiver_id);
    }

    /**
     * The event's broadcast name.
     */
    public function broadcastAs(): string
    {
        return 'message.sent';
    }

    /**
     * The data to broadcast.
     */
    public function broadcastWith(): array
    {
        return [
            'id'          => $this->message->id,
            'body'        => $this->message->body,
            'sender_id'   => $this->sender->id,
            'receiver_id' => $this->message->receiver_id,
            'created_at'  => $this->message->created_at->toDateTimeString(),
            'sender' => [
                'id' => $this->sender->id,
                'name' => $this->sender->name,
            ],
            'is_read' => false
        ];
    }
}