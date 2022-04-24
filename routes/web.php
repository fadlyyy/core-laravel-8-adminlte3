<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Login_controller;

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
    // return view('welcome');
    return view('layouts.main', [
        'title' => 'Blank Page | sangcahaya.id'
    ]);
});

Route::get('/login', [Login_controller::class, 'index'])->name('login');
Route::post('/login', [Login_controller::class, 'authenticate']);
Route::get('keluar', function (Request $request) {
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();
    return redirect('login');
});

Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index']);
});
