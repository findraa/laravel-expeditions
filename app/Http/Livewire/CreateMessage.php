<?php

namespace App\Http\Livewire;

use App\Models\Message;
use Livewire\Component;

class CreateMessage extends Component
{
    public $message;
    public $messageId;
    public $action;
    public $button;


    public function mount ()
    {
        if (!$this->message && $this->messageId) {
            $this->message = Message::find($this->messageId);
        }

        // $this->button = create_button($this->action, "Message");
    }

    public function render()
    {
        return view('livewire.create-message');
    }
}
