<?php

namespace App\Http\Livewire;

use App\Models\City;
use Livewire\Component;
use App\Models\Province;
use App\Models\Tracking;
use App\Models\Transaction;

class CreateTracking extends Component
{
    public $tracking;
    public $trackingId;
    public $action;
    public $button;

    public $states;
    public $cities;

    public $selectedState = null;

    protected function getRules()
    {
        return [
            'tracking.transaction_id' => 'required',
            'tracking.city_id' => 'required',
        ];
    }

    public function createTracking()
    {
        $this->resetErrorBag();
        $this->validate();

        Tracking::create($this->tracking);

        $this->emit('saved');
        $this->reset('tracking');
    }

    public function updateTracking()
    {
        $this->resetErrorBag();
        $this->validate();

        Tracking::query()
            ->where('id', $this->trackingId)
            ->update([
                "status" => $this->transaction->status,
            ]);

        $this->emit('saved');
    }

    public function mount()
    {
        if (!$this->tracking && $this->trackingId) {
            $this->tracking = Tracking::find($this->trackingId);
        }

        $this->states = Province::all();
        $this->cities = collect();

        $this->button = create_button($this->action, "Tracking");
    }

    public function render()
    {
        // $provinces = Province::orderBy('name', 'DESC')->get();

        $transaction = Transaction::where('user_id', auth()->user()->id)->where('status', 2)->orderBy('tracking_number', 'DESC')->get();

        return view('livewire.create-tracking', compact('transaction'));
    }

    public function updatedSelectedState($state)
    {
        if (!is_null($state)) {
            $this->cities = City::where('province_id', $state)->get();
        }
    }
}
