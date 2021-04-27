<?php

namespace App\Http\Livewire;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\User;
use App\Models\City;
use App\Models\Province;
use App\Models\Cart;
use Livewire\Component;

class CreateTransaction extends Component
{
    public $transaction;
    public $transactionId;
    public $action;
    public $button;

    public $states;
    public $cities;

    public $selectedState = null;

    protected function getRules()
    {
        return [
            'transaction.sender_name' => 'required',
            'transaction.sender_phone' => 'required',
            'transaction.sender_address' => 'required',
            'transaction.reciver_name' => 'required',
            'transaction.reciver_phone' => 'required',
            'transaction.reciver_address' => 'required',
            'transaction.city_id' => 'required',
            'transaction.user_id' => 'required'
        ];
    }

    public function createTransaction()
    {
        $this->resetErrorBag();
        $this->validate();

        $cart = Cart::get();

        $transaction = Transaction::create($this->transaction);

        foreach ($cart as $key => $value) {
            $transactionDetail = array(
                'transaction_id' => $transaction->id,
                'area_id' => $value->area_id,
                'item_name' => $value->item_name,
                'qty' => $value->qty,
                'weight' => $value->weight,
                'subtotal' => $value->subtotal,
                'created_at' => \Carbon\carbon::now(),
                'updated_at' => \Carbon\carbon::now()
            );

            TransactionDetail::insert($transactionDetail);
            $transaction->update([
                'tracking_number' => 'TR-'.date('Ymd').rand(1111, 9999),
                'total' => $cart->sum('subtotal'),
                'status' => 0
            ]);
            Cart::where('id', $value->id)->delete();
        }

        $this->emit('saved');
        $this->reset('transaction');
        // $this->reset('detailTransaction');
    }

    public function updateTransaction()
    {
        $this->resetErrorBag();
        $this->validate();

        Transaction::query()
            ->where('id', $this->transactionId)
            ->update([
                "status" => $this->transaction->status,
            ]);

        $this->emit('saved');
    }

    public function mount()
    {
        if (!$this->transaction && $this->transactionId) {
            $this->transaction = Transaction::find($this->transactionId);
        }

        $this->states = Province::all();
        $this->cities = collect();
        $this->button = create_button($this->action, "Transaction");
    }

    public function render()
    {
        $users = User::where('role', 1)->orderBy('id', 'DESC')->get();
        return view('livewire.create-transaction', compact('users'));
    }

    public function updatedSelectedState($state)
    {
        if (!is_null($state)) {
            $this->cities = City::where('province_id', $state)->get();
        }
    }
}
