<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Himpunan; 
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
    {
        public function run(): void
        {
            // 1. Data 6 Himpunan
            $himpunans = [
                ['nama' => 'Himpunan Mahasiswa Teknik Industri', 'singkatan' => 'HMTI'],
                ['nama' => 'Himpunan Mahasiswa Teknik Sipil', 'singkatan' => 'HMS'],
                ['nama' => 'Himpunan Mahasiswa Teknik Informatika', 'singkatan' => 'HIMATIF'],
                ['nama' => 'Himpunan Mahasiswa Teknik Elektro', 'singkatan' => 'HIMATRO'],
                ['nama' => 'Himpunan Mahasiswa Teknik Mesin', 'singkatan' => 'HMTM'],
                ['nama' => 'Himpunan Mahasiswa Sistem Informasi', 'singkatan' => 'HMSI'],
            ];

            foreach ($himpunans as $h) {
                Himpunan::create($h);
            }

            // 2. Akun Superadmin SEMAFT
            User::create([
                'name' => 'Admin SEMAFT',
                'email' => 'admin@semaft.com',
                'password' => Hash::make('password123'),
                'role' => 'superadmin',
                'himpunan_id' => null, // Superadmin tidak terikat 1 prodi
            ]);

            // 3. Akun Operator untuk Testing (Contoh: HIMATIF)
            $himatif = Himpunan::where('singkatan', 'HIMATIF')->first();
            User::create([
                'name' => 'Operator HIMATIF',
                'email' => 'himatif@semaft.com',
                'password' => Hash::make('password123'),
                'role' => 'operator',
                'himpunan_id' => $himatif->id,
            ]);
        }
    }
