<?php

namespace App\Http\Controllers;

use App\Imports\TransaksiLaporan;
use App\Models\Detail_Transaksi;
use App\Models\Member;
use App\Models\Outlet;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class TransaksiController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $outletId = $user->id_outlet;

        // Mengambil data transaksi berdasarkan outlet dan melakukan transformasi tanggal
        $transaksi = Transaksi::where('id_outlet', $outletId)
            ->get()
            ->transform(function ($item) {
                // Memisahkan tanggal dari format datetime
                $item->tgl = explode(" ", $item->tgl)[0];
                $item->batas_waktu = explode(" ", $item->batas_waktu)[0];
                return $item;
            });
        return view('konten.transaksi', [
            'data' => $transaksi,
            'outlet' => Outlet::where('id', $user->id_outlet)->value('nama'),
            'member' => Member::all(),
            'petugas' => User::where('id', $user)->value('nama'),
            'title' => 'Transaksi - UKOM'

        ]);
    }

    public function tambah_transaksi(Request $request)
    {
        $transaksi = new Transaksi();
        $transaksi->id_outlet = $request->id_outlet;
        // $transaksi->kode_invoice = Str::random(5);
        $transaksi->kode_invoice = 'INV-' . mt_rand(10000, 99999);
        $transaksi->id_member = $request->id_member;
        $transaksi->tgl = $request->tgl;
        $transaksi->batas_waktu =  Carbon::parse($request->tgl)->addDays(3);
        $transaksi->tgl_bayar = $request->tgl_bayar;
        $transaksi->biaya_tambahan = $request->biaya_tambahan;
        $transaksi->diskon = $request->diskon;
        $transaksi->pajak = $request->pajak;
        $transaksi->status = $request->status;
        $transaksi->dibayar = $request->dibayar;
        $transaksi->id_user = $request->id_user;

        $transaksi->save();
        return redirect()->route('transaksi');
    }

    public function hapus_transaksi(Request $request)
    {
        // dd($request->all());
        $transaksi = $request->id;
        $hapusdetail = Detail_Transaksi::where('id_transaksi', $transaksi);
        $hapusdetail->delete();
        $hapustransaksi = Transaksi::where('id', $transaksi)->first();
        $hapustransaksi->delete();

        return redirect()->route('transaksi');
    }

    public function edit_transaksi(Request $request)
    {
        // dd($request->all());
        $transaksi = Transaksi::where('id', $request->id)->first();
        $transaksi->tgl = $request->tgl;
        $transaksi->batas_waktu =  $request->batas_waktu;
        $transaksi->tgl_bayar = $request->tgl_bayar;
        $transaksi->biaya_tambahan = $request->biaya_tambahan;
        $transaksi->diskon = $request->diskon;
        $transaksi->pajak = $request->pajak;
        $transaksi->status = $request->status;
        $transaksi->dibayar = $request->dibayar;
        $transaksi->save();

        return redirect()->route('transaksi');
    }

    public function import(){
        return Excel::download(new TransaksiLaporan, 'Transaksi.xlsx');
        return redirect()->route('transaksi');
    }
}
