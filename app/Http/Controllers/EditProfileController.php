<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Image;

class EditProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit(){
        return view('edit', array('user' => Auth::user()) );
    }

    public function update(Request $request)
    {
        if($request->hasFile('avatar')) {
           
            /*$avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();

            $request->file('avatar')->store('public');
            $user->save(public_path('/avatars/'. $filename));
            $user = Auth::user();
            $user->avatar=  $request->file('avatar')->store('public');
            $user->save();*/

            $profileImage = $request->file('avatar');
            $profileImageSaveAsName = time() . "." . $profileImage->getClientOriginalExtension();
            $upload_path = 'avatars/';
            $profile_image_url = $upload_path . $profileImageSaveAsName;
            $success = $profileImage->move($upload_path, $profileImageSaveAsName);

            $user = Auth::user();
            $user->name = $request->name;
            $user->surname = $request->surname;
            $user->avatar = $profile_image_url;
            $user->save();

            return view('profile', array('user' => Auth::user()) );
        }

        $user = Auth::user();
        $user->name = $request->name;
        $user->surname = $request->surname;
        return view('profile', array('user' => Auth::user()) );
    }
}