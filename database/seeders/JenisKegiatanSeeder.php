<?php

namespace Database\Seeders;

use App\Models\JenisKegiatan;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JenisKegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        JenisKegiatan::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            [
                'name' => 'Bimbingan',
            ],
            [
                'name' => 'Konsultasi',
            ],
        ];
        
        foreach ($data as $value) {
            JenisKegiatan::insert([
                'name' => $value['name'] ?? null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
