<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Model\Agent;

class BirthdayEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $data;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Agent $data)
    {
        $this->data = $data;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        //return new Channel('birthday-channel');
        return ['birthday-channel.'.$this->data->id, 'birthday-channel'];
    }

    public function broadcastWith()
    {
        return [
            'users_id' => $this->data->users_id,
            'birthday' => $this->data->birthday,
            'fullname' => $this->data->salutation.' '.$this->data->first_name.' '.$this->data->middle_name.' '.$this->data->last_name,
        ];
    }
}
