<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Departments;
use App\Models\Groups;
use App\Models\Specialization;
use Illuminate\Http\Request;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Groups::all();

        return view('admin.groups.groups', [
            'groups' => $groups,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Departments::all();
        $specializations = Specialization::all();
        
        return view('admin.groups.create',[
            'departments' => $departments,
            'specializations' => $specializations,
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
            'group_name' => 'required|unique:groups,group_name',
            'id_department' => 'required',
            'id_specialization' => 'required'
        ]);
        
        // Groups::create([
        //     'group_name' => $data['group_name'],
        //     'id_department' => $data['id_department'],
        //     'id_specialization' => $data['id_specialization'],
        // ]);
        
        Groups::create($data);

        return redirect(route('groups.index'));
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
        $group = Groups::findOrFail($id);
        $departments = Departments::all();
        $specializations = Specialization::all();

        return view('admin.groups.edit', [
            'group' => $group,
            'departments' => $departments,
            'specializations' => $specializations
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
            'group_name' => 'required|unique:groups,group_name',
            'id_department' => 'required',
            'id_specialization' => 'required',
        ]);

        Groups::where('id', $id)->update($data);

        return redirect(route('groups.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Groups::destroy($id);

        return redirect(route('groups.index'));
    }
}
