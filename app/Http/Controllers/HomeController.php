<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('pages.dashboard');
    }

    public function index()
    {
        return view('welcome');
    }
}
