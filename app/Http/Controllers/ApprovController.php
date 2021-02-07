<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApprovController extends Controller
{
    public function index()
    {
        return view('leader.approv.index');
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
