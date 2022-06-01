<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AdminUser;
use Illuminate\Http\Request;

class AdminUserListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adminUsers = AdminUser::all();

        return view('admin.adminUserList.adminUsers', [
            'adminUsers' => $adminUsers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.adminUserList.create');
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
            'username' => ["required", "string", "unique:users,username"],
            'email' => ["required", "email", "string", "unique:users,email"],
            'password' => ["required", 'confirmed']
        ], [
            'username.required' => 'Поле с именем пользователя должно быть заполнено.',
            'username.unique' => 'Имя пользователя должно быть уникальным',
            'email.required' => 'Поле с почтой пользователя должно быть заполнено.',
            'email.email' => 'В поле почта внесены не правильные данные.',
            'email.unique' => 'Почта должна быть уникальной',
            'password.required' => 'Поле с паролем должно быть заполнено.',
            'password.confirmed' => 'Пароли не совпадают',
        ]);



        $adminUser = AdminUser::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']) ,
        ]);

        return redirect(route('adminUsers.index'));
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
        $adminUser = AdminUser::where('id', $id)->first();

        return view('admin.adminUserList.edit', [
            'adminUser' => $adminUser,
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
            'username' => ["required", "string", "unique:users,username"],
            'email' => ["required", "email", "string", "unique:users,email"],
            'password' => ["required", 'confirmed']
        ], [
            'username.required' => 'Поле с именем пользователя должно быть заполнено.',
            'username.unique' => 'Имя пользователя должно быть уникальным',
            'email.required' => 'Поле с почтой пользователя должно быть заполнено.',
            'email.email' => 'В поле почта внесены не правильные данные.',
            'email.unique' => 'Почта должна быть уникальной',
            'password.required' => 'Поле с паролем должно быть заполнено.',
            'password.confirmed' => 'Пароли не совпадают',
        ]);

        $adminUser = AdminUser::where('id', $id)->update([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']) ,
        ]);
        
        return redirect(route('adminUsers.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AdminUser::destroy($id);

        return redirect(route('adminUsers.index'));
    }
}
