<?php

namespace App\Http\Controllers;

use App\Models\Event_levels;
use App\Models\Event_statuses;
use App\Models\Event_types;
use App\Models\Events;
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

    function eventDetail($id) {

        

        $event = Events::findOrFail($id);




        // dd($event, $event_type, $event_event_status, $event_type);

        return view('events.eventDetail', [
            "event" => $event,
        ]);

    }


    function showAddEventForm() {

        $event_types = Event_types::all();
        $event_levels = Event_levels::all();
        $event_statuses = Event_statuses::all();
        $users = User::all();

        return view('user.addEvent', [
            'event_types' => $event_types,
            'event_levels' => $event_levels, 
            'event_statuses' => $event_statuses,
            'users' => $users,
        ]);
    }

    function addEvent(Request $request) {
        $data = $request->validate([
            'event_name' => ["required", "string", "unique:events,event_name"],
            'event_discrtiption' => ["required", "string"],
            'event_format' => ["string"],
            'begin_date' => ["required"],
            'end_date' => ["required"],
            'event_age' => ["string"],
            'event_requirements' => ["required", "string"],
            'event_link' => ['string'],
            'id_event_type' => ['required'],
            'id_event_level' => ['required'],
            'id_event_status' => ['required'],
            'id_user' => ['required'],
            'event_com' => ["string",]
        ], [
            'event_name.required' => 'Поле обязательно к заполнению.',
            'event_discrtiption.required' => 'Поле обязательно к заполнению.',
            'begin_date.required' => 'Поле обязательно к заполнению.',
            'end_date.required' => 'Поле обязательно к заполнению.',
            'event_requirements.required' => 'Поле обязательно к заполнению.',
            'id_event_type.required' => 'Поле обязательно к заполнению.',
            'id_event_level.required' => 'Поле обязательно к заполнению.',
            'id_event_status.required' => 'Поле обязательно к заполнению.',
            'id_user.required' => 'Поле обязательно к заполнению.',

        ]);

        DB::table('events')->insert([
            'event_name' => $data['event_name'],
            'event_discrtiption' => $data['event_discrtiption'],
            'event_format' => $data['event_format'],
            'begin_date' => $data['begin_date'],
            'end_date' => $data['end_date'],
            'event_age' => $data['event_age'],
            'event_requirements' => $data['event_requirements'],
            'event_link' => $data['event_link'],
            'id_event_type' => $data['id_event_type'],
            'id_event_level' => $data['id_event_level'],
            'id_event_status' => $data['id_event_status'],
            'id_user' => $data['id_user'],
            'event_com' => $data['event_com'],

        ]);

        return redirect(route('events'));
    } 

    function showProfile() {

        return view('user.profile');
    }
}
