<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use DB;

class AkunController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('myrole:superadmin')->except('index','show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::where('role', 'admin')->get();
        return view('akun.index', [
            'data'      => $data,
            'title'     => 'Akun',
            'active'    => 'akun.index',
            'createLink'=>route('akun.create'),
            'role'=>'superadmin'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('akun.tambah', [
            'title'         => 'Tambah Akun',
            'modul_link'    => route('akun.index'),
            'modul'         => 'Akun',
            'action'        => route('akun.store'),
            'active'        => 'akun.index',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'username'=>'required|min:5',
            'password'=>'required|min:5',
        ]);
        if(User::count() == 0){
            DB::statement('set foreign_key_checks=0;');
            User::truncate();
        }
        $data = [
            'username'=>$request->username,
            'password'=>bcrypt($request->password),
            'role'=>'admin',
        ];
        if($request->avatar){
            $path = $request->file('avatar')->store('public/avatars');
            $data['avatar'] = asset(str_replace('\\', '/', str_replace('public/', 'storage/', $path)));
        }
        User::create($data);
        return redirect()->route('akun.index')->with('success_msg', 'Akun berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Akun  $akun
     * @return \Illuminate\Http\Response
     */
    public function show(User $akun)
    {
        return view('akun.detail', [
            'd'=>$akun,
            'title'=>'Detail Akun',
            'modul_link'=>route('akun.index'),
            'modul'=>'Akun',
            'action'=>false,
            'active'=>'akun.index',
            'saveBtn'=>false,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Akun  $akun
     * @return \Illuminate\Http\Response
     */
    public function edit(User $akun)
    {
        $user = $akun;
        return view('akun.ubah', [
            'd'             => $user,
            'title'         => 'Ubah Akun',
            'modul_link'    => route('akun.index'),
            'modul'         => 'Akun',
            'action'        => route('akun.update', $user->id),
            'active'        => 'akun.edit',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $akun
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $akun)
    {
        $user = $akun;
        $rule = [
            'password'     => 'nullable',
        ];
        $data = [

        ];
        $rule['username']            = 'required';
        if($request->username != $request->old_username){
            $rule['username']            = 'required|unique:users';
        }
        $data['username']    = $request->username;
        if($request->password){
            $data['password'] = bcrypt($request->password);
        }
        if($request->avatar){
            $path = $request->file('avatar')->store('public/avatars');
            $data['avatar'] = asset(str_replace('\\', '/', str_replace('public/', 'storage/', $path)));
        }
        $request->validate($rule);
        $user->update($data);
        return redirect()->route('akun.index')->with('success_msg', 'Akun berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Akun  $akun
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $akun)
    {
        $akun->delete();
        return redirect()->route('akun.index')->with('success_msg', 'Akun berhasil dihapus');
    }

    public function imporExcel()
    {
        return view('akun.impor-excel', [
            'title'         => 'Impor Akun dari Excel',
            'modul_link'    => route('akun.index'),
            'modul'         => 'Akun',
            'action'        => route('akun.impor-excel'),
            'active'        => 'akun.index',
        ]);
    }

    public function postExcel(Request $r)
    {
        // dd($r->all());
        return view('akun.impor-excel', [
            'title'         => 'Impor Akun dari Excel',
            'modul_link'    => route('akun.index'),
            'modul'         => 'Akun',
            'action'        => route('akun.impor-excel'),
            'active'        => 'akun.index',
        ]);
    }
}
