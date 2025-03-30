<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskDetailController;
use App\Http\Controllers\UserController;
use App\Models\Room;
use App\Models\Task;
use App\Models\TaskDetail;
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

Route::get('/f', function () {
    // return view('welcome');
    // return "ff";
    return view('layouts2.app');
});

Route::get('/room-tasks/{roomId}', [TaskController::class,'roomTasks'])->name('tasks.index');
Route::get('/create/{roomId}', [TaskController::class,'create'])->name('tasks.create');
Route::post('/store', [TaskController::class,'store'])->name('tasks.store');
Route::get('/edit/{task}', [TaskController::class,'edit'])->name('tasks.edit');
Route::post('/update', [TaskController::class,'update'])->name('tasks.update');
Route::post('/delete/{task}', [TaskController::class,'destroy'])->name('tasks.destroy');


Route::get('/task-details/{taskId}', [TaskDetailController::class,'index'])->name('taskDetails.index');
Route::get('/create-task-details/{taskId}', [TaskDetailController::class,'create'])->name('taskDetails.create');
Route::post('/store-task-details', [TaskDetailController::class,'store'])->name('taskDetails.store');


// Route::get('/room-tasks/{roomId}', function ($roomId) {
//     $tasks=Task::where('room_id',$roomId)->latest()->get();
//     return view('tasks.index',compact('roomId','tasks'));
// })->name('tasks.index');

Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');



Route::get('/', function () {
    return view('layouts/app');
    // return "ff";
});
    // Registration

Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [AuthController::class, 'register']);


 // Login
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login']);

// Authentication Routes
Route::middleware('guest')->group(function () {
    // Login


    // Registration

    // Password Reset
    Route::get('forgot-password', [AuthController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('forgot-password', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');

    Route::get('reset-password/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
    Route::post('reset-password', [AuthController::class, 'reset'])->name('password.update');
});



Route::get('/app', function () {
    return view('layouts/app');
})->name('app');


Route::middleware('auth')->group(function () {
    // Logout
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    //dashboard
    Route::get('/dashboard', function () {
        return view('layouts/dashboard');
    })->name('dashboard');

    //profile
    Route::get('profile', [UserController::class, 'showProfile'])->name('profile');
    //update profile
    Route::post('profile_update', [UserController::class, 'update'])->name('profile.update');
    //saerch


    //search User
    Route::get('/users/search', [UserController::class, 'search'])->name('users.search');

});


Route::get('search', function(){
    return view("user/search");
});



