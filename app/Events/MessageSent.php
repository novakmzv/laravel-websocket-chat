<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public string $message;
    public string $user;
    public string $timestamp;

    /**
     * Create a new event instance.
     */
    public function __construct(string $message, string $user)
    {
        $this->message = $message;
        $this->user = $user;
        $this->timestamp = now();
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('chat')
        ];
    }

    public function broadcastWith(): array
    {
        return [
            'message' => $this->message,
            'user' => $this->user,
            'timestamp' => $this->timestamp,
        ];
    }
}
