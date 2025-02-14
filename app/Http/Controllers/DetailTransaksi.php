<?php

namespace App\Http\Controllers;

use App\Models\Detail_Transaksi;
use App\Models\Member;
use App\Models\Outlet;
use App\Models\Paket;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;

class DetailTransaksi extends Controller
{
    // public function index($id){
    //     // dd($id);
    //     $detail = Transaksi::where('id', $id)->first();
    //     $petugas = Transaksi::join('tb_user', 'tb_transaksi.id_user', '=', 'tb_user.id')->where('tb_transaksi.id', $id)->value('tb_user.nama');
    //     $outlet = Transaksi::join('tb_outlet', 'tb_transaksi.id_outlet', '=', 'tb_outlet.id')->where('tb_transaksi.id', $id)->value('tb_outlet.nama');
    //     $namacust = Transaksi::join('tb_member', 'tb_transaksi.id_member', '=', 'tb_member.id')->where('tb_transaksi.id', $id)->value('tb_member.nama');
    //     $tlp = Transaksi::join('tb_member', 'tb_transaksi.id_member', '=', 'tb_member.id')->where('tb_transaksi.id', $id)->value('tb_member.tlp');
    //     $alamat = Transaksi::join('tb_member', 'tb_transaksi.id_member', '=', 'tb_member.id')->where('tb_transaksi.id', $id)->value('tb_member.alamat');
    //     $alamat = Transaksi::join('tb_member', 'tb_transaksi.id_member', '=', 'tb_member.id')->where('tb_transaksi.id', $id)->value('tb_member.alamat');
    //     $invoice = Transaksi::where('id', $id)->value('kode_invoice');
    //     $data = [
    //         'data' => Detail_Transaksi::where('id', $detail)->get(),
    //         'title' => 'Detail Transaksi - UKOM',
    //         'nama' => $petugas,
    //         'outlet' => $outlet,
    //         'namacust' => $namacust,
    //         'tlp' => $tlp,
    //         'alamat' => $alamat,
    //         'invoice' => $invoice,
    //         'paket' => Paket::all()


    //     ];
    //     return view('konten.invoice', $data);
    // }

    public function index($id) {
        // dd($id);
        // $detail = Transaksi::with(['user', 'outlet', 'member'])->find($id);
        $detail = Transaksi::find($id);
        $idtransaksi = $detail->id;
        $detailTransaksi = Detail_Transaksi::where('tb_detail_transaksi.id_transaksi', $id)->get();
        $total = 0;
        foreach ($detailTransaksi as $i) {
            $total += $i->paket->harga * $i->qty;
        }

        $data = [
            'data' => Detail_Transaksi::where('id_transaksi', $idtransaksi)->get(),
            'title' => 'Detail Transaksi - UKOM',
            'nama' => $detail,
            'outlet' => $detail,
            'namacust' => $detail,
            'tlp' => $detail,
            'alamat' => $detail,
            'kode' => $detail,
            'paket' => Paket::all(),
            'idtransaksi' => $idtransaksi,
            'total' => $total,
            'pajak' => $total * 0.1
        ];

        return view('konten.invoice', $data);
    }

    public function detail(Request $request, $id) {
        // dd($id);
        $id = Transaksi::where('id', $id)->value('id');
        $invoice = new Detail_Transaksi();
        $invoice->id_transaksi = $id;
        $invoice->id_paket = $request->id_paket;
        $invoice->qty = $request->qty;
        $invoice->keterangan = $request->keterangan;
        $invoice->save();

        return redirect()->back();
    }
}
