<?php

use App\Http\Controllers\RequestController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\ProfileController;
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



//Мероприятия

Route::get('/', [AppController::class, 'homePage'])->name('home');

Route::get('/events', [AppController::class, 'events'])->name('events');

Route::get('/events/event_types', [AppController::class, 'event_types'])->name('event_types');

Route::get('/events/{event_type}', [AppController::class, 'show_event_with_type'])->name('show_event_with_type');

Route::get('/events/event/{id}', [EventController::class, 'eventDetail'])->name('event_detail');
Route::post('/addNomination_process', [EventController::class, 'addNomination'])->name('addNomination_process');
Route::post('/addResult_process', [EventController::class, 'addResult'])->name('addResult_process');

Route::get('/events/event/{id}/nomination/{id_nomination}', [EventController::class, 'show_event_nomination'])->name('event_nomination');
Route::post('/addStage_process', [EventController::class, 'addStage'])->name('addStage_process');
Route::delete('/events/event/{id}/nomination/{id_nomination}/stage/{id_stage}/delete', [RequestController::class, 'destroyStage'])->name('stages.destroy');
Route::get('/events/event/{id}/nomination/{id_nomination}/stage/{id_stage}', [RequestController::class, 'index'])->name('stageRequests.index');
Route::post('/events/event/{id}/nomination/{id_nomination}/stage/{id_stage}', [RequestController::class, 'store'])->name('stageRequests.store');

Route::get('/events/event/{id}/nomination/{id_nomination}/stage/{id_stage}/request/{id_request}/edit', [RequestController::class, 'edit'])->name('stageRequests.edit');
Route::put('/events/event/{id}/nomination/{id_nomination}/stage/{id_stage}/request/{id_request}/update', [RequestController::class, 'update'])->name('stageRequests.update');
Route::delete('/events/event/{id}/nomination/{id_nomination}/stage/{id_stage}/request/{id_request}', [RequestController::class, 'destroy'])->name('stageRequests.destroy');


//Авторизация

Route::middleware("auth:web")->group(function() {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    
    Route::get('/profile/{id_user}', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/{id_user}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/{id_user}/edit', [ProfileController::class, 'update'])->name('profile.update');
});

Route::middleware("guest:web")->group(function() {

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login_process', [AuthController::class, 'login'])->name('login_process');
    
    Route::get('/register', [AuthController::class, 'showregisterForm'])->name('register');
    Route::post('/register_process', [AuthController::class, 'register'])->name('register_process');

});
