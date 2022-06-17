<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Prodi;
use Arr;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prodi = Prodi::all();
        return view('admin.data.prodi', compact('prodi'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        // $kelas = array($request->kelas);
        // $kelas = [];
        $prodi = Prodi::create($request->all());
        foreach ($request->kelas as $key) {
            // array_push($kelas, $key);
            $prodi->kelas()->create([
                'kelas' => $key,
            ]);
        }
        // return $kelas;
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function show(Prodi $prodi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function edit(Prodi $prodi)
    {
        // $prodi = Prodi::all();
        // $prodi_kelas = Prodi::find($prodi->id);
        $prodi_kelas = Prodi::with('kelas')->find($prodi->id);
        return response()->json($prodi_kelas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prodi $prodi)
    {
        // $prodi->update($request->all());
        $i = 0;
        $kelas = Prodi::find($prodi->id)->kelas;
        foreach ($kelas as $key) {
            Kelas::whereId($key->id)->update(['kelas' => $request->kelas[$i]]);
            $i++;
        }
        // return $hasil;
        // return [$request->all(), $prodi];
        // $comment = Post::find(1)->comments()
        //             ->where('title', 'foo')
        //             ->first();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prodi $prodi)
    {
        Prodi::destroy($prodi->id);
        $prodi->kelas()->each(function ($prodi) {
            $prodi->delete();
        });
        return redirect()->back();
    }
}
