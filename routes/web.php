<?php

use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('user', UserController::class)->names([
    'index' => 'user.index',
    'destroy' => 'user.destroy',
    'create' => 'user.create',
    'update' => 'user.update'
]);

Route::resource('role', RoleController::class)->names([
    'index' => 'role.index',
    'destroy' => 'role.destroy',
    'create' => 'role.create',
    'update' => 'role.update'
]);
