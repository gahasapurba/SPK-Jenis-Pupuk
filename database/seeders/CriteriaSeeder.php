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
            'name' => 'Kandungan N',
            'weight' => 0.38,
            'type' => 'Benefit',
            'created_at' => date('2023-04-03 15:38:48'),
        ]);

        Criteria::create([
            'code' => 'C2',
            'name' => 'Kandungan P',
            'weight' => 0.27,
            'type' => 'Benefit',
            'created_at' => date('2023-04-03 15:38:47'),
        ]);

        Criteria::create([
            'code' => 'C3',
            'name' => 'Kandungan K',
            'weight' => 0.29,
            'type' => 'Benefit',
            'created_at' => date('2023-04-03 15:38:46'),
        ]);

        Criteria::create([
            'code' => 'C4',
            'name' => 'Harga Pupuk',
            'weight' => 0.06,
            'type' => 'Cost',
            'created_at' => date('2023-04-03 15:38:45'),
        ]);
    }
}