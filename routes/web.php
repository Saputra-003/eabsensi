<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route Testing
Route::get('template', function () {
    return view('layouts.app');
});
Route::get('role', function () {
    return view('role');
})->middleware('role:admin,user');
Route::get('reject', function () {
    return 'GA LEWAT BRO';
});

// Contoh Route dengan middleware //
// Route::get('role', [App\Http\Controllers\HomeController::class, 'index'])->middleware('role:admin,editor');
// Route::group(['middleware' => ['role:admin,editor']], function () {
//     Route::get('home', 'HomeController@index');
// });