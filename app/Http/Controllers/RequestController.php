<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Groups;
use App\Models\Requests;
use App\Models\Stage;
use App\Models\Students;
use GuzzleHttp\Psr7\Request;

class RequestController extends Controller
{
    function show_stage_requests($id, $id_nomination, $id_stage) 
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

        return view('stages.index', [
            'requests' => $requests,
            'event' => $event,
            'stage' => $stage
        ]);
    }
}