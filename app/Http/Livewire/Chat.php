<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Messages as ModelsMessages;
use App\Models\Conversation;
use Illuminate\Support\Facades\Auth;

class Chat extends Component
{
    public function render()
    {
        $messages = ModelsMessages::where('conversation_id', $this->selectedConversationId)->get();

        return view('livewire.chat',[
            "messages" => $messages
        ]);
    }
    protected $listeners = [
        'conversationSelected' => 'showMessages',
    ];
    public $selectedConversationId, $body;

    public function showMessages($conversationId)
    {
        $this->selectedConversationId = $conversationId;
    }

    public function sendMessage()
    {
        $conversation = Conversation::find($this->selectedConversationId);
        if ($conversation->sender_id === Auth()->user()->id) {
            $receiver_id = Auth()->user()->id;
        } else {
            $receiver_id = $conversation->receiver_id;
        }

        ModelsMessages::create([
            'conversation_id' => $this->selectedConversationId,
            'sender_id' => auth()->id(),
            'receiver_id' => $receiver_id,
            'message' => $this->body,
        ]);
        $this->body = "";
    }
}
