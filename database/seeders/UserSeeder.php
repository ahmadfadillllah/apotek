<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'name' => 'Perawat',
            'email' => 'perawat@gmail.com',
            'password' => Hash::make('perawat123'),
            'role' => 'perawat',
            'avatar' => 'user.png'
        ]);

        User::insert([
            'name' => 'Dokter',
            'email' => 'dokter@gmail.com',
            'password' => Hash::make('dokter123'),
            'role' => 'dokter',
            'avatar' => 'user.png'
        ]);

        User::insert([
            'name' => 'Apoteker',
            'email' => 'apoteker@gmail.com',
            'password' => Hash::make('apoteker123'),
            'role' => 'apoteker',
            'avatar' => 'user.png'
        ]);

    }
}
