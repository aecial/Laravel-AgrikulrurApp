<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class notifier implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public $auction_id;
    public $crop_id;
    public $creator_id;
    //public $toUser;
    public function __construct($auction_id, $crop_id, $creator_id)
    {
        $this->auction_id = $auction_id;
        $this->crop_id = $crop_id;
        $this->creator_id = $creator_id;
        //$this->toUser = $toUser;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastAs(): string
    {
        return 'notifier.message';
    }
    public function broadcastWith(): array
    {
        return [
            'auction' => $this->auction_id,
            'crop' => $this->crop_id,
            'creator' => $this->creator_id
            //'user' => auth()->user()->name,
        ];
    }
        public function broadcastOn():array
    {
        return [
            new Channel('notification'),
        ];
    }
}
