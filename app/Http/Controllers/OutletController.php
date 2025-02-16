<?php

namespace App\Http\Controllers;

use App\Models\Detail_Transaksi;
use App\Models\Member;
use App\Models\Outlet;
use App\Models\Paket;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OutletController extends Controller
{
    public function index()
    {
        return view('konten.outlet', [
            'data' => Outlet::all(),
            'title' => 'Outlet - UKOM'
        ]);
    }

    public function tambah_outlet(Request $request)
    {
        // dd($request->all());
        $outlet = new Outlet();
        $outlet->nama = $request->nama;
        $outlet->alamat = $request->alamat;
        $outlet->tlp = $request->tlp;
        $outlet->save();

        return redirect()->route('outlet')->with('success', 'Data outlet berhasil ditambahkan.');

    }

    public function hapus_outlet(Request $request)
    {
        $id = $request->id;
        $detailIds = Transaksi::where('id_outlet', $id)->pluck('id')->toArray();

        $paketIds = Paket::where('id_outlet', $id)->pluck('id')->toArray();

        if (!empty($detailIds)) {
            Detail_Transaksi::whereIn('id_transaksi', $detailIds)->delete();
        }

        if (!empty($paketIds)) {
            Detail_Transaksi::whereIn('id_paket', $paketIds)->delete();
        }
        Transaksi::where('id_outlet', $id)->delete();
        Paket::where('id_outlet', $id)->delete();
        User::where('id_outlet', $id)->delete();

        $memberIds = Transaksi::where('id_outlet', $id)->pluck('id_member')->toArray();
        if (!empty($memberIds)) {
            Member::whereIn('id', $memberIds)->delete();
        }

        $outlet = Outlet::find($id);
        if ($outlet) {
            $outlet->delete();
        }

        return redirect()->route('outlet')->with('success', 'Outlet dan transaksi terkait berhasil dihapus.');
    }

    public function edit_outlet(Request $request)
    {
        // dd($request->all());
        $outlet = $request->id;
        $edit = Outlet::find($outlet);
        $edit->nama = $request->nama;
        $edit->alamat = $request->alamat;
        $edit->tlp = $request->tlp;
        $edit->save();

        return redirect()->route('outlet')->with('success', 'Data outlet berhasil diedit.');

    }
}
