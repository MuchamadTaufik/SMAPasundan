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
   /**
    * Run the database seeds.
    */
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
           ],
           [   
               'name' => 'Admin Bimbingan',
               'role' => 'admin',
               'email' => 'admin@gmail.com',
               'password' => '123456',
           ],
           [   
               'name' => 'Siswa',
               'role' => 'siswa',
               'email' => 'siswa@gmail.com',
               'password' => '123456',
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

           // Buat biodata kosong untuk user tersebut
           Biodata::create([
               'user_id' => $user->id,
               'semester_id' => null,
               'kelas_id' => null,
               'nomor_induk' => null,
               'alamat' => null,
               'nomor_hp' => null,
               'created_at' => Carbon::now(),
               'updated_at' => Carbon::now()
           ]);
       }
   }
}