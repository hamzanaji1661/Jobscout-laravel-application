<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Employee;
use App\Models\Message;
use App\Models\Conversation;
use Illuminate\Support\Facades\Auth;


class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $message;
    public $conversation;
    public $receiver;

    public function mount(Employee $user, Message $message, Conversation $conversation, Employee $receiver)
    {
        $this->user = $user;
        $this->message = $message;
        $this->conversation = $conversation;
        $this->receiver = $receiver;
    }
   
    public function broadcastWith()
    {
        return [
            'user_id' => $this->user->id,
            'message' => $this->message->id,
            'conversation_id' => $this->conversation->id,
            'recipient_id' => $this->receiver->id,
        ];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        error_log($this->user);
        error_log($this->receiver);
       // dd($this->receiver);
        return new PrivateChannel('chat.' .$this->receiver->id);
    }
}
