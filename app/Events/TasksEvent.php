<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Model\Account\Task;

class TasksEvent implements ShouldBroadcast
{ 
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $task;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Task $task)
    {
        // Task $task
        $this->task = $task;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        //return new Channel('tasks-channel');
        return ['tasks-channel.'.$this->task->id, 'tasks-channel'];
    }

    public function broadcastWith()
    {
        return [
            'users_id' => $this->task->users_id,
            'subject' => $this->task->subject,
            'due_date' => $this->task->due_date,
        ];
    }
}
