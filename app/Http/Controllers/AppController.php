<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;

use Illuminate\Http\Request;

class AppController extends Controller
{
    function homePage() {

        return view('home');
        
    }
}
