<?php

namespace App\Http\Controllers;

use App\Models\Detail_Transaksi;
use App\Models\Member;
use App\Models\Outlet;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        // $request->validate(['password' => 'required|min:4',]);
        // $user = New User();
        // $user->nama = $request->nama;
        // $user->username = $request->username;
        // $user->password = Hash::make($request->password);
        // $user->role = $request->role;
        // $user->id_outlet = $request->id_outlet;
        // $user->save();

        // return redirect()->route('user')->with('success', 'Data user berhasil ditambahkan.');

        $request->validate(['password' => 'required|min:4',]);

        $existingMember = User::where('username', $request->username)
            ->first();

        if ($existingMember) {
            return redirect()->back()->with('error', 'User sudah terdaftar.');
        }
        $user = New User();
        $user->nama = $request->nama;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->id_outlet = $request->id_outlet;
        $user->save();

        return redirect()->back()->with('success', 'User berhasil ditambahkan.');
    }

    public function hapus_user(Request $request){
        // dd($request->all());
        // $outlet = $request->id;
        // $hapus = User::where('id', $outlet)->first();
        // $hapus->delete();

        $id = $request->id;
        $detailIds = Transaksi::where('id_user', $id)->pluck('id')->toArray();
        if (($detailIds)) {
            Detail_Transaksi::whereIn('id_transaksi', $detailIds)->delete();
        }
        Transaksi::where('id_user', $id)->delete();

        $user = User::find($id);
        if ($user) {
            $user->delete();
        }

        return redirect()->route('user')->with('success', 'User dan data transaksi terkait berhasil dihapus.');
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
        return redirect()->route('user')->with('success', 'Data outlet berhasil diedit.');
    }
}
