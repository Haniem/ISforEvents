<?php

use App\Http\Controllers\admin\AdminUserListController;
use App\Http\Controllers\Admin\AppController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\admin\DepartmentsController;
use App\Http\Controllers\admin\EventsConrtoller;
use App\Http\Controllers\admin\GroupsController;
use App\Http\Controllers\admin\NominationsController;
use App\Http\Controllers\admin\NominationsRequestsController;
use App\Http\Controllers\admin\RequestController;
use App\Http\Controllers\admin\SpecializationController;
use App\Http\Controllers\admin\StudentsController;
use App\Http\Controllers\admin\UserListController;
use Illuminate\Support\Facades\Route;




Route::middleware('auth:web')->group(function(){
    Route::get('', [AppController::class, 'index'])->name('admin.home');

    Route::middleware('guest:admin')->group(function(){
        Route::get('login', [AuthController::class, 'index'])->name('admin.login');
        Route::post('login_process', [AuthController::class, 'login'])->name('admin.login_process');
    });
    
    Route::middleware('auth:admin')->group(function(){
        Route::get('logout', [AuthController::class, 'logout'])->name('admin.logout');
        Route::resource('events', EventsConrtoller::class); 
        Route::resource('students', StudentsController::class);    
        Route::resource('groups', GroupsController::class); 
        Route::resource('departments', DepartmentsController::class); 
        Route::resource('specializations', SpecializationController::class); 
        Route::resource('users', UserListController::class); 
        Route::resource('adminUsers', AdminUserListController::class); 
        
        //доделать
        Route::resource('events.nominations', NominationsController::class); 
        Route::resource('events.nominations.requests', NominationsRequestsController::class); 
    });
});


