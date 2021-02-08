<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        // Role Admin
        $this->middleware('role')->only(['testAdmin']);
        // Role Selain Admin, bisa Custom, tinggal edit $this->middleware('role'), sperti dibawah sesuai dgn role di DB
        // pada dasarnya role Admin bisa akses kesemua function yg ada di controller, tp kalau mau rubah, bisa di file Middleware->Role.php
        $this->middleware('role:Manager')->only(['testManager']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function index1()
    {
        return view('home1');
    }
    public function index2()
    {
        return view('home2');
    }

    public function testAdmin()
    {
        return "Page Admin Only!";
    }

    public function testManager()
    {
        return "Test Manager Page!";
    }
}
