<?php

namespace App\Http\Livewire\Chat;

use Livewire\Component;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\Employer;
use App\Models\Employee;
use Auth;

class CreateChat extends Component
{
    public $users;
    public $message = "Hello World!!!";

    public function mount()
    {
        $this->user_id = auth()->user()->id;
    }

    public function checkconversation($receiverId)
    {

        $checkedConversation = Conversation::where('recipient_id', $this->user_id)
            ->where('sender_id', $receiverId)
            ->orWhere('recipient_id', $receiverId)
            ->where('sender_id', $this->user_id)
            ->get();

            if(count($checkedConversation) == 0) {
               //dd('no conversation');

               $createdConversation = Conversation::create([
                   'sender_id' => $this->user_id,
                   'recipient_id' => $receiverId,
                //    'last_message_at' => '2021-01-01 00:00:00',
               ]);

               $createdMessage = Message::create([
                   'conversation_id' => $createdConversation->id,
                   'sender_id' => $this->user_id,
                   'recipient_id' => $receiverId,
                   'body' => $this->message,
               ]);

               $createdConversation->last_message_at = $createdMessage->created_at;
                $createdConversation->save();

                //dd('saved');
            } else {
                dd('conversation exists');
            }
    }

    public function render()
    {
        return view('livewire.chat.create-chat');
    }
}
