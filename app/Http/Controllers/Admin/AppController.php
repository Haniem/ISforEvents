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
        $events = Events::orderBy('created_at')->paginate(10);



        return view('admin.events.events', [
            "events" => $events,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $event_types = Event_types::all();
        $event_levels = Event_levels::all();
        $event_statuses = Event_statuses::all();
        $users = User::all();
        
        return view('admin.events.create',[
            'event_types' => $event_types,
            'event_levels' => $event_levels,
            'event_statuses' => $event_statuses,
            'users' => $users
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'event_name' => 'required|unique:events,event_name',
            'event_discription' => 'required',
            'event_format' => 'required',
            'begin_date' => 'required|date',
            'end_date' => 'required|date',
            'event_age' => 'required',
            'event_requirements' => 'required',
            'event_link' => 'required',
            'id_event_type' => 'integer',
            'id_event_level' => 'integer',
            'id_event_status' => 'integer',
            'id_user' => 'integer',
            'event_com' => 'required',
        ]);

        Events::create($data);

        return redirect(route('events.index'));
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
        
        $event = Events::where('id', $id)->first();
        $event_types = Event_types::all();
        $event_levels = Event_levels::all();
        $event_statuses = Event_statuses::all();
        $event_users = User::all();


        return view('admin.events.edit', [
            'event' => $event,
            'event_types' => $event_types,
            'event_levels' => $event_levels,
            'event_statuses' => $event_statuses,
            'event_users' => $event_users
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
        $data = $request->validate([
            'event_name' => 'required' ,
            'event_discription' => 'required' ,
            'event_format' => 'required' ,
            'begin_date' => 'required' ,
            'end_date' => 'required',
            'event_age' => 'required',
            'event_requirements' => 'required',
            'event_link' => 'required',
            'id_event_type' => 'required',
            'id_event_level' => 'required',
            'id_event_status' => 'required',
            'id_user' => 'required'
        ]);

        Events::where('id', $id)
            ->update([
                'event_name' => $data['event_name'],
                'event_discrtiption' => $data['event_discription'], 
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

            ]);

            
        return redirect(route('events.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Events::destroy($id);

        return redirect(route('events.index'));
    }
}
