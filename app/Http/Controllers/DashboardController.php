<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard', [
            'title' => 'Dashboard - UKOM'
        ]);
    }

    public function table2(){
        return view('konten.invoice', [
            'title' => 'Dashboard - UKOM'
        ]);
    }

    public function table(){
        return view('konten.table', [
            'data' => Member::all(),
            'title' => 'Member - UKOM'
        ]);
    }
}
