<?php

use App\Http\Controllers\KelasController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\ProfileController;
use App\Models\Kelas;
use App\Models\Prodi;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route Resource
Route::resource('profile', ProfileController::class);
Route::resource('mahasiswa', MahasiswaController::class);
Route::resource('prodi', ProdiController::class)->middleware('auth');
Route::resource('kelas', KelasController::class);

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

// Route::view('datatable', 'admin.data.home_datatable');
Route::get('pro', function () {
    // $prodi = Prodi::all();
    $prodi = Prodi::with('kelas')->find(3);

    // $kelas = $prodi->kelas()->create([
    //     'kelas' => 'A new comment.',
    // ]);
    // $kelas = new Kelas(['kelas' => 'A new kelas.']);

    // $prodi = Prodi::find(1);

    // $prodi->kelas()->save($kelas);
    return $prodi;
});

// Contoh Route dengan middleware //
// Route::get('role', [App\Http\Controllers\HomeController::class, 'index'])->middleware('role:admin,editor');
// Route::group(['middleware' => ['role:admin,editor']], function () {
//     Route::get('home', 'HomeController@index');
// });
