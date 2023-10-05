<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;

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
    return view('welcome');
});

Route::get('/home', [TaskController::class, 'index'])->name('tasks.index');

Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create')->middleware('auth');

Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store')->middleware('auth');

Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit')->middleware('auth');

Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update')->middleware('auth');

Route::get('/tasks/{task}', [TaskController::class, 'show'])->name('tasks.show')->middleware('auth');

Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy')->middleware('auth');



//Route resource
// Route::resource('tasks', TaskController::class)->middleware('auth');






//Routes for login, logout and register

Route::get('/register', [UserController::class, 'create'])->middleware('guest');

//create new user
Route::post('/users', [UserController::class, 'store']);

//log user out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');


//show login form
Route::get('/login', [UserController::class, 'login'])->name('users.login')->middleware('guest');

//login user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

Route::get('/users/tasks', [UserController::class, 'auth']);





