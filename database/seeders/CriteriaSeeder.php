<?php

namespace Database\Seeders;

use App\Models\Criteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Criteria::create([
            'code' => 'C1',
            'name' => 'Curah Hujan',
            'weight' => 0.13,
            'type' => 'Benefit',
            'created_at' => date('2023-04-03 15:38:50'),
        ]);

        Criteria::create([
            'code' => 'C2',
            'name' => 'Jenis Tanah',
            'weight' => 0.17,
            'type' => 'Benefit',
            'created_at' => date('2023-04-03 15:38:49'),
        ]);

        Criteria::create([
            'code' => 'C3',
            'name' => 'Kandungan N',
            'weight' => 0.15,
            'type' => 'Benefit',
            'created_at' => date('2023-04-03 15:38:48'),
        ]);

        Criteria::create([
            'code' => 'C4',
            'name' => 'Kandungan P',
            'weight' => 0.30,
            'type' => 'Benefit',
            'created_at' => date('2023-04-03 15:38:47'),
        ]);

        Criteria::create([
            'code' => 'C5',
            'name' => 'Kandungan K',
            'weight' => 0.20,
            'type' => 'Benefit',
            'created_at' => date('2023-04-03 15:38:46'),
        ]);

        Criteria::create([
            'code' => 'C6',
            'name' => 'Harga Pupuk',
            'weight' => 0.05,
            'type' => 'Cost',
            'created_at' => date('2023-04-03 15:38:45'),
        ]);
    }
}