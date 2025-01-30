<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'username' => 'ezra1234',
                'password' =>  Hash::make('12344321'),
                'nama' => 'Ezra Faira',
                'role' => 'admin',
                'id_outlet'=> '2'
            ],
            [
                'username' => 'kasir1234',
                'password' =>  Hash::make('12344321'),
                'nama' => 'Kasir',
                'role' => 'kasir',
                'id_outlet'=> '1'
            ]
            ];

            foreach ($user as $key => $value) {
                User::create($value);
            }
    }
    }

