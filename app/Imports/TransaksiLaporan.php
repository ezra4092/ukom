<?php

namespace App\Imports;

use App\Models\Transaksi;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class TransaksiLaporan implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        return Transaksi::all();
    }
}
