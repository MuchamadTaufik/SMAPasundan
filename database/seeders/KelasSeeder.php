<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Kelas::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            [
                'name' => '10 MIPA 1',
            ],
            [
                'name' => '10 MIPA 2',
            ],
            [
                'name' => '10 MIPA 3',
            ],
            [
                'name' => '11 MIPA 1',
            ],
            [
                'name' => '11 MIPA 2',
            ],
            [
                'name' => '11 MIPA 3',
            ],
            [
                'name' => '12 MIPA 1',
            ],
            [
                'name' => '12 MIPA 2',
            ],
            [
                'name' => '12 MIPA 3',
            ],
            [
                'name' => '10 IPS 1',
            ],
            [
                'name' => '10 IPS 2',
            ],
            [
                'name' => '10 IPS 3',
            ],
            [
                'name' => '11 IPS 1',
            ],
            [
                'name' => '11 IPS 2',
            ],
            [
                'name' => '11 IPS 3',
            ],
            [
                'name' => '12 IPS 1',
            ],
            [
                'name' => '12 IPS 2',
            ],
            [
                'name' => '13 IPS 3',
            ],

        ];
        
        foreach ($data as $value) {
            Kelas::insert([
                'name' => $value['name'] ?? null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
