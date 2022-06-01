<?php

use App\Http\Controllers\admin\AdminUserListController;
use App\Http\Controllers\Admin\AppController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\admin\DepartmentsController;
use App\Http\Controllers\admin\GroupsController;
use App\Http\Controllers\admin\NominationsController;
use App\Http\Controllers\admin\NominationsRequestsController;
use App\Http\Controllers\admin\StudentsController;
use App\Http\Controllers\admin\UserListController;
use Illuminate\Support\Facades\Route;

// Route::resource()

Route::get('', function() {
    return redirect(route('admin.login'));
});

Route::middleware('guest:admin')->group(function(){

    Route::get('login', [AuthController::class, 'index'])->name('admin.login');
    Route::post('login_process', [AuthController::class, 'login'])->name('admin.login_process');
});

Route::middleware('auth:admin')->group(function(){
    Route::get('logout', [AuthController::class, 'logout'])->name('admin.logout');
});



Route::middleware("auth:admin")->group(function() {

    //функционал сделан

    Route::resource('events', AppController::class); 

    Route::resource('students', StudentsController::class); 
    
    Route::resource('groups', GroupsController::class); 

    Route::resource('departments', DepartmentsController::class); 





    //доделать

    Route::resource('users', UserListController::class); 

    Route::resource('adminUsers', AdminUserListController::class); 

    Route::resource('events.nominations', NominationsController::class); 
    
    Route::resource('events.nominations.requests', NominationsRequestsController::class); 
     
});
