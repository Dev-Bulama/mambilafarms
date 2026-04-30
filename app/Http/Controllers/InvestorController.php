<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvestorController extends Controller
{
    public function dashboard()
    {
        $investor = auth()->user()->investor;
        return view('investor.dashboard', compact('investor'));
    }

    public function profile()
    {
        $investor = auth()->user()->investor;
        return view('investor.profile', compact('investor'));
    }
}
