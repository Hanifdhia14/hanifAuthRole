<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Repot_kpiController extends Controller
{
    public function index ()
    {
        return view('repotkpi.index');
    }
}
