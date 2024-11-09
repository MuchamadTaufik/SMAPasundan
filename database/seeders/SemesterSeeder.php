<?php

namespace Database\Seeders;

use App\Models\Semester;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Semester::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            [
                'name' => '2023/2024 Semester 1',
            ],
            [
                'name' => '2023/2024 Semester 2',
            ],
        ];
        
        foreach ($data as $value) {
            Semester::insert([
                'name' => $value['name'] ?? null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
