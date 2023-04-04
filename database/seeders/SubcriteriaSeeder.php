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
            'name' => '0.5-20 mm/hari',
            'variable' => 'Sangat Rendah',
            'value' => 1,
            'created_at' => date('2023-04-03 15:38:50'),
        ]);

        Subcriteria::create([
            'criteria_criterias_id' => 1,
            'name' => '20-50 mm/hari',
            'variable' => 'Rendah',
            'value' => 2,
            'created_at' => date('2023-04-03 15:38:49'),
        ]);

        Subcriteria::create([
            'criteria_criterias_id' => 1,
            'name' => '50-100 mm/hari',
            'variable' => 'Sedang',
            'value' => 3,
            'created_at' => date('2023-04-03 15:38:48'),
        ]);

        Subcriteria::create([
            'criteria_criterias_id' => 1,
            'name' => '100-150 mm/hari',
            'variable' => 'Tinggi',
            'value' => 4,
            'created_at' => date('2023-04-03 15:38:47'),
        ]);

        Subcriteria::create([
            'criteria_criterias_id' => 1,
            'name' => '>150 mm/hari',
            'variable' => 'Sangat Tinggi',
            'value' => 5,
            'created_at' => date('2023-04-03 15:38:46'),
        ]);

        Subcriteria::create([
            'criteria_criterias_id' => 2,
            'name' => 'Basah',
            'variable' => 'Sangat Kurang',
            'value' => 1,
            'created_at' => date('2023-04-03 15:38:45'),
        ]);

        Subcriteria::create([
            'criteria_criterias_id' => 2,
            'name' => 'Kering',
            'variable' => 'Kurang',
            'value' => 2,
            'created_at' => date('2023-04-03 15:38:44'),
        ]);

        Subcriteria::create([
            'criteria_criterias_id' => 2,
            'name' => 'Sangat Kering',
            'variable' => 'Sedang',
            'value' => 3,
            'created_at' => date('2023-04-03 15:38:43'),
        ]);

        Subcriteria::create([
            'criteria_criterias_id' => 2,
            'name' => 'Lembab',
            'variable' => 'Baik',
            'value' => 4,
            'created_at' => date('2023-04-03 15:38:42'),
        ]);

        Subcriteria::create([
            'criteria_criterias_id' => 2,
            'name' => 'Sangat Lembab',
            'variable' => 'Sangat Baik',
            'value' => 5,
            'created_at' => date('2023-04-03 15:38:41'),
        ]);

        Subcriteria::create([
            'criteria_criterias_id' => 3,
            'name' => '<6%',
            'variable' => 'Sangat Rendah',
            'value' => 1,
            'created_at' => date('2023-04-03 15:38:40'),
        ]);

        Subcriteria::create([
            'criteria_criterias_id' => 3,
            'name' => '6-20%',
            'variable' => 'Rendah',
            'value' => 2,
            'created_at' => date('2023-04-03 15:38:39'),
        ]);

        Subcriteria::create([
            'criteria_criterias_id' => 3,
            'name' => '21-30%',
            'variable' => 'Sedang',
            'value' => 3,
            'created_at' => date('2023-04-03 15:38:38'),
        ]);

        Subcriteria::create([
            'criteria_criterias_id' => 3,
            'name' => '31-46%',
            'variable' => 'Tinggi',
            'value' => 4,
            'created_at' => date('2023-04-03 15:38:37'),
        ]);

        Subcriteria::create([
            'criteria_criterias_id' => 3,
            'name' => '>46%',
            'variable' => 'Sangat Tinggi',
            'value' => 5,
            'created_at' => date('2023-04-03 15:38:36'),
        ]);

        Subcriteria::create([
            'criteria_criterias_id' => 4,
            'name' => '<6%',
            'variable' => 'Sangat Rendah',
            'value' => 1,
            'created_at' => date('2023-04-03 15:38:35'),
        ]);

        Subcriteria::create([
            'criteria_criterias_id' => 4,
            'name' => '6-20%',
            'variable' => 'Rendah',
            'value' => 2,
            'created_at' => date('2023-04-03 15:38:34'),
        ]);

        Subcriteria::create([
            'criteria_criterias_id' => 4,
            'name' => '21-30%',
            'variable' => 'Sedang',
            'value' => 3,
            'created_at' => date('2023-04-03 15:38:33'),
        ]);

        Subcriteria::create([
            'criteria_criterias_id' => 4,
            'name' => '31-46%',
            'variable' => 'Tinggi',
            'value' => 4,
            'created_at' => date('2023-04-03 15:38:32'),
        ]);

        Subcriteria::create([
            'criteria_criterias_id' => 4,
            'name' => '>46%',
            'variable' => 'Sangat Tinggi',
            'value' => 5,
            'created_at' => date('2023-04-03 15:38:31'),
        ]);

        Subcriteria::create([
            'criteria_criterias_id' => 5,
            'name' => '0%',
            'variable' => 'Sangat Rendah',
            'value' => 1,
            'created_at' => date('2023-04-03 15:38:30'),
        ]);

        Subcriteria::create([
            'criteria_criterias_id' => 5,
            'name' => '1-15%',
            'variable' => 'Rendah',
            'value' => 2,
            'created_at' => date('2023-04-03 15:38:29'),
        ]);

        Subcriteria::create([
            'criteria_criterias_id' => 5,
            'name' => '16-30%',
            'variable' => 'Sedang',
            'value' => 3,
            'created_at' => date('2023-04-03 15:38:28'),
        ]);

        Subcriteria::create([
            'criteria_criterias_id' => 5,
            'name' => '30-45%',
            'variable' => 'Tinggi',
            'value' => 4,
            'created_at' => date('2023-04-03 15:38:27'),
        ]);

        Subcriteria::create([
            'criteria_criterias_id' => 5,
            'name' => '>45%',
            'variable' => 'Sangat Tinggi',
            'value' => 5,
            'created_at' => date('2023-04-03 15:38:26'),
        ]);

        Subcriteria::create([
            'criteria_criterias_id' => 6,
            'name' => '<70000',
            'variable' => 'Sangat Rendah',
            'value' => 1,
            'created_at' => date('2023-04-03 15:38:25'),
        ]);

        Subcriteria::create([
            'criteria_criterias_id' => 6,
            'name' => '70000-179000',
            'variable' => 'Rendah',
            'value' => 2,
            'created_at' => date('2023-04-03 15:38:24'),
        ]);

        Subcriteria::create([
            'criteria_criterias_id' => 6,
            'name' => '180000-289000',
            'variable' => 'Sedang',
            'value' => 3,
            'created_at' => date('2023-04-03 15:38:23'),
        ]);

        Subcriteria::create([
            'criteria_criterias_id' => 6,
            'name' => '290000-400000',
            'variable' => 'Tinggi',
            'value' => 4,
            'created_at' => date('2023-04-03 15:38:22'),
        ]);

        Subcriteria::create([
            'criteria_criterias_id' => 6,
            'name' => '>400000',
            'variable' => 'Sangat Tinggi',
            'value' => 5,
            'created_at' => date('2023-04-03 15:38:21'),
        ]);
    }
}
