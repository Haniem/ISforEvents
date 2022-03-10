<?php

use App\Http\Controllers\Admin\AppController;
use App\Http\Controllers\Admin\AuthController;

use Illuminate\Support\Facades\Route;

// Route::resource()

Route::get('login', [AuthController::class, 'index'])->name('admin.login');


Route::post('login_process', [AuthController::class, 'login'])->name('admin.login_process');


Route::middleware("auth:admin")->group(function() {

    Route::resource('posts', AppController::class); 
     
});
