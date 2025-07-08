<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    /**
     * Display the home page view.
     *
     * @return \Illuminate\View\View The home page view.
     */
    public function index()
    {
        return view('home');
    }
}
