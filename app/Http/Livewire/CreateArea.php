<?php

namespace App\Http\Livewire;

use App\Models\Area;
use App\Models\Expedition;
use Livewire\Component;

class CreateArea extends Component
{
    public $area;
    public $areaId;
    public $action;
    public $button;

    protected function getRules()
    {
        return [
            'area.expedition_id' => 'required',
            'area.price' => 'required',
            'area.weight' => 'required|min:3',
            'area.destination' => 'required|min:3',
            'area.estimate' => 'required|min:3',
        ];
    }

    public function createArea ()
    {
        $this->resetErrorBag();
        $this->validate();

        Area::create($this->area);

        $this->emit('saved');
        $this->reset('area');
    }

    public function updateArea ()
    {
        $this->resetErrorBag();
        $this->validate();

        Area::query()
            ->where('id', $this->areaId)
            ->update([
                "expedition_id" => $this->area->expedition_id,
                "price" => $this->area->price,
                "weight" => $this->area->weight,
                "destination" => $this->area->destination,
                "estimate" => $this->area->estimate
            ]);

        $this->emit('saved');
    }

    public function mount ()
    {
        if (!$this->area && $this->areaId) {
            $this->area = Area::find($this->areaId);
        }

        $this->button = create_button($this->action, "Area");
    }

    public function render()
    {
        $expedition = Expedition::orderBy('name', 'DESC')->get();
        return view('livewire.create-area', compact('expedition'));
    }
}
