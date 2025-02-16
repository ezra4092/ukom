<?php

namespace App\Exports;

use App\Models\Transaksi;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromView;

class TransaksiExport implements FromView
{

    public $outlet;

    public function __construct($outlet)
    {
        $this->outlet = $outlet;
    }

    public function view(): View
    {
        $id = Auth::user()->id_outlet;
        return view('exports.transaksi',[
            'data' => Transaksi::where('id_outlet', $id)->get(),
            'outlet' => Transaksi::where('id_outlet', $id)->get()
        ]);
    }
}
