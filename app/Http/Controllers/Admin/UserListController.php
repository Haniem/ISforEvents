<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Comissions;
use App\Models\Departments;
use App\Models\User;
use Illuminate\Http\Request;

class UserListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('admin.userList.users', [
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $comissions = Comissions::all();

        return view('admin.userList.create', [
            'comissions' => $comissions
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

        return redirect(route('users.index'));
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
        $user = User::where('id', $id)->first();
        $comissions = Comissions::all();

        return view('admin.userList.edit', [
            'comissions' => $comissions,
            'user' => $user,
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

        $user = User::where('id', $id)->update([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'lastname' => $data['lastname'],
            'username' => $data['username'],
            'email' => $data['email'],
            'id_comission' => $data['comission'],
            'role' => 'user',
            'password' => bcrypt($data['password']) ,
        ]);

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);

        return redirect(route('users.index'));
    }
}
