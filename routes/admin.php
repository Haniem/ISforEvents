<?php

use App\Http\Controllers\Admin\AppController;
use App\Http\Controllers\Admin\AuthController;

use Illuminate\Support\Facades\Route;

// Route::resource()

Route::get('', function() {
    return redirect(route('admin.login'));
});

Route::get('login', [AuthController::class, 'index'])->name('admin.login');
Route::post('login_process', [AuthController::class, 'login'])->name('admin.login_process');
Route::get('logout', [AuthController::class, 'logout'])->name('admin.logout');


Route::middleware("auth:admin")->group(function() {

    Route::resource('events', AppController::class); 
     
});
