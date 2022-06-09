<?php

namespace App\Http\Controllers;

use App\Models\Comissions;
use App\Models\Events;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    function index($id_user) {

        $user = User::where('id', $id_user)->first();
        $events = Events::where('id_user', $id_user)->get();

        return view('profile.index',[
            'user' => $user,
            'events' => $events,
        ]);
    }

    function edit($id_user) {

        $user = User::where('id', $id_user)->first();
        $comissions = Comissions::all();

        return view('profile.edit',[
            'user' => $user,
            'comissions' => $comissions
        ]);
    }

    function update($id_user, Request $request) {
        $data = $request -> validate([
            'name' => 'required',
            'surname' => 'required',
            'lastname' => 'required',
            'username' => 'required',
            'email' => 'required',
            'id_comission' => 'required',
        ]);

        User::where('id', $id_user)->update([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'lastname' => $data['lastname'],
            'username' => $data['username'],
            'email' => $data['email'],
            'id_comission' => $data['id_comission'],
        ]);

        return redirect(route('profile.index', $id_user));
    }
}
