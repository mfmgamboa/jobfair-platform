<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TestMessageEvent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;

    /**
     * Create a new event instance.
     */
    public function __construct($message = 'Hello from Laravel + Pusher!')
    {
        $this->message = $message;
    }

    /**
     * The name of the channel the event should broadcast on.
     */
    public function broadcastOn()
    {
        return new Channel('my-channel'); // Must match frontend
    }

    /**
     * The name of the event.
     */
    public function broadcastAs()
    {
        return 'my-event'; // Must match frontend
    }

    /**
     * The data to broadcast.
     */
    public function broadcastWith()
    {
        return [
            'message' => $this->message
        ];
    }
}
