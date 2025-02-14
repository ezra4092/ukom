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

        return redirect()->route('outlet');
    }

    // public function hapus_outlet(Request $request)
    // {
    //     // dd($request->all());
    //     $id = $request->id;
    //     $detailIds = Transaksi::where('id_outlet', $id)->first();
    //     Detail_Transaksi::whereIn('id_transaksi', $detailIds)->delete();
    //     // $detailIds->each->delete();
    //     Transaksi::where('id', $id)->delete();
    //     Paket::where('id_outlet', $id)->delete();
    //     User::where('id_outlet', $id)->delete();
    //     Member::where('id', $id)->value('id_member')->delete();
    //     $outlet = Outlet::where('id', $id)->first();
    //     $outlet->delete();

    //     return redirect()->route('outlet');
    // }

    public function hapus_outlet(Request $request)
    {
        $id = $request->id;

        // Ambil semua id transaksi terkait outlet ini
        $detailIds = Transaksi::where('id_outlet', $id)->pluck('id')->toArray();

        // Ambil semua id_paket terkait outlet ini
        $paketIds = Paket::where('id_outlet', $id)->pluck('id')->toArray();

        // Hapus detail transaksi berdasarkan id_transaksi terlebih dahulu
        if (!empty($detailIds)) {
            Detail_Transaksi::whereIn('id_transaksi', $detailIds)->delete();
        }

        // Hapus detail transaksi berdasarkan id_paket untuk memastikan tidak ada yang tersisa
        if (!empty($paketIds)) {
            Detail_Transaksi::whereIn('id_paket', $paketIds)->delete();
        }

        // Hapus transaksi terkait outlet
        Transaksi::where('id_outlet', $id)->delete();

        // Hapus paket setelah semua transaksi & detail transaksi dihapus
        Paket::where('id_outlet', $id)->delete();

        // Hapus user yang terkait outlet
        User::where('id_outlet', $id)->delete();

        // Ambil semua id_member dari transaksi yang terkait dengan outlet sebelum dihapus
        $memberIds = Transaksi::where('id_outlet', $id)->pluck('id_member')->toArray();

        // Hapus member yang pernah bertransaksi di outlet ini
        if (!empty($memberIds)) {
            Member::whereIn('id', $memberIds)->delete();
        }

        // Hapus outlet jika ditemukan
        $outlet = Outlet::find($id);
        if ($outlet) {
            $outlet->delete();
        }

        return redirect()->route('outlet')->with('success', 'Outlet berhasil dihapus.');
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

        return redirect()->route('outlet');
    }
}
