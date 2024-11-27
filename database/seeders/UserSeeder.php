<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Biodata;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Biodata::truncate(); // Hapus data biodata terlebih dahulu
        User::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            [
                'name' => 'Fikri Nur Hakim',
                'role' => 'guru',
                'email' => 'gurubk1@gmail.com',
                'password' => '123456',
                'semester_id' => 1,
                'kelas_id' => 1,
                'nomor_induk' => '1234567890',
                'alamat' => 'Jl. Pendidikan No. 1',
                'nomor_hp' => '081234567890'
            ],
            [
                'name' => 'Admin Bimbingan',
                'role' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => '123456',
                'semester_id' => 1,
                'kelas_id' => 2,
                'nomor_induk' => '0987654321',
                'alamat' => 'Jl. Kepegawaian No. 2',
                'nomor_hp' => '081234567891'
            ],
            [
                'name' => 'Siswa',
                'role' => 'siswa',
                'email' => 'siswa@gmail.com',
                'password' => '123456',
                'semester_id' => 1,
                'kelas_id' => 3,
                'nomor_induk' => '1122334455',
                'alamat' => 'Jl. Pendidikan No. 3',
                'nomor_hp' => '081234567892'
            ],
        ];

        foreach ($data as $value) {
            // Buat user terlebih dahulu
            $user = User::create([
                'name' => $value['name'],
                'role' => $value['role'],
                'email' => $value['email'],
                'password' => Hash::make($value['password']),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            // Buat biodata untuk user tersebut
            Biodata::create([
                'user_id' => $user->id,
                'semester_id' => $value['semester_id'],
                'kelas_id' => $value['kelas_id'],
                'nomor_induk' => $value['nomor_induk'],
                'alamat' => $value['alamat'],
                'nomor_hp' => $value['nomor_hp'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}