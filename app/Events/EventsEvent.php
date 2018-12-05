<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Model\Account\Event;

class EventsEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $event;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Event $event)
    {
        $this->event = $event;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        //return new Channel('events-channel');
        return ['events-channel.'.$this->event->id, 'events-channel'];
    }

    public function broadcastWith()
    {
        return [
            'users_id' => $this->event->users_id,
            'subject' => $this->event->subject,
            'description' => $this->event->description,
            'start' => $this->event->start,
            'end' => $this->event->end,
        ];
    }
}
