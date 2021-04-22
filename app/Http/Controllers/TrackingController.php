<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Tracking;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    public function index_view()
    {
        return view('pages.tracking.tracking-data', [
            'transaction' => Transaction::class,
        ]);
    }

    public function tracking($tracking_number)
    {
        $transaction = Transaction::with(['trackings', 'trackings.city'])->where('tracking_number', $tracking_number)->first();

        return view('pages.tracking.tracking-history', compact('transaction'));
    }
}
