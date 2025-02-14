<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        return view('konten.user', [
            'data' => User::all(),
            'outlet' => Outlet::all(),
            'title' => 'User - UKOM'
        ]);
    }

    public function tambah_user(Request $request){
        $request->validate(['password' => 'required|min:4',]);
        $user = New User();
        $user->nama = $request->nama;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->id_outlet = $request->id_outlet;
        $user->save();

        return redirect()->route('user');
    }

    public function hapus_user(Request $request){
        // dd($request->all());
        $outlet = $request->id;
        $hapus = User::where('id', $outlet)->first();
        $hapus->delete();

        return redirect()->route('user');
    }

    public function edit_user(Request $request){
        // dd($request->all());
        $edit = User::find($request->id);
        if ($request->password == null){
            $edit->nama = $request->nama;
            $edit->username = $request->username;
            $edit->role = $request->role;
            $edit->id_outlet = $request->id_outlet;
            $edit->save();
        } else {
            $edit->nama = $request->nama;
            $edit->username = $request->username;
            $edit->password = Hash::make($request->password);
            $edit->role = $request->role;
            $edit->id_outlet = $request->id_outlet;
            $edit->save();
        }
        return redirect()->route('user');
    }
}
