<?php

use Illuminate\Support\Facades\Route;
use Spatie\Permission\Traits\HasRoles;
use App\Http\Controllers\ForumController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware('auth')->group(function () {

    Route::group(['middleware' => ['role:admin|moderator']], function () {


        Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'admin'])->name('dashboard');

    });

    //place routes below for auth enabled features

});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/forum', [App\Http\Controllers\ForumController::class, 'index'])->name('forum');

