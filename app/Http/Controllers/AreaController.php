<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;

class AreaController extends Controller
{
    public function index_view()
    {
        return view('pages.area.area-data', [
            'area' => Area::class,
        ]);
    }
}
