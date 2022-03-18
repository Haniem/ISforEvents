<?php

namespace App\Http\Controllers;

use App\Models\Event_levels;
use App\Models\Event_statuses;
use App\Models\Event_types;
use App\Models\Events;
use App\Models\Nominations;
use App\Models\Stage;
use App\Models\Stage_format;
use App\Models\Stage_status;
use App\Models\Stage_type;
use App\Models\User;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppController extends Controller
{
    function homePage() {   

        return view('home');
        
    }

    function events() {
        $events = Events::orderBy('created_at')->paginate(10);



        return view('events.index', [
            "events" => $events,
        ]);
    }
    
    function event_types() {
        
        $event_types = Event_types::all();

        return view('events.eventTypes',[
            'event_types' => $event_types,
        ]);
    }

    function show_event_with_type($event_type) {
        $type = DB::table('event_types')->where('id', '=', $event_type)->select('event_types.event_type_name')->first();
        $events = DB::table('events')->where('id_event_type', '=', $event_type)->orderBy('created_at')->paginate(10);

        return view('events.eventsWithType', [
            'events' => $events,
            'type' => $type,
        ]);
    }

    function showProfile() {

        

        return view('user.profile');
    }
}
