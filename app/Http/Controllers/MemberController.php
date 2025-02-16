<?php

namespace App\Http\Controllers;

use App\Models\Detail_Transaksi;
use App\Models\Member;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function index()
    {
        $outletId = Auth::user()->id_outlet;
        $members = Member::where('id_outlet', $outletId)->get();
        return view('konten.member', [
            'data' => $members,
            'title' => 'Member - UKOM',
        ]);
    }

    public function tambah_member(Request $request)
    {
        // dd($request->all());
        $outletId = Auth::user()->id_outlet;
        $member = new Member;
        $member->nama = $request->nama;
        $member->alamat = $request->alamat;
        $member->jenis_kelamin = $request->jenis_kelamin;
        $member->tlp = $request->tlp;
        $member->id_outlet = $outletId;
        $member->save();

        return redirect()->route('member')->with('success', 'Data member berhasil ditambahkan.');

    }

    public function hapus_member(Request $request){
        // dd($request->all());
        $id = $request->id;
        $detailIds = Transaksi::where('id_member', $id)->pluck('id')->toArray();

        if (($detailIds)) {
            Detail_Transaksi::whereIn('id_transaksi', $detailIds)->delete();
        }

        Transaksi::where('id_member', $id)->delete();

        $member = Member::find($id);
        if ($member) {
            $member->delete();
        }
        return redirect()->route('member')->with('success', 'Member dan transaksi terkait berhasil dihapus.');
    }


    public function edit_member(Request $request)
    {
        $hapus = Member::find($request->id);
        $hapus->nama = $request->nama;
        $hapus->alamat = $request->alamat;
        $hapus->jenis_kelamin = $request->jenis_kelamin;
        $hapus->tlp = $request->tlp;
        $hapus->save();

        return redirect()->route('member')->with('success', 'Data member berhasil diedit.');

    }
}
