<?php

namespace App\Http\Controllers;

use Image;
use File;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = User::find(Auth::id());
        
        return view('profile', compact('profile'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return $request;
        $avatar = $request->file('avatar');
        if ($avatar) {
            $old_avatar = Auth::user()->profile->avatar;
            $nama_file = time() . "_" . $avatar->getClientOriginalName();
            // $tujuan_upload = 'profiles_img';
            // $avatar->move($tujuan_upload, $nama_file);

            $destinationPath = public_path('/profile_images');
            $img = Image::make($avatar->path());
            $img->resize(128, 128)->save($destinationPath . '/' . $nama_file);

            File::delete('profile_images/' . $old_avatar);

            $user = User::find($id);
            $user->profile()->update([
                'avatar' => $nama_file,
            ]);
        }else{
            $user = User::find($id);
            $user->update(['name' => $request->name]);
            $user->profile()->update([
                'address' => $request->address,
                'date_of_birth' => $request->date_of_birth,
                'gender' => $request->gender,
                'phone_number' => $request->phone_number,
            ]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
