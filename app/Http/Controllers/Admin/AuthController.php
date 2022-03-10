<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminUser;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    function index() {

        return view('admin.auth.login');

    }

    //Авторизация

    function login(Request $request) {
        $data = $request->validate([
            'username' => ["required", "string"],
            'password' => ["required"]
        ]);

        if (auth("admin")->attempt($data)) {

            return redirect(route('admin.post.index'));

        };

    

        return redirect(route('admin.login'))->withErrors(["username" => 'Пользователь не найдет, либо данные введены не правильно']);
    }
}
