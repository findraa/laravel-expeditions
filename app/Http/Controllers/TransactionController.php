<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index_view()
    {
        return view('pages.transaction.transaction-data', [
            'transaction' => Transaction::class,
        ]);
    }

    public function invoice($transactionId)
    {
        $transaction = Transaction::with(['details.area', 'city.province'])->where('id', $transactionId)->first();

        return view('pages.transaction.transaction-view', compact('transaction'));
    }

    public function print($transactionId)
    {
        $transaction = Transaction::with(['details', 'city.province'])->where('id', $transactionId)->first();
        $pdf = PDF::loadView('pages.transaction.invoice_pdf', compact('transaction'));

        return $pdf->stream();
    }

    public function transactionReport()
    {
        return view('pages.report.transaction-data', [
            'transaction' => Transaction::class,
        ]);
    }

    public function transactionReportPdf()
    {
        $transactions = Transaction::with(['details.area'])->get();
        $pdf = PDF::loadView('pages.report.transaction_pdf', compact('transactions'));

        return $pdf->stream();
    }
}
