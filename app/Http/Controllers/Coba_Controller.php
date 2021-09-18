<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Use_;

class Coba_Controller extends Controller
{
    public function index ()
    {

        return view('coba');
    }

}
