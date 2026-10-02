<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class DepositController extends Controller
{
    public function create(): View
    {
        return view('deposits.create');
    }
}
