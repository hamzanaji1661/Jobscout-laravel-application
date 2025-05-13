<?php

namespace App\Http\Livewire\Chat;

use App\Models\Employee;
use App\Models\Conversation;
use App\Models\Message;

use Livewire\Component;

class Chatbox extends Component
{
    public $receiverInstance;
    public $receiver;
    public $selectedConversation;
    public $messages;
    public $user_id;
    public $height;
    public $messages_count;
    public $pagenateVar = 10;
    protected $listeners=['loadConversation', 'pushMessage', 'loadmore', 'updateHeight'];

    public function pushMessage($messageId)
    {
       $newMessage = Message::find($messageId);
        $this->messages->push($newMessage);

        $this->dispatchBrowserEvent('rowChatToBottom');
    }

    function loadmore()
    {
        $this->pagenateVar = $this->pagenateVar + 5;
        $this->messages = Message::where('conversation_id', $this->selectedConversation->id)->skip( $this->messages_count - $this->pagenateVar)->take($this->pagenateVar)->get();
        $height = $this->height;
        $this->dispatchBrowserEvent('updatedHeight',($height));
    }

    function updateHeight($height)
    {
        $this->height = $height;
    }

    public function loadConversation(Conversation $conversation, Employee $receiver)
    {
        //dd($conversation, $receiver);
        $this->selectedConversation = $conversation;
        $this->receiverInstance = $receiver;


        $this->messages_count = Message::where('conversation_id', $this->selectedConversation->id)->count();

        $this->messages = Message::where('conversation_id', $this->selectedConversation->id)->skip( $this->messages_count - $this->pagenateVar)->take($this->pagenateVar)->get();

        $this->dispatchBrowserEvent('chatSelected');
    
    }
    public function mount()
    {
        $this->user_id = auth()->user()->id;
    }



    public function render()
    {
        return view('livewire.chat.chatbox');
    }
}
