<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Outlet;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    // public function index()
    // {
    //     $outletId = Auth::user()->id_outlet;
    //     return view('dashboard', [
    //         'title' => 'Dashboard - UKOM',
    //         'outlet' => Outlet::count(),
    //         'transaksi' => Transaksi::count(),
    //         'member' => Member::count(),
    //         'payment' => Transaksi::where('dibayar', 'dibayar')->count(),
    //         'last' => Transaksi::where('id_outlet', $outletId)
    //         ->orderBy('tgl', 'DESC')
    //         ->take(5)
    //         ->get()
    //     ]);
    // }

    // public function chart()
    // {
    //     $data = DB::table('tb_transaksi')
    //         ->join('tb_outlet', 'tb_transaksi.id_outlet', '=', 'tb_outlet.id')
    //         ->select('tb_outlet.nama', DB::raw('COUNT(tb_transaksi.id) as total_transaksi'))
    //         ->groupBy('tb_outlet.nama')
    //         ->get();

    //     // Format data untuk chart
    //     $labels = $data->pluck('nama')->toArray(); // Nama outlet sebagai label
    //     $values = $data->pluck('total_transaksi')->toArray(); // Jumlah transaksi sebagai data

    //     return view('dashboard', compact('labels', 'values'));
    // }

    public function index()
    {
        // Data statistik dashboard
        $outletId = Auth::user()->id_outlet;
        $outletCount = Outlet::count();
        $transaksiCount = Transaksi::count();
        $memberCount = Member::count();
        $paymentCount = Transaksi::where('dibayar', 'dibayar')->count();
        $lastTransactions = Transaksi::where('id_outlet', $outletId)
            ->orderBy('tgl', 'DESC')
            ->take(5)
            ->get();

        $chartData = DB::table('tb_transaksi')
            ->join('tb_outlet', 'tb_transaksi.id_outlet', '=', 'tb_outlet.id')
            ->select('tb_outlet.nama as nama_outlet', DB::raw('COUNT(tb_transaksi.id) as total_transaksi'))
            ->groupBy('tb_outlet.nama')
            ->get();

        $labels = $chartData->pluck('nama_outlet')->toArray(); // Nama outlet sebagai label
        $values = $chartData->pluck('total_transaksi')->toArray(); // Jumlah transaksi sebagai data

        // Kirim semua data ke view
        return view('dashboard', [
            'title' => 'Dashboard - UKOM',
            'outlet' => $outletCount,
            'transaksi' => $transaksiCount,
            'member' => $memberCount,
            'payment' => $paymentCount,
            'last' => $lastTransactions,
            'labels' => $labels,
            'values' => $values,
        ]);
    }

    public function table()
    {
        return view('konten.table', [
            'title' => 'Member - UKOM'
        ]);
    }
}
