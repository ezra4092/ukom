<?php

namespace Database\Seeders;

use App\Models\Outlet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OutletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $outlet = [
            [
                'nama' => 'Laundry1',
                'alamat' => 'Bekasi',
                'tlp' => '+6285211585916'
            ],
            [
                'nama' => 'Laundry2',
                'alamat' => 'Jakarta',
                'tlp' => '+6285211585917'
            ]

        ];
        foreach ($outlet as $key => $value) {
            Outlet::create($value);
        }
    }
}
