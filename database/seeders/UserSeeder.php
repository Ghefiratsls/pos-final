<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus semua data dari tabel users
        DB::table('users')->truncate();

        // Tambahkan data baru
        User::create([
            'nama' => 'Ghefira Tsalsa',
            'email' => 'ghefira@gmail.com',
            'username' => 'maul',
            'password' => bcrypt('maulana123'),
            'akses' => 1,
            'active' => 1,
        ]);

        User::create([
            'nama' => 'Ultramen Polindra',
            'email' => 'ultramen@gmail.com',
            'username' => 'ultramen',
            'password' => bcrypt('ultramen123'),
            'akses' => 2,
            'active' => 1,
        ]);

        User::create([
            'nama' => 'Ultramen Gamaci',
            'email' => 'ultramenG@gmail.com',
            'username' => 'ultramenG',
            'password' => bcrypt('ultramen123'),
            'akses' => 3,
            'active' => 1,
        ]);
    }
}
