<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Requests;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requests = Requests::where('id', '>', 0)
        ->with('student')
        ->with('result')
        ->with('status')
        ->with(['stage' => function($q) {
            $q->with(['nomination' => function($r)           {
                $r->with(['event' => function ($w) {
                    $w -> with('level');
                }], ['event' => function ($e) {
                    $e -> with('type');
                }], ['event' => function ($t) {
                    $t -> with(['user' => function($y) {
                        $y -> with('pc.pck');
                    }]);
                }]);
            }]);
        }])->get();

        // dd($requests);


        return view('admin.requests.requests', [
            'requests' => $requests
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $request = Requests::where('id', $id)
        ->with('student')
        ->with('result')
        ->with('status')
        ->with(['stage' => function($q) {
            $q->with(['nomination' => function($r)           {
                $r->with(['event' => function ($w) {
                    $w -> with('level');
                }], ['event' => function ($e) {
                    $e -> with('type');
                }], ['event' => function ($t) {
                    $t -> with(['user' => function($y) {
                        $y -> with('pc.pck');
                    }]);
                }]);
            }]);
        }])->first();

        return view ('admin.requests.edit', [
            'request' => $request
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id_request_status = $request->input('id_request_status');

        Requests::where('id', $id)->update([
            'id_request_status' => $id_request_status,
        ]);

        return redirect(route('requests.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
