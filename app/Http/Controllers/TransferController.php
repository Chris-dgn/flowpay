<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class TransferController extends Controller
{
    public function create(): View
    {
        return view('transfers.create');
    }
}
