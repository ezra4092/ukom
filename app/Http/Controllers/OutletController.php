<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use Illuminate\Http\Request;

class OutletController extends Controller
{
    public function index(){
        return view('konten.outlet', [
            'data' => Outlet::all(),
            'title' => 'Outlet - UKOM'
        ]);
    }

    public function tambah_outlet(Request $request){
        // dd($request->all());
        $outlet = new Outlet();
        $outlet->nama = $request->nama;
        $outlet->alamat = $request->alamat;
        $outlet->tlp = $request->tlp;
        $outlet->save();

        return redirect()->route('outlet');
    }

    public function hapus_outlet(Request $request){
        // dd($request->all());
        $outlet = $request->id;
        $hapus = Outlet::where('id', $outlet)->first();
        $hapus->delete();

        return redirect()->route('outlet');
    }

    public function edit_outlet(Request $request){
        // dd($request->all());
        $outlet = $request->id;
        $edit = Outlet::find($outlet);
        $edit->nama = $request->nama;
        $edit->alamat = $request->alamat;
        $edit->tlp = $request->tlp;
        $edit->save();

        return redirect()->route('outlet');
    }
}
