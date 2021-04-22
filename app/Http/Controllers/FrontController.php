<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Expedition;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontController extends Controller
{
    public function index()
    {
        return view('pages.front.index');
    }

    public function tracking()
    {
        return view('pages.front.tracking');
    }

    public function checkTracking(Request $request)
    {
        $tracking = Transaction::with(['details', 'city.province'])->where('tracking_number', $request->tracking_number)->first();

        if (!$tracking) {
            return redirect(route('front.tracking'))->with(['error' => 'Data tracking tidak ditemukan.!']);
        }

        return view('pages.front.show-tracking', compact('tracking'));
    }

    public function shipping()
    {
        return view('pages.front.shipping');
    }

    public function checkShipping(Request $request)
    {
        $transaction = Transaction::with(['details', 'city.province'])->where('id', $request->transaction_id)->first();

        if (!$transaction) {
            return redirect(route('front.shipping'))->with(['error' => 'Transaksi tidak ditemukan.!']);
        }

        return view('pages.front.show-shipping', compact('transaction'));
    }

    public function view($invoice)
    {
        $transaction = Transaction::with('details.area')->where('id', $invoice->transaction_id)->first();

        return view('pages.front.show-shipping', compact('transaction'));
    }

    public function cost()
    {
        return view('pages.front.cost');
    }

    public function contact()
    {
        return view('pages.front.contact-us');
    }

    public function sendMessage(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|min:3|max:50',
            'email' => 'required|email',
            'message' => 'required|min:5|max:100',
        ]);

        Message::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'visitor_ip' => $request->getClientIp()
        ]);

        return redirect()->back()->with(['success' => 'Pesan berhasil dikirim']);
    }

    public function confirmStatus($id)
    {
        $order = Transaction::whereRaw('md5(id) = "' . $id . '"')->first();
        $order->update(['status' => 4]);

        // return redirect(route('orders.view', $order->invoice));
        return view('pages.front.confirm', compact('order'));
    }
}
