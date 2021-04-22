<?php

namespace App\Http\Livewire;

use App\Models\TransactionDetail;
use App\Models\Area;
use App\Models\Cart;
use Livewire\Component;

class CreateDetailTransaction extends Component
{
    public $detailTransaction;
    public $detailTransactionId;
    public $action;
    public $button;

    protected function getRules()
    {
        return [
            'detailTransaction.item_name' => 'required',
            'detailTransaction.area_id' => 'required',
            'detailTransaction.qty' => 'required',
            'detailTransaction.weight' => 'required',
        ];
    }

    public function addItem()
    {
        $this->resetErrorBag();
        $this->validate();

        $cart = Cart::create($this->detailTransaction);
        $cart->update([
            'subtotal' => $cart->area->price * $cart->weight
        ]);

        $this->emit('saved');
        // $this->reset('detailTransaction');
    }

    public function deleteTransaction($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
    }

    public function createDetailTransaction()
    {
        // $this->resetErrorBag();
        // $this->validate();

        // Cart::create($this->detailTransaction);

        // $this->emit('saved');
        // $this->reset('detailTransaction');

    }

    public function updateDetailTransaction()
    {
        $this->resetErrorBag();
        $this->validate();

        TransactionDetail::query()
            ->where('id', $this->transactionId)
            ->update([
                "status" => $this->transaction->status,
            ]);

        $this->emit('saved');
    }

    public function mount()
    {
        if (!$this->detailTransaction && $this->detailTransactionId) {
            $this->detailTransaction = TransactionDetail::find($this->detailTransactionId);
        }

        $this->button = create_button($this->action, "DetailTransaction");
    }

    public function render()
    {
        $carts = Cart::orderBy('id', 'DESC')->get();
        $areas = Area::get();

        return view('livewire.create-detail-transaction', compact('carts', 'areas'));
    }
}
