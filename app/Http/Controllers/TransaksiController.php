<?php

namespace App\Http\Controllers;

use App\Exports\TransaksiExport;
use App\Models\Detail_Transaksi;
use App\Models\Member;
use App\Models\Outlet;
use App\Models\Paket;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class TransaksiController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $outletId = $user->id_outlet;
        $transaksi = Transaksi::where('id_outlet', $outletId)
            ->get()
            ->transform(function ($item) {
                $item->tgl = explode(" ", $item->tgl)[0];
                $item->batas_waktu = explode(" ", $item->batas_waktu)[0];
                $item->tgl_bayar = explode(" ", $item->tgl_bayar)[0];
                return $item;
            });
        $tgl = Carbon::now();
        return view('konten.transaksi', [
            'data' => $transaksi,
            'outlet' => Outlet::where('id', $user->id_outlet)->value('nama'),
            'member' => Member::where('id_outlet', $outletId)->get(),
            'petugas' => User::where('id', $user)->value('nama'),
            'title' => 'Transaksi - UKOM',
            'paket' => Paket::all(),
            'tanggal' => $tgl->format('Y-m-d'),
            'tgl_bayar' => optional($transaksi->first())->tgl_bayar

        ]);
    }

    public function tambah_transaksi(Request $request)
    {
        // dd($request->all());
        $transaksi = new Transaksi();
        $transaksi->id_outlet = $request->id_outlet;
        $transaksi->kode_invoice = 'INV-' . mt_rand(10000, 99999);
        $transaksi->id_member = $request->id_member;
        $transaksi->tgl = $request->tgl;
        $transaksi->batas_waktu =  Carbon::parse($request->tgl)->addDays(3);
        // $transaksi->tgl_bayar = $request->tgl_bayar;
        $transaksi->biaya_tambahan = $request->biaya_tambahan;
        $transaksi->diskon = $request->diskon;
        $transaksi->pajak = $request->pajak;
        $transaksi->status = $request->status;
        if ($request->tgl_bayar == null) {
            $transaksi->dibayar = 'belum_dibayar';
        }
        $transaksi->id_user = $request->id_user;
        $transaksi->save();

        $id_transaksi = $transaksi->id;

        foreach ($request->id_paket as $index => $id_paket) {
            DB::table('tb_detail_transaksi')->insert([
                'id_transaksi' => $id_transaksi,
                'id_paket' => $id_paket,
                'qty' => $request->qty[$index]
            ]);
        }

        $detailTransaksi = Detail_Transaksi::where('tb_detail_transaksi.id_transaksi', $id_transaksi)->get();
        $total = 0;
        foreach ($detailTransaksi as $i) {
            $total += $i->paket->harga * $i->qty;
        }
        $pajak = $total * 0.02;
        $tambahan = $transaksi->biaya_tambahan;
        $diskon = $transaksi->diskon / 100;
        $diskon2 = $diskon * $total;
        $totaldue = $total + $pajak + $tambahan - $diskon2;
        $transaksi->total = $totaldue;
        $transaksi->pajak = $pajak;
        $transaksi->save();

        return redirect()->route('transaksi')->with('success', 'Data transaksi berhasil ditambahkan');
    }


    public function hapus_transaksi(Request $request)
    {
        // dd($request->all());
        $transaksi = $request->id;
        $hapusdetail = Detail_Transaksi::where('id_transaksi', $transaksi);
        $hapusdetail->delete();
        $hapustransaksi = Transaksi::where('id', $transaksi)->first();
        $hapustransaksi->delete();

        return redirect()->route('transaksi')->with('success', 'Data transaksi berhasil dihapus');
    }

    // public function edit_transaksi(Request $request)
    // {
    //     // dd($request->all());
    //     $transaksi = Transaksi::where('id', $request->id)->first();
    //     $transaksi->tgl = $request->tgl;
    //     $transaksi->batas_waktu =  $request->batas_waktu;
    //     $transaksi->tgl_bayar = $request->tgl_bayar;
    //     if($request->tgl_bayar != null){
    //         $transaksi->dibayar = 'dibayar';

    //     }
    //     $transaksi->biaya_tambahan = $request->biaya_tambahan;
    //     $transaksi->diskon = $request->diskon;
    //     $transaksi->pajak = $request->pajak;
    //     $transaksi->status = $request->status;
    //     $transaksi->diskon = $request->diskon;
    //     $transaksi->save();

    //     return redirect()->route('transaksi')->with('success', 'Data transaksi berhasil diperbarui');
    // }

    public function edit_transaksi(Request $request)
{
    $transaksi = Transaksi::where('id', $request->id)->first();

    $transaksi->tgl = $request->tgl;
    $transaksi->batas_waktu = $request->batas_waktu;
    // Hanya isi tgl_bayar jika sebelumnya NULL (tidak bisa diubah setelah diinput pertama kali)
    if ($transaksi->tgl_bayar == null) {
        $transaksi->tgl_bayar = $request->tgl_bayar;
        if ($request->tgl_bayar != null) {
            $transaksi->dibayar = 'dibayar';
        }
    }

    $transaksi->biaya_tambahan = $request->biaya_tambahan;
    $transaksi->diskon = $request->diskon;
    $transaksi->pajak = $request->pajak;
    $transaksi->status = $request->status;

    $transaksi->save();

    return redirect()->route('transaksi');
}



    public function export()
    {
        return Excel::download(new TransaksiExport(Auth::user()->id_outlet), 'Laporan Transaksi ' . Auth::user()->outlet->nama . '.xlsx');
    }
}
