<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Prodi;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/register';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'role:Admin']);
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        $prodi = Prodi::all();
        return view('auth.register', compact('prodi'));
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        // $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 201)
            : redirect($this->redirectPath());
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // dd($data);
        if ($data['data'] == 'mahasiswa') {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'nim' => $data['nim'],
                'password' => Hash::make($data['nim']),
                'usertype'  =>  'Student',
            ]);
            $user->profile()->create([
                'address'   =>  'null',
                'avatar'   =>  '',
                'date_of_birth'   =>  date('Y-m-d'),
                'gender'    =>  'null',
                'phone_number'  =>  'null'
            ]);
            $user->mahasiswa()->create([
                'prodi_id' => $data['prodi_id'],
                'angkatan' => $data['angkatan'],
                'semester' => $data['semester'],
                'status'    => 'Aktif'
            ]);
        } else {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'nim' => $data['nim'],
                'password' => Hash::make($data['nim']),
                'usertype'  =>  'Dosen',
            ]);
            $user->profile()->create([
                'address'   =>  'null',
                'avatar'   =>  '',
                'date_of_birth'   =>  date('Y-m-d'),
                'gender'    =>  'null',
                'phone_number'  =>  'null'
            ]);
        }
    }

    public function getkelas(Prodi $prodi)
    {
        // $data_prodi = Prodi
        // $kelas = array()
        $kelas = [$prodi->kelas()->where('jenis_kelas', 'Teori')->get(), $prodi->kelas()->where('jenis_kelas', 'Praktikum')->get()];
        return response()->json($kelas);
    }
}
