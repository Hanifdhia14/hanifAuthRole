<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Target_kerjaleader;

class Target_kerjaleaderController extends Controller
{
    public function index()
    {
        return view('leader.target_kerjaleader.index');
    }
    public function store(Request $request)
    {
    }
    public function edit(Request $request)
    {
    }



    public function destroy($id)
    {
    }
}
