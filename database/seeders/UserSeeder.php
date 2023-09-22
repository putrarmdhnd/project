<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Buat user admin
        User::create([
            'nama' => 'Admin User',
            'username' => 'admin@example.com',
            'password' => bcrypt('admin123'), // Password yang telah di-hash
            'level' => 'admin', // Anda asumsikan memiliki kolom 'level' di tabel users
        ]);

        // Buat user petugas
        User::create([
            'nama' => 'Petugas User',
            'username' => 'petugas@example.com',
            'password' => bcrypt('petugas123'),
            'level' => 'petugas',
        ]);

        // Tambahkan user lainnya sesuai kebutuhan
    }
}
