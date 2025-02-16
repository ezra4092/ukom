<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Outlet;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Sum;

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
        $transaksiCount = Transaksi::where('id_outlet', $outletId)->count();
        $memberCount = Member::where('id_outlet', $outletId)->count();
        $paymentCount = Transaksi::where('dibayar', 'dibayar')->count();
        $totaltransaksi = Transaksi::where('id_outlet', $outletId)->sum('total');
        $lastTransactions = Transaksi::where('id_outlet', $outletId)
            ->orderBy('tgl', 'DESC')
            ->take(5)
            ->get();

        $chartData = DB::table('tb_transaksi')
            ->join('tb_outlet', 'tb_transaksi.id_outlet', '=', 'tb_outlet.id')
            ->select(
                'tb_outlet.nama as nama_outlet',
                DB::raw("DATE_FORMAT(tb_transaksi.tgl, '%Y-%m') as bulan"), // Mengambil tahun-bulan dari kolom tgl
                DB::raw('COUNT(tb_transaksi.id) as total_transaksi')
            )
            ->groupBy('tb_outlet.nama', DB::raw("DATE_FORMAT(tb_transaksi.tgl, '%Y-%m')")) // Group by outlet dan bulan
            ->orderBy(DB::raw("DATE_FORMAT(tb_transaksi.tgl, '%Y-%m')"), 'asc') // Urutkan berdasarkan bulan
            ->get();

        // Inisialisasi variabel untuk menyimpan data
        $labels = [];
        $data = [];

        // Loop melalui hasil query untuk memproses data
        foreach ($chartData as $row) {
            // Tambahkan bulan ke labels jika belum ada
            if (!in_array($row->bulan, $labels)) {
                $labels[] = $row->bulan;
            }

            // Tambahkan data transaksi per outlet
            if (!isset($data[$row->nama_outlet])) {
                $data[$row->nama_outlet] = [];
            }
            $data[$row->nama_outlet][$row->bulan] = $row->total_transaksi;
        }

        // Pastikan semua outlet memiliki data untuk setiap bulan
        foreach ($data as $outlet => $transactions) {
            foreach ($labels as $bulan) {
                if (!isset($transactions[$bulan])) {
                    $data[$outlet][$bulan] = 0; // Isi dengan 0 jika tidak ada transaksi
                }
            }
            // Urutkan data berdasarkan bulan
            ksort($data[$outlet]);
        }

        // Kirim semua data ke view
        return view('dashboard', [
            'title' => 'Dashboard - UKOM',
            'outlet' => $outletCount,
            'transaksi' => $transaksiCount,
            'member' => $memberCount,
            'payment' => $paymentCount,
            'last' => $lastTransactions,
            'labels' => $labels,
            'data' => $data,
            'totalpenjualan' => $totaltransaksi
        ]);
    }

    public function table()
    {
        return view('konten.table', [
            'title' => 'Member - UKOM'
        ]);
    }
}
