<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SemesterController;
use App\Models\Course;
use App\Models\Kelas;
use App\Models\Mahasiswa;
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
Route::group(['middleware' => ['role:Admin']], function () {
    Route::get('/getKelas/{prodi}', [App\Http\Controllers\Auth\RegisterController::class, 'getKelas'])->name('register.getKelas');
    //Route Resource
    Route::get('dosen/register', [DosenController::class, 'register'])->name('dosen.register');
    Route::resource('dosen', DosenController::class);
    Route::get('updateStatus', [MahasiswaController::class, 'updateStatus'])->name('mahasiswa.updateStatus');
    Route::resource('mahasiswa', MahasiswaController::class);
    Route::resource('semester', SemesterController::class);
    Route::resource('prodi', ProdiController::class);
    Route::resource('kelas', KelasController::class);
    Route::resource('course', CourseController::class);
});
Route::resource('profile', ProfileController::class);
Route::get('absensi_kelas/{id}', [AbsensiController::class, 'tampil_absensi_mahasiswa'])->name('absensi.absensi_kelas');
Route::resource('absensi', AbsensiController::class)->middleware(['auth', 'role:Dosen']);


// Route::get('role', function () {
//     return view('role');
// })->middleware('role:admin,user');

Route::get('reject', function () {
    return 'GA LEWAT BRO <strong>505</strong>';
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
Route::get('data_mahasiswa', function () {
    // Mahasiswa::create([
    //     'kelas_id'  =>  1,
    //     'prodi_id'  =>  1,
    //     'user_id'  =>  2,
    //     'angkatan'  =>  '2017',
    //     'semester'  =>  '6',
    //     'status'    =>  'aktif',
    // ]);

    // return 'work';
    // $mahasiswa = Mahasiswa::find(1)->user;
    // return $mahasiswa;

    // $user = User::find(3);
    // $user->mahasiswa()->create([
    //     'prodi_id' => '1',
    //     'angkatan' => '2017',
    //     'semester' => '6',
    //     'status'    => 'Aktif'
    // ]);

    // $kelas = Kelas::find(2);

    // $kelas->mahasiswa()->sync([3]);
    $mahasiswa = Mahasiswa::find(1);
    // $mahasiswa->kelas()->detach();
    $mahasiswa->kelas()->attach([3, 2]);
});

route::get('test', function () {
    // $user = User::find(3);
    // return $user->course()->first();
    // $user->course()->sync([1, 2, 3]);
    $course = Course::find(2);
    $course->kelas()->sync([1, 3]);
});

// Contoh Route dengan middleware //
// Route::get('role', [App\Http\Controllers\HomeController::class, 'index'])->middleware('role:admin,editor');
// Route::group(['middleware' => ['role:admin,editor']], function () {
//     Route::get('home', 'HomeController@index');
// });
