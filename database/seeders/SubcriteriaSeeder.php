<?php

namespace Database\Seeders;

use App\Models\Subcriteria;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubcriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subcriteria::create([
            'criteria_criterias_id' => 1,
            'name' => '0-1%',
            'variable' => 'Sangat Rendah',
            'value' => 1,
            'created_at' => date('2023-04-03 15:38:40'),
        ]);

        Subcriteria::create([
            'criteria_criterias_id' => 1,
            'name' => '2-10%',
            'variable' => 'Rendah',
            'value' => 2,
            'created_at' => date('2023-04-03 15:38:39'),
        ]);

        Subcriteria::create([
            'criteria_criterias_id' => 1,
            'name' => '11-25%',
            'variable' => 'Sedang',
            'value' => 3,
            'created_at' => date('2023-04-03 15:38:38'),
        ]);

        Subcriteria::create([
            'criteria_criterias_id' => 1,
            'name' => '26-46%',
            'variable' => 'Tinggi',
            'value' => 4,
            'created_at' => date('2023-04-03 15:38:37'),
        ]);

        Subcriteria::create([
            'criteria_criterias_id' => 1,
            'name' => '>46%',
            'variable' => 'Sangat Tinggi',
            'value' => 5,
            'created_at' => date('2023-04-03 15:38:36'),
        ]);

        Subcriteria::create([
            'criteria_criterias_id' => 2,
            'name' => '<6%',
            'variable' => 'Sangat Rendah',
            'value' => 1,
            'created_at' => date('2023-04-03 15:38:35'),
        ]);

        Subcriteria::create([
            'criteria_criterias_id' => 2,
            'name' => '6-20%',
            'variable' => 'Rendah',
            'value' => 2,
            'created_at' => date('2023-04-03 15:38:34'),
        ]);

        Subcriteria::create([
            'criteria_criterias_id' => 2,
            'name' => '21-30%',
            'variable' => 'Sedang',
            'value' => 3,
            'created_at' => date('2023-04-03 15:38:33'),
        ]);

        Subcriteria::create([
            'criteria_criterias_id' => 2,
            'name' => '31-46%',
            'variable' => 'Tinggi',
            'value' => 4,
            'created_at' => date('2023-04-03 15:38:32'),
        ]);

        Subcriteria::create([
            'criteria_criterias_id' => 2,
            'name' => '>46%',
            'variable' => 'Sangat Tinggi',
            'value' => 5,
            'created_at' => date('2023-04-03 15:38:31'),
        ]);

        Subcriteria::create([
            'criteria_criterias_id' => 3,
            'name' => '0%',
            'variable' => 'Sangat Rendah',
            'value' => 1,
            'created_at' => date('2023-04-03 15:38:30'),
        ]);

        Subcriteria::create([
            'criteria_criterias_id' => 3,
            'name' => '1-15%',
            'variable' => 'Rendah',
            'value' => 2,
            'created_at' => date('2023-04-03 15:38:29'),
        ]);

        Subcriteria::create([
            'criteria_criterias_id' => 3,
            'name' => '16-30%',
            'variable' => 'Sedang',
            'value' => 3,
            'created_at' => date('2023-04-03 15:38:28'),
        ]);

        Subcriteria::create([
            'criteria_criterias_id' => 3,
            'name' => '31-45%',
            'variable' => 'Tinggi',
            'value' => 4,
            'created_at' => date('2023-04-03 15:38:27'),
        ]);

        Subcriteria::create([
            'criteria_criterias_id' => 3,
            'name' => '>45%',
            'variable' => 'Sangat Tinggi',
            'value' => 5,
            'created_at' => date('2023-04-03 15:38:26'),
        ]);

        Subcriteria::create([
            'criteria_criterias_id' => 4,
            'name' => '<2800',
            'variable' => 'Sangat Rendah',
            'value' => 1,
            'created_at' => date('2023-04-03 15:38:25'),
        ]);

        Subcriteria::create([
            'criteria_criterias_id' => 4,
            'name' => '2800-7200',
            'variable' => 'Rendah',
            'value' => 2,
            'created_at' => date('2023-04-03 15:38:24'),
        ]);

        Subcriteria::create([
            'criteria_criterias_id' => 4,
            'name' => '7300-11600',
            'variable' => 'Sedang',
            'value' => 3,
            'created_at' => date('2023-04-03 15:38:23'),
        ]);

        Subcriteria::create([
            'criteria_criterias_id' => 4,
            'name' => '11700-16000',
            'variable' => 'Tinggi',
            'value' => 4,
            'created_at' => date('2023-04-03 15:38:22'),
        ]);

        Subcriteria::create([
            'criteria_criterias_id' => 4,
            'name' => '>16000',
            'variable' => 'Sangat Tinggi',
            'value' => 5,
            'created_at' => date('2023-04-03 15:38:21'),
        ]);
    }
}
