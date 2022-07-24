<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::whereUsertype('Dosen')->get();
        // dd($data);
        return view('admin.data.dosen', compact('data'));
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function show(Dosen $dosen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dosen = User::find($id)->update($request->all());
        // return $dosen;
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        $user->profile()->delete();

        return redirect()->back();
    }

    public function register(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'password' => Hash::make($request->nim),
            'email' => $request->email,
            'nim' => $request->nim,
            'usertype' => 'Dosen',
        ]);
        $user->profile()->create([
            'address' => 'null',
            'avatar' => '',
            'date_of_birth' => date('Y-m-d'),
            'gender' => 'null',
            'phone_number' => 'null'
        ]);
        return redirect()->back();
    }
}
