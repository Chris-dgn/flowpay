<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class CardController extends Controller
{
    public function show(): View
    {
        return view('card.show');
    }
}
