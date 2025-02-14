<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function index(){
        $outletId = Auth::user()->id_outlet;
        $members = Member::whereHas('transaksi', function ($query) use ($outletId) {
            $query->where('id_outlet', $outletId);
        })->get();
        return view('konten.member', [
            'data' => $members,
            'title' => 'Member - UKOM',
        ]);
    }

    public function tambah_member(Request $request){
        $member = new Member;
        $member->nama = $request->nama;
        $member->alamat = $request->alamat;
        $member->jenis_kelamin = $request->jenis_kelamin;
        $member->tlp = $request->tlp;
        $member->save();

        return redirect()->route('member');
    }

    public function hapus_member(Request $request){
        // dd($request->all());
        $member = $request->id;
        $hapus = Member::where('id', $member)->first();
        $hapus->delete();

        return redirect()->route('member');
    }

    public function edit_member(Request $request) {
        $hapus = Member::find($request->id);
        $hapus->nama = $request->nama;
        $hapus->alamat = $request->alamat;
        $hapus->jenis_kelamin = $request->jenis_kelamin;
        $hapus->tlp = $request->tlp;
        $hapus->save();

        return redirect()->route('member');
    }

}
