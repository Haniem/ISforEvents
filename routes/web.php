<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [AppController::class, 'homePage'])->name('home');

Route::get('/events', [AppController::class, 'events'])->name('events');

Route::get('/events/event_types', [AppController::class, 'event_types'])->name('event_types');

Route::get('/events/{event_type}', [AppController::class, 'show_event_with_type'])->name('show_event_with_type');

Route::get('/events/{event_type}/{id}', [AppController::class, 'eventDetail'])->name('events_detail');

Route::get('/addNomination_process', [AppController::class, 'addNomination'])->name('addNomination_process');

Route::get('/events/{event_type}/{id}/{id_nomination}', [AppController::class, 'show_event_nomination'])->name('event_nomination');


Route::get('/addStage_process', [AppController::class, 'addStage'])->name('addStage_process');

Route::middleware("auth")->group(function() {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    

    Route::get('/addEvent', [AppController::class, 'showAddEventForm'])->name('addEvent');
    Route::post('/addEvent_process', [AppController::class, 'addEvent'])->name('addEvent_process');

    
    Route::get('/profile', [AppController::class, 'showProfile'])->name('profile');
});

Route::middleware("guest")->group(function() {

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login_process', [AuthController::class, 'login'])->name('login_process');
    
    Route::get('/register', [AuthController::class, 'showregisterForm'])->name('register');
    Route::post('/register_process', [AuthController::class, 'register'])->name('register_process');

});