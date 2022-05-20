<?php

namespace App\Http\Controllers;

use App\Models\Comissions;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;




class AuthController extends Controller
{

    //Отображение формы регистрации

    function showregisterForm() {
        
        $comissions = Comissions::all();

        return view('auth.register', [
            "comissions" => $comissions
        ]);

    }

    //Регистрация

    function register(Request $request) {


        $data = $request->validate([
            'name' => ["required", "string"],
            'surname' => ["required", "string"],
            'lastname' => ["required", "string"],
            'username' => ["required", "string", "unique:users,username"],
            'email' => ["required", "email", "string", "unique:users,email"],
            'comission' => ["required"],
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
            'comission.required' => 'Выберите комиссию',
            'password.required' => 'Поле с паролем должно быть заполнено.',
            'password.confirmed' => 'Пароли не совпадают',
        ]);



        $user = User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'lastname' => $data['lastname'],
            'username' => $data['username'],
            'email' => $data['email'],
            'id_comission' => $data['comission'],
            'role' => 'user',
            'password' => bcrypt($data['password']) ,
        ]);

        if($user) {
            auth("web")->login($user);
        }
        return redirect(route('home'));

    }

    // Отображение формы авторизации
    function showLoginForm() {

        return view('auth.login');

    }

    //Авторизация

    function login(Request $request) {
        $data = $request->validate([
            'username' => ["required", "string"],
            'password' => ["required"]
        ],[
            'username.required' => 'Поле с именем пользователя должно быть заполнено.',
            'password.required' => 'Поле с паролем должно быть заполнено.',
        ]);

        if (auth("web")->attempt($data)) {

            return redirect(route('home'));
            
        };

        return redirect(route('login'))->withErrors(["loginError" => 'Пользователь не найдет, либо данные введены не правильно']);
    }

    function logout() {

        auth("web")->logout();

        return redirect(route('home'));

    }
}
