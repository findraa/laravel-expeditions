<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index_view ()
    {
        return view('pages.message.message-data', [
            'message' => Message::class,
        ]);
    }
}
