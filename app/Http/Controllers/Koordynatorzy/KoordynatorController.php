<?php

namespace App\Http\Controllers\Koordynatorzy;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KoordynatorController extends Controller
{
    public function index()
    {
        return view('koordynatorzy.dashboard');
    }
}
