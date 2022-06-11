<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event_levels;
use App\Models\Event_statuses;
use App\Models\Event_types;
use App\Models\Events;
use App\Models\Students;
use App\Models\User;
use Illuminate\Http\Request;


class AppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.home');
    }

 
}
