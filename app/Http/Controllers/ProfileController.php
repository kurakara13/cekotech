<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller
{
    public function index()
    {
    	return view('profil.index',[
    		'title'=>'Profil Saya',
    		'modul_link'=>'',
    		'modul'=>'Profil',
    		'action'=>route('profile.update'),
    		'active'=>''
    	]);
    }

    public function update(Request $request)
    {
    	$user = Auth::user();
        $rule = [
            'password'     => 'nullable',
        ];
        $data = [
            
        ];
        if($user->role == 'superadmin'){
            $rule['username']            = 'required';
            if($request->username != $request->old_username){
                $rule['username']            = 'required|unique:users';
            }
            $data['username']    = $request->username;
        }
        if($request->password){
            $data['password'] = bcrypt($request->password);
        }
        if($request->avatar){
            $path = $request->file('avatar')->store('public/avatars');
            $data['avatar'] = asset(str_replace('\\', '/', str_replace('public/', 'storage/', $path)));
        }
        $request->validate($rule);
        $user->update($data);
        return redirect()->route('profile')->with('success_msg', 'Profil berhasil diperbarui');
    }
}
