<?php

namespace App\Http\Controllers;

use App\Models\Event_levels;
use App\Models\Event_stage;
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



    function eventDetail($id) {


        $nominations = Nominations::where('id_event', $id)->select('id','nomination_name')->get();
        $event = Events::findOrFail($id);

        return view('events.eventDetail', [
            "event" => $event,
            "nominations" => $nominations,
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



    function addNomination(Request $request) {

        $nomination_name = $request->input('nomination_name');
        
        $id_event = $request->input('id_event');

        DB::table('nominations')->insert([
            'nomination_name' => $nomination_name,
            'id_event' => $id_event,
        ]);

        return redirect()->back();
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



    function show_event_nomination($event_type, $id, $id_nomination) {

        $event = Events::findOrFail($id);
        $nomination = Nominations::where('id', $id_nomination)->select('id','nomination_name')->first();
        $stages = Stage::where('id_nomination', $id_nomination)->get();
        $stage_formats = Stage_format::all();
        $stage_statuses = Stage_status::all();
        $stage_types = Stage_type::all();

        return view('events.eventWithNominations', [
            "event" => $event,
            "nomination" => $nomination,
            "stages" => $stages,
            "stage_formats" => $stage_formats,
            "stage_statuses" => $stage_statuses, 
            "stage_types" => $stage_types
        ]);
    }

    function addStage(Request $request) {

        $data = $request->validate([
            'event_stage_name' => ["required", "string", "unique:stages,event_stage_name"],
            'stage_begin_date' => ["required"],
            'stage_end_date' => ["required"],
            'id_event_stage_type' => ["required"],
            'id_event_stage_status' => ["required"],
            'id_event_stage_format' => ["required"],
            'id_nomination' => ["string"],
        ]);

        $id_nomination = $request->input('id_nomination');

        DB::table('stages')->insert([
            'event_stage_name' => $data['event_stage_name'],
            'stage_begin_date' => $data['stage_begin_date'],
            'stage_end_date' => $data['stage_end_date'],
            'id_event_stage_type' => $data['id_event_stage_type'],
            'id_event_stage_status' => $data['id_event_stage_status'],
            'id_event_stage_format' => $data['id_event_stage_format'],
            'id_nomination' => $id_nomination,
        ]);

        return redirect()->back();

    }



    function showProfile() {

        

        return view('user.profile');
    }
}
