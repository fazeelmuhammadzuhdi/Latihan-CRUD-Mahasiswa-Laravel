<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Layout extends Controller
{
    public function index()
    {
        return view('layout.main');
    }

    public function home()
    {
        return view('layout.home');
    }
}
