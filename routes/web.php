<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoomController;
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




// Route::get('/room-tasks/{roomId}', function ($roomId) {
//     $tasks=Task::where('room_id',$roomId)->latest()->get();
//     return view('tasks.index',compact('roomId','tasks'));
// })->name('tasks.index');

Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');



Route::get('/', function () {
    return view('auth/app');
    // return "ff";
})->name('app');
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


Route::middleware('auth')->group(function () {
    // Logout
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    //dashboard
    Route::get('/dashboard', function () {
        return view('home/dashboard');
    })->name('dashboard');

    //profile
    Route::get('profile', [UserController::class, 'showProfile'])->name('profile');
    //update profile
    Route::post('profile_update', [UserController::class, 'update'])->name('profile.update');
    Route::view('updateProfile', 'auth.updateProfile')->name(name: 'update_profile');

    //search User
    Route::get('/users/search', [UserController::class, 'search'])->name('users.search');

    //rooms
    Route::prefix('rooms')->name('rooms.')->controller(RoomController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        // Route::post('/update/{id}', 'update')->name('rooms.update');

        Route::middleware('room.owner')->group(function () {
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update/{id}', 'update')->name('update');
            Route::post('/destroy/{id}', 'destroy')->name('destroy');
        });
    });

    // tasks

    Route::controller(TaskController::class)->group(function () {
        Route::middleware(['room.member'])->group(function () {
            Route::get('/room-tasks/{roomId}', 'roomTasks')->name('tasks.index');
            Route::get('/create/{roomId}', 'create')->name('tasks.create');
        });
        Route::post('/store', 'store')->name('tasks.store');

        Route::middleware(['task.access'])->group(function () {
            Route::get('/edit/{task}', 'edit')->name('tasks.edit');
            Route::post('/delete/{task}', 'destroy')->name('tasks.destroy');
        });
        Route::post('/update',  'update')->name('tasks.update');

    });


    // task details

    Route::controller(TaskDetailController::class)->group(function () {
        Route::middleware('can.access.task.details')->group(function () {
            Route::get('/task-details/{taskId}', 'index')->name('taskDetails.index');
            Route::get('/create-task-details/{taskId}', 'create')->name('taskDetails.create');
        });

        Route::post('/store-task-details',  'store')->name('taskDetails.store');

    });

    Route::get('search', function(){
        return view("user/search");
    });
});
Route::get('hh', function(){

      $room =Room::create([
            "name"=>'name',
            "description"=>'description',
            "wallet"=>50
        ]);
        return $room;
});
