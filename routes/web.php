<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ListController;
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

Route::get('/events/bytype/{id}', [AppController::class, 'eventDetail'])->name('event_detail');
Route::post('/addNomination_process', [AppController::class, 'addNomination'])->name('addNomination_process');

Route::get('/events/bytype/{id}/{id_nomination}', [AppController::class, 'show_event_nomination'])->name('event_nomination');
Route::post('/addStage_process', [AppController::class, 'addStage'])->name('addStage_process');



//Списки

Route::get('/lists', [ListController::class, 'showLists'])->name('allLists');

//Список группы
Route::get('/lists/groups', [ListController::class, 'showGroups'])->name('showGroups');
Route::post('/lists/groups/add', [ListController::class, 'addGroup'])->name('addGroup');
Route::delete('/lists/groups/delete', [ListController::class, 'deleteGroup'])->name('deleteGroup');

//Список отделений
Route::get('/lists/departments', [ListController::class, 'showDeaprtments'])->name('showDeaprtments');
Route::post('/lists/departments/add', [ListController::class, 'addDepartment'])->name('addDepartment');
Route::delete('/lists/departments/delete', [ListController::class, 'deleteDepartment'])->name('deleteDepartment');

//Список студентов
Route::get('/lists/students', [ListController::class, 'showStudents'])->name('showStudents');
Route::post('/lists/students/add', [ListController::class, 'addStudent'])->name('addStudent');
Route::delete('/lists/students/delete', [ListController::class, 'deleteStudent'])->name('deleteStudent');


//Авторизация

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