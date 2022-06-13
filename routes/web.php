<?php

use App\Http\Controllers\LecturerController;
use App\Http\Controllers\ProfileController;
use App\Models\User;
use GuzzleHttp\Promise\Create;
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

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route Resource
Route::resource('profile', ProfileController::class);
Route::resource('lecturer', LecturerController::class);

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

Route::view('dosen', 'admin.data_dosen');

// Contoh Route dengan middleware //
// Route::get('role', [App\Http\Controllers\HomeController::class, 'index'])->middleware('role:admin,editor');
// Route::group(['middleware' => ['role:admin,editor']], function () {
//     Route::get('home', 'HomeController@index');
// });

Route::get('/changepassword', [App\Http\ChangePassword\ChangePasswordController::class, 'index'])->name('changepassword');