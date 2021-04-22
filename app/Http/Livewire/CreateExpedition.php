<?php

namespace App\Http\Livewire;

use App\Models\Expedition;
use Livewire\Component;

class CreateExpedition extends Component
{
    public $expedition;
    public $expeditionId;
    public $action;
    public $button;

    protected function getRules()
    {
        return [
            'expedition.name' => 'required',
        ];
    }

    public function createExpedition ()
    {
        $this->resetErrorBag();
        $this->validate();

        Expedition::create($this->expedition);

        $this->emit('saved');
        $this->reset('expedition');
    }

    public function updateExpedition ()
    {
        $this->resetErrorBag();
        $this->validate();

        Expedition::query()
            ->where('id', $this->expeditionId)
            ->update([
                "name" => $this->expedition->name,
            ]);

        $this->emit('saved');
    }

    public function mount ()
    {
        if (!$this->expedition && $this->expeditionId) {
            $this->expedition = Expedition::find($this->expeditionId);
        }

        $this->button = create_button($this->action, "Expedition");
    }

    public function render()
    {
        return view('livewire.create-expedition');
    }
}
