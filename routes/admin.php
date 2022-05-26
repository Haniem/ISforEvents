<?php

use App\Http\Controllers\Admin\AppController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\admin\StudentsController;


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

    Route::resource('events', AppController::class); 

    Route::resource('events.nominations', AppController::class); 
    
    Route::resource('students', StudentsController::class); 
     
});
