<?php

namespace App\Http\Controllers;

use App\Models\Detail_Transaksi;
use App\Models\Member;
use App\Models\Outlet;
use App\Models\Paket;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    public function index()
    {
        $id = auth()->user()->id_outlet;
        return view('konten.paket', [
            'data' => Paket::where('id_outlet', $id )->get(),
            'title' => 'Paket - UKOM'
        ]);
    }

    public function tambah_paket(Request $request)
    {
        // dd($request->all());
        $paket = new Paket();
        $paket->jenis = $request->jenis;
        $paket->nama_paket = $request->nama_paket;
        $paket->harga = $request->harga;
        $paket->id_outlet = $request->id_outlet;
        $paket->save();

        return redirect()->route('paket')->with('success', 'Data paket berhasil ditambahkan.');

    }

    public function hapus_paket(Request $request)
    {

        $id = $request->id;
        Detail_Transaksi::where('id_paket', $id)->delete();

        $paket = Paket::find($id);
        if ($paket) {
            $paket->delete();
        }

        return redirect()->route('paket')->with('success', 'Paket dan transaksi terkait berhasil dihapus.');

    }

    public function edit_paket(Request $request)
    {
        //dd($request->all());
        $edit = $request->id;
        $paket = Paket::find($edit);
        $paket->jenis = $request->jenis;
        $paket->nama_paket = $request->nama_paket;
        $paket->harga = $request->harga;
        $paket->id_outlet = $request->id_outlet;
        $paket->save();
        return redirect()->route('paket')->with('success', 'Data paket berhasil ditambahkan.');

    }
}
