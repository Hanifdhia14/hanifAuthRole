<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RepotleaderController extends Controller
{
    public function index()
    {
        return view('leader.repotleader.index');
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
