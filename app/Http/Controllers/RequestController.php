<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Groups;
use App\Models\Nominations;
use App\Models\Requests;
use App\Models\Results;
use App\Models\Stage;
use App\Models\Students;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    function index($id, $id_nomination, $id_stage) 
    {
        $requests = Requests::where('id_stage', $id_stage)
        ->with(['student' => function($q){
            $q -> with(['group' => function($w) {
                $w -> with('specialization');
            }], ['group' => function($w) {
                $w -> with('department');                
            }]);
        }])
        ->with('result')
        ->with('status')
        ->with(['stage' => function($q) {
            $q->with(['nomination' => function($r)           {
                $r->with(['event' => function ($w) {
                    $w -> with('level');
                }], 
                ['event' => function ($e) {
                    $e -> with('type');
                }], 
                ['event' => function ($t) {
                    $t -> with(['user' => function($y) {
                        $y -> with('comission');
                    }]);
                }]);
            }]);
        }])->get();

        $event = Events::findOrFail($id);
        $stage = Stage::findOrFail($id_stage);
        $nomination = Nominations::findOrFail($id_nomination);
        $students = Students::all();
        $results = Results::all();

        return view('requests.index', [
            'requests' => $requests,
            'event' => $event,
            'stage' => $stage,
            'nomination' => $nomination,
            'students' => $students,
            'results' => $results
        ]);
    }

    function store($id, $id_nomination, $id_stage, Request $request) {
        $data = $request->validate([
            "id_student" => ['required'],
            "id_result" => ['required'],
        ]);

        Requests::create([
            'id_student' => $data['id_student'],
            'id_result' => $data['id_result'],
            'id_stage' => $id_stage,
            'id_user' => auth()->user()->id,
            'id_request_status' => 1,
            'date_of_addition' => date('Y-m-d'),
        ]);

        
        return redirect()->back();
    }

    function edit($id, $id_nomination, $id_stage, $id_request) {
        $event = Events::findOrFail($id);
        $nomination = Nominations::findOrFail($id_nomination);
        $stage = Stage::findOrFail($id_stage);
        $students = Students::all();
        $results = Results::all();

        $request = Requests::where('id', $id_request)
        ->with(['student' => function($q){
            $q -> with(['group' => function($w) {
                $w -> with('specialization');
            }], ['group' => function($w) {
                $w -> with('department');                
            }]);
        }])
        ->with('result')
        ->with('status')
        ->with(['stage' => function($q) {
            $q->with(['nomination' => function($r)           {
                $r->with(['event' => function ($w) {
                    $w -> with('level');
                }], 
                ['event' => function ($e) {
                    $e -> with('type');
                }], 
                ['event' => function ($t) {
                    $t -> with(['user' => function($y) {
                        $y -> with('comission');
                    }]);
                }]);
            }]);
        }])->first();

        

        return view('requests.edit', [
            'request' => $request,
            'event' => $event,
            'stage' => $stage,
            'nomination' => $nomination,
            'students' => $students,
            'results' => $results
        ]);
    }

    function update($id, $id_nomination, $id_stage, $id_request, Request $request) {
        $data = $request->validate([
            "id_student" => ['required'],
            "id_result" => ['required'],
        ]);

        Requests::where('id', $id_request)->update([
            'id_student' => $data['id_student'],
            'id_result' => $data['id_result'],
            'id_stage' => $id_stage,
            'id_user' => auth()->user()->id,
            'id_request_status' => 1,
            'date_of_addition' => date('Y-m-d'),
        ]);

        return redirect(route('stageRequests.store' , [
            'id' => $id, 
            'id_nomination' => $id_nomination, 
            'id_stage' => $id_stage ]));
    }

        function destroy($id, $id_nomination, $id_stage, $id_request) {
        Requests::destroy($id_request);

        return redirect()->back();
    }
}