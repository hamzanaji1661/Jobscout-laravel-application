<?php

namespace App\Http\Livewire\Chat;

use Livewire\Component;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\Employee;
use App\Events\MessageSent;


class SendMessage extends Component
{

    public $receiverInstance;
    public $selectedConversation;
    public $body;
    public $user_id;
    public $createdMessage;

    protected $listeners = ['updateSendMessage', 'dispatchMessageSent'];

     function updateSendMessage(Conversation $conversation, Employee $receiver)
    {
        $this->selectedConversation = $conversation;
        $this->receiverInstance = $receiver;
    }


    public function mount()
    {
        $this->user_id = auth()->user()->id;
    }

    public function sendMessage(){
        //dd($this->body);

        if($this->body == null){
            return null;
        }

        $this->createdMessage = Message::create([
            'conversation_id' => $this->selectedConversation->id,
            'sender_id' => $this->user_id,
            'recipient_id' => $this->receiverInstance->id,
            'body' => $this->body,
        ]);

        $this->selectedConversation->last_message_at = $this->createdMessage->created_at;
        $this->selectedConversation->save();

        $this->emitTo('chat.chatbox', 'pushMessage', $this->createdMessage->id);

        $this->emitTo('chat.chat-list', 'refresh');

        $this->reset('body');

        //$this->emitSelf('dispatchMessageSent');


    }

    // public function dispatchMessageSent()
    // {
    //     broadcast(new MessageSent($this->user_id, $this->createdMessage, $this->selectedConversation, $this->receiverInstance));
    // }

    
    
    public function render()
    {
        return view('livewire.chat.send-message');
    }
}
