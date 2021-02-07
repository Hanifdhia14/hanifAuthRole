<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Nilai_targetleaderController extends Controller
{
    public function index()
    {
        return view('leader.nilai_targetleader.index');
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
