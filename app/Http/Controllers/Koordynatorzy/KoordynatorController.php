<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KoordynatorController extends Controller
{
    public function index()
    {
        return view('koordynatorzy.dashboard');
    }
}
