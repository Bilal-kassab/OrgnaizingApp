<?php

use App\Http\Controllers\UserController;
use App\Models\Room;
use App\Models\Task;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    // return "ff";
    return view('layouts.app');
});
Route::get('/hh', function () {
    return "crreate task";
})->name('tasks.create');
Route::get('/gg', function () {
    return "index task";
})->name('tasks.index');

Route::get('/ff/{roomId}', function ($roomId) {
    $tasks=Task::where('room_id',$roomId)->latest()->get();
    return view('tasks.index',compact('roomId','tasks'));
});

Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');



