<?php

namespace App\Http\Controllers;

class PublicController extends Controller
{
    public function home()     { return view('public.home'); }
    public function about()    { return view('public.about'); }
    public function whatWeDo() { return view('public.what-we-do'); }
    public function tiers()    { return view('public.tiers'); }
}
