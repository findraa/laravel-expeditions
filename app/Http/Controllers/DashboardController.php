<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Visitor;
use App\Models\Expedition;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function index_view()
    {
        $visitor = Visitor::all()->count();
        $transaction = Transaction::all()->count();
        $user = User::all()->count();
        $expedition = Expedition::all()->count();

        return view('dashboard', compact('user', 'visitor', 'transaction', 'expedition'));
        // return view('pages.area.area-data', [
        //     'user' => User::class,
        //     'visitor' => Area::class,
        //     'user' => Area::class,
        // ]);
    }
}
