<?php

namespace App\Http\Controllers;

use App\Models\Requests;
use App\Models\Students;
use GuzzleHttp\Psr7\Request;

class RequestController extends Controller
{
    function show_stage_requests($id_stage) {

        $requests = Requests::where('id_stage', $id_stage)->with('student')->with('result')->with('status')->with(['stage' => function($q) {
            $q->with(['nomination' => function($r){
                $r->with('event');
            }]);
        }])->get();

        // return view('stageRequest', [
        //     'requests' => $requests
        // ]);
            return $requests;
    }
}