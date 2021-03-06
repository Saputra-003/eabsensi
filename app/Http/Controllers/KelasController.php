<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $kelas = Kelas::all();
        // return view('admin.data.kelas', compact('kelas'));
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
        Kelas::create($request->all());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Kelas $kelas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mahasiswa = Mahasiswa::whereHas('kelas', function ($q) use ($id) {
            $q->where(['kelas_id' => $id, 'status' => 'Aktif']);
        })->get();

        $kelas = Kelas::find($id);
        return view('admin.data.kelas', compact(['mahasiswa', 'kelas']));

        // Get All Who Dont Have Relation//
        // $userId = 1;
        // $books = Book::whereDoesntHave('users', function ($q) use ($userId) {
        //     $q->where('user_id', $userId);
        // })->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Kelas $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelas $kelas)
    {
        return response()->json($kelas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Kelas $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kelas $kelas)
    {
        $kelas->update($request->all());
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Kelas $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelas $kelas)
    {
        Kelas::destroy($kelas->id);
        return redirect()->back();
    }
}
