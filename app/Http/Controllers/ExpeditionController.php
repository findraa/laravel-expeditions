<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expedition;

class ExpeditionController extends Controller
{
    public function index_view ()
    {
        return view('pages.expedition.expedition-data', [
            'expedition' => Expedition::class,
        ]);
    }
}
