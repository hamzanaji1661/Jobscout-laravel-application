<?php

namespace App\Http\Livewire\Chat;

use Livewire\Component;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\Employee;

class ChatList extends Component
{
    public $conversation;
    public $receiverInstance;
    public $selectedConversation;
    public $user_id;

    protected $listeners=['chatUserSelected', 'refresh'=> '$refresh'];

    public function mount()
    {
        $this->user_id = auth()->user()->id;

        $this->conversations = Conversation::where('recipient_id', $this->user_id)
            ->orWhere('sender_id', $this->user_id)->orderByDesc('last_message_at')->get();
    }

    public function chatUserSelected(Conversation $conversation, $receiverId)
    {
       // dd($conversation, $receiverId);
        $this->selectedConversation = $conversation;
        //$this->conversation = $conversation;
        $receiverInstance = Employee::find($receiverId);


        $this->emitTo('chat.chatbox', 'loadConversation', $this->selectedConversation, $receiverInstance);


        $this->emitTo('chat.send-message', 'updateSendMessage', $this->selectedConversation, $receiverInstance);
    }


    
    public function getChatUserInstance($conversation, $request)
    {
        // $this->user_id = auth()->user()->id;

        if($conversation->sender_id == $this->user_id) {
            $this->receiverInstance = Employee::firstWhere('id',$conversation->recipient_id);
    }
    else{
        $this->receiverInstance = Employee::firstWhere('id',$conversation->sender_id);
    }

    if(isset($request)){
        return $this->receiverInstance->$request;
    }
}

    
    public function render()
    {
        return view('livewire.chat.chat-list');
    }
}
