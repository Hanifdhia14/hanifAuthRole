<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class Nilai_targetController extends Controller
{
    public function index()
    {
        return view('user.nilai_target.index');
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
