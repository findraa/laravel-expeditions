<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\User;
use App\Models\Visitor;
use App\Models\Expedition;
use App\Models\Transaction;
use Asantibanez\LivewireCharts\Models\PieChartModel;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;

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
