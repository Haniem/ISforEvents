<?php

namespace App\Http\Controllers;

use App\Models\Event_levels;
use App\Models\Event_statuses;
use App\Models\Event_types;
use App\Models\Events;
use App\Models\Nominations;
use App\Models\Requests;
use App\Models\Result_types;
use App\Models\Results;
use App\Models\Stage;
use App\Models\Stage_format;
use App\Models\Stage_status;
use App\Models\Stage_type;
use App\Models\Students;
use App\Models\User;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    



    function eventDetail($id) {


        $nominations = Nominations::where('id_event', $id)->select('id','nomination_name')->get();
        $event = Events::findOrFail($id);
        $results = Results::where('id_event', $id)->get();
        $result_types = Result_types::all();

        return view('events.eventDetail', [
            "event" => $event,
            "nominations" => $nominations,
            "result_types" => $result_types,
            "results" => $results, 
        ]);

    }


    function addNomination(Request $request) {


        $data = $request ->validate([
            'nomination_name' => 'required'
        ]);
        
        $id_event = $request->input('id_event');

        DB::table('nominations')->insert([
            'nomination_name' => $data['nomination_name'],
            'id_event' => $id_event,
        ]);

        return redirect()->back();
    }

    function addResult(Request $request) {

        $id_event = $request->input('id_event');
        $data = $request->validate([
            'result_name' => ["required"],
            'id_result_type' => ["required"],

        ]);


        DB::table('results')->insert([
            'result_name' => $data['result_name'],
            'id_event' => $id_event,
            'id_result_type' => $data['id_result_type']
        ]);

        
        return redirect()->back();

    }

    function show_event_nomination($id, $id_nomination) {

        $event = Events::findOrFail($id);
        $nomination = Nominations::where('id', $id_nomination)->select('id','nomination_name')->first();
        $stages = Stage::where('id_nomination', $id_nomination)->get();
        $stage_formats = Stage_format::all();
        $stage_statuses = Stage_status::all();
        $stage_types = Stage_type::all();
        $students = Students::all();
        $results = Results::all();

        $requests = Requests::all();

        // $requests = Requests::where('id_request_status', '!=', 1);

        return view('events.eventWithNominations', [
            "event" => $event,
            "nomination" => $nomination,
            "stages" => $stages,
            "stage_formats" => $stage_formats,
            "stage_statuses" => $stage_statuses, 
            "stage_types" => $stage_types,
            "students" => $students,
            "results" => $results,
            "requests" => $requests
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

    function addRequest(Request $request) {
        
        $data = $request->validate([

            "id_stage" => ['required'],
            "id_student" => ['required'],
            "id_result" => ['required'],
        ]);

        DB::table('requests')->insert([
            'id_student' => $data['id_student'],
            'id_result' => $data['id_result'],
            'id_stage' => $data['id_stage'],
            'id_request_status' => 1,
        ]);

        
        return redirect()->back();
    }
}
