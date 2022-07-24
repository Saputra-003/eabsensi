<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::whereUsertype('Student')->get();
        $data['prodi'] = Prodi::all();
        $data['teori'] = Kelas::whereJenisKelas('Teori')->get();
        $data['praktikum'] = Kelas::whereJenisKelas('Praktikum')->get();
        //        return $data;
        return view('admin.data.mahasiswa', compact('user', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $user = User::create([
            'name' => $request->name,
            'password' => Hash::make($request->nim),
            'email' => $request->email,
            'nim' => $request->nim,
            'usertype' => 'Student',
        ]);
        $user->profile()->create([
            'address' => '-',
            'avatar' => '',
            'date_of_birth' => date('Y-m-d'),
            'gender' => '-',
            'phone_number' => '-'
        ]);
        $mahasiswa = $user->mahasiswa()->create([
            'prodi_id' => $request->prodi_id,
            'angkatan' => $request->angkatan,
            'semester' => $request->semester,
            'status' => 'Aktif'
        ]);
        $mahasiswa->kelas()->sync($request->jenis_kelas);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Mahasiswa $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Mahasiswa $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        $data_mahasiswa = Mahasiswa::with('user', 'kelas', 'prodi')->find($mahasiswa->id);
        return response()->json($data_mahasiswa);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Mahasiswa $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        User::find($mahasiswa->user_id)->update($request->all());
        $mahasiswa->update($request->all());
        $mahasiswa->kelas()->detach();
        $mahasiswa->kelas()->attach($request->jenis_kelas);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Mahasiswa $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        $user->profile()->delete();
        $user->mahasiswa->kelas()->detach();
        $user->mahasiswa()->delete();

        return redirect()->back();
    }

    public function updateStatus(Request $request)
    {
        $mahasiswa = Mahasiswa::find($request->id);
        $mahasiswa->update(['status' => $request->status]);
        return response()->json('success');
    }
}
