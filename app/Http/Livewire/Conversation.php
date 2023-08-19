<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Conversation as modelconversation;
use Illuminate\Support\Facades\Auth;


class Conversation extends Component
{
    public function render()
    {
        return view('livewire.conversation');
    }
    public $conversations;

    public function mount()
    {
        $conversations = modelconversation::where('receiver_id', Auth::user()->id)->orWhere('sender_id', Auth::user()->id)->get();
        $this->conversations = $conversations;
    }

    public $selectedConversationId;

    public function selectConversation($conversationId)
    {
        $this->selectedConversationId = $conversationId;
        $this->emit('conversationSelected', $conversationId);
    }
}
