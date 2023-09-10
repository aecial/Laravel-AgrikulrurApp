<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewMessageEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public $message;
    public $channel;
    public $bidder;
    public function __construct($messages, $channel, $bidder)
    {
        $this->message = $messages;
        $this->channel = $channel;
        $this->bidder = $bidder;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastAs(): string
    {
        return 'recieve.message';
    }
    public function broadcastWith(): array
    {
        return [
            'message' => $this->message,
            'bidder' => $this->bidder,
            //'user' => auth()->user()->name,
        ];
    }
        public function broadcastOn():array
    {
        return [
            new Channel('chat'.$this->channel),
        ];
    }
}
