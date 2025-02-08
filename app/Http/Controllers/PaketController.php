<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Outlet;
use App\Models\Paket;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    public function index(){
        $user = auth()->user();
        return view('konten.paket', [
            'data' => Paket::all(),
            'outlet' => Outlet::where('id', $user->id_outlet)->value('nama'),
            'title' => 'Paket - UKOM'
        ]);
    }

    public function tambah_paket(Request $request){
        // dd($request->all());
        $paket = new Paket();
        $paket->jenis = $request->jenis;
        $paket->nama_paket = $request->nama_paket;
        $paket->harga = $request->harga;
        $paket->id_outlet = $request->id_outlet;
        $paket->save();

        return redirect()->route('paket');
    }

    public function hapus_paket(Request $request){
        $paket = $request->id;
        $hapus = Paket::find($paket);
        $hapus->delete();

        return redirect()->route('paket');
    }

    public function edit_paket(Request $request){
        //dd($request->all());
        $edit = $request->id;
        $paket = Paket::find($edit);
        $paket->jenis = $request->jenis;
        $paket->nama_paket = $request->nama_paket;
        $paket->harga = $request->harga;
        $paket->id_outlet = $request->id_outlet;
        $paket->save();

        return redirect()->route('paket');
    }
}
