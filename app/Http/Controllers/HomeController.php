<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function welcome()
    {
        $title = "Home";
        return view('welcome', compact('title'));
    }
    
}
