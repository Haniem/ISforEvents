<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;



class AuthController extends Controller
{
    function showregisterForm() {
        return view('auth.register');
    }

    function register(Request $request) {
        $data = $request->validate([
            'name' => ["required", "string"],
            'surname' => ["required", "string"],
            'lastname' => ["required", "string"],
            'username' => ["required", "string", "unique:users,username"],
            'email' => ["required", "email", "string", "unique:users,email"],
            'password' => ["required", 'confirmed']
        ], [
            'name.required' => 'Поле с именем должно быть заполнено.',
            'name.string' => 'Поле с именем должно содержать только буквы',
            'surname.required' => 'Поле с фамилией должно быть заполнено.',
            'surname.string' => 'Поле с фамилией должно содержать только буквы',
            'lastname.required' => 'Поле с отчеством должно быть заполнено.',
            'lastname.string' => 'Поле с именем должно содержать только буквы',
            'username.required' => 'Поле с именем пользователя должно быть заполнено.',
            'username.unique' => 'Имя пользователя должно быть уникальным',
            'email.required' => 'Поле с почтой пользователя должно быть заполнено.',
            'email.email' => 'В поле почта внесены не правильные данные.',
            'email.unique' => 'Почта должна быть уникальной',
            'password.required' => 'Поле с паролем должно быть заполнено.',
            'password.confirmed' => 'Пароли не совпадают',
        ]);


        $user = User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'lastname' => $data['lastname'],
            'username' => $data['username'],
            'email' => $data['email'],
            'role' => 'user',
            'password' => bcrypt($data['password']) ,
        ]);

        if($user) {
            auth("web")->login($user);
        }
        dd($user);
        return redirect(route('home'));

    }

    function showLoginForm() {

        return view('auth.login');

    }

    function login(Request $request) {
        $data = $request->validate([
            'username' => ["required", "string"],
            'password' => ["required"]
        ]);

        if (auth("web")->attempt($data)) {

            return redirect(route('home'));

        };

    

        return redirect(route('login'))->withErrors(["username" => 'Пользователь не найдет, либо данные введены не правильно']);
    }

    function logout() {

    }
}
