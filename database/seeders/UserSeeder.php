<?php

namespace Database\Seeders;

use App\Models\User;
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
               User::insert([
                  'name' => $value['name'] ?? null,
                  'role' => $value['role'] ?? null,
                  'email' => $value['email'] ?? null,
                  'password' => Hash::make($value['password'] ?? null), // Enkripsi password
                  'created_at' => Carbon::now(),
                  'updated_at' => Carbon::now()
               ]);
         }
         
      }
   }
