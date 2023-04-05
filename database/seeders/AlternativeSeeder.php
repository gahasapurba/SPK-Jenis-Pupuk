<?php

namespace Database\Seeders;

use App\Models\Alternative;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlternativeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Alternative::create([
            'name' => 'NPK Phonska',
            'rainfall' => 50,
            'soil_type' => 'Lembab',
            'nitrogen' => 15,
            'phosphor' => 10,
            'kalium' => 12,
            'price' => 7000,
            'created_at' => date('2023-04-03 15:38:50'),
        ]);

        Alternative::create([
            'name' => 'NPK Phonska Plus 15-15-15',
            'rainfall' => 50,
            'soil_type' => 'Lembab',
            'nitrogen' => 15,
            'phosphor' => 15,
            'kalium' => 15,
            'price' => 18000,
            'created_at' => date('2023-04-03 15:38:49'),
        ]);

        Alternative::create([
            'name' => 'NPK Kebomas 15-15-15',
            'rainfall' => 50,
            'soil_type' => 'Lembab',
            'nitrogen' => 15,
            'phosphor' => 15,
            'kalium' => 15,
            'price' => 8500,
            'created_at' => date('2023-04-03 15:38:48'),
        ]);

        Alternative::create([
            'name' => 'NPK Petro Nitrat',
            'rainfall' => 50,
            'soil_type' => 'Lembab',
            'nitrogen' => 16,
            'phosphor' => 16,
            'kalium' => 16,
            'price' => 13000,
            'created_at' => date('2023-04-03 15:38:47'),
        ]);

        Alternative::create([
            'name' => 'NPK Petro Ningrat',
            'rainfall' => 50,
            'soil_type' => 'Lembab',
            'nitrogen' => 12,
            'phosphor' => 11,
            'kalium' => 20,
            'price' => 24000,
            'created_at' => date('2023-04-03 15:38:46'),
        ]);

        Alternative::create([
            'name' => 'NPK Mutiara Sprinter 20-10-10',
            'rainfall' => 50,
            'soil_type' => 'Lembab',
            'nitrogen' => 20,
            'phosphor' => 10,
            'kalium' => 10,
            'price' => 20000,
            'created_at' => date('2023-04-03 15:38:45'),
        ]);

        Alternative::create([
            'name' => 'NPK Mutiara Professional 9-25-25',
            'rainfall' => 50,
            'soil_type' => 'Lembab',
            'nitrogen' => 9,
            'phosphor' => 25,
            'kalium' => 25,
            'price' => 55000,
            'created_at' => date('2023-04-03 15:38:44'),
        ]);

        Alternative::create([
            'name' => 'NPK Mutiara Grower 15-9-20+TE',
            'rainfall' => 50,
            'soil_type' => 'Lembab',
            'nitrogen' => 15,
            'phosphor' => 9,
            'kalium' => 20,
            'price' => 22000,
            'created_at' => date('2023-04-03 15:38:43'),
        ]);

        Alternative::create([
            'name' => 'NPK Mutiara 16-16-16',
            'rainfall' => 50,
            'soil_type' => 'Lembab',
            'nitrogen' => 16,
            'phosphor' => 16,
            'kalium' => 16,
            'price' => 23000,
            'created_at' => date('2023-04-03 15:38:42'),
        ]);

        Alternative::create([
            'name' => 'NPK Mutiara Partner 13-13-24',
            'rainfall' => 50,
            'soil_type' => 'Lembab',
            'nitrogen' => 13,
            'phosphor' => 13,
            'kalium' => 24,
            'price' => 30000,
            'created_at' => date('2023-04-03 15:38:41'),
        ]);

        Alternative::create([
            'name' => 'Neo Kristalon Hijau',
            'rainfall' => 155,
            'soil_type' => 'Lembab',
            'nitrogen' => 18,
            'phosphor' => 18,
            'kalium' => 18,
            'price' => 115000,
            'created_at' => date('2023-04-03 15:38:40'),
        ]);

        Alternative::create([
            'name' => 'Neo Kristalon Kuning',
            'rainfall' => 155,
            'soil_type' => 'Lembab',
            'nitrogen' => 13,
            'phosphor' => 40,
            'kalium' => 13,
            'price' => 80000,
            'created_at' => date('2023-04-03 15:38:39'),
        ]);

        Alternative::create([
            'name' => 'Neo Kristalon Merah',
            'rainfall' => 155,
            'soil_type' => 'Lembab',
            'nitrogen' => 12,
            'phosphor' => 12,
            'kalium' => 36,
            'price' => 80000,
            'created_at' => date('2023-04-03 15:38:38'),
        ]);

        Alternative::create([
            'name' => 'Fertila Padi-1',
            'rainfall' => 155,
            'soil_type' => 'Lembab',
            'nitrogen' => 8,
            'phosphor' => 18,
            'kalium' => 18,
            'price' => 60000,
            'created_at' => date('2023-04-03 15:38:37'),
        ]);

        Alternative::create([
            'name' => 'Fertila Padi-2',
            'rainfall' => 155,
            'soil_type' => 'Lembab',
            'nitrogen' => 6,
            'phosphor' => 18,
            'kalium' => 28,
            'price' => 60000,
            'created_at' => date('2023-04-03 15:38:36'),
        ]);

        Alternative::create([
            'name' => 'NPK 15-15-15+TE',
            'rainfall' => 50,
            'soil_type' => 'Lembab',
            'nitrogen' => 15,
            'phosphor' => 15,
            'kalium' => 15,
            'price' => 14000,
            'created_at' => date('2023-04-03 15:38:35'),
        ]);

        Alternative::create([
            'name' => 'NPK Holland 15-15-15',
            'rainfall' => 50,
            'soil_type' => 'Lembab',
            'nitrogen' => 15,
            'phosphor' => 15,
            'kalium' => 15,
            'price' => 25000,
            'created_at' => date('2023-04-03 15:38:34'),
        ]);

        Alternative::create([
            'name' => 'NPK 16-16-16 Merah',
            'rainfall' => 50,
            'soil_type' => 'Lembab',
            'nitrogen' => 16,
            'phosphor' => 16,
            'kalium' => 16,
            'price' => 21000,
            'created_at' => date('2023-04-03 15:38:33'),
        ]);

        Alternative::create([
            'name' => 'NPK 16-16-16 Biru',
            'rainfall' => 50,
            'soil_type' => 'Lembab',
            'nitrogen' => 16,
            'phosphor' => 16,
            'kalium' => 16,
            'price' => 21500,
            'created_at' => date('2023-04-03 15:38:32'),
        ]);

        Alternative::create([
            'name' => 'Magnum',
            'rainfall' => 50,
            'soil_type' => 'Lembab',
            'nitrogen' => 15,
            'phosphor' => 10,
            'kalium' => 22,
            'price' => 21000,
            'created_at' => date('2023-04-03 15:38:31'),
        ]);

        Alternative::create([
            'name' => 'NPK Padi 21-14-7+2MgO+2S+TE',
            'rainfall' => 50,
            'soil_type' => 'Lembab',
            'nitrogen' => 21,
            'phosphor' => 14,
            'kalium' => 7,
            'price' => 16000,
            'created_at' => date('2023-04-03 15:38:30'),
        ]);

        Alternative::create([
            'name' => 'NPK-PIM 15-15-15',
            'rainfall' => 50,
            'soil_type' => 'Lembab',
            'nitrogen' => 15,
            'phosphor' => 15,
            'kalium' => 15,
            'price' => 7000,
            'created_at' => date('2023-04-03 15:38:29'),
        ]);

        Alternative::create([
            'name' => 'NPK Pusri 15-15-15',
            'rainfall' => 50,
            'soil_type' => 'Lembab',
            'nitrogen' => 15,
            'phosphor' => 15,
            'kalium' => 15,
            'price' => 12000,
            'created_at' => date('2023-04-03 15:38:28'),
        ]);

        Alternative::create([
            'name' => 'NPK Pelangi 20-10-10',
            'rainfall' => 50,
            'soil_type' => 'Lembab',
            'nitrogen' => 20,
            'phosphor' => 10,
            'kalium' => 10,
            'price' => 15000,
            'created_at' => date('2023-04-03 15:38:27'),
        ]);

        Alternative::create([
            'name' => 'NPK Pelangi 12-12-17-2',
            'rainfall' => 50,
            'soil_type' => 'Lembab',
            'nitrogen' => 12,
            'phosphor' => 12,
            'kalium' => 17,
            'price' => 10000,
            'created_at' => date('2023-04-03 15:38:26'),
        ]);

        Alternative::create([
            'name' => 'NPK Pelangi 13-6-27-4',
            'rainfall' => 50,
            'soil_type' => 'Lembab',
            'nitrogen' => 13,
            'phosphor' => 6,
            'kalium' => 27,
            'price' => 32000,
            'created_at' => date('2023-04-03 15:38:25'),
        ]);

        Alternative::create([
            'name' => 'NPK Pelangi 15-15-6-4',
            'rainfall' => 50,
            'soil_type' => 'Lembab',
            'nitrogen' => 15,
            'phosphor' => 15,
            'kalium' => 6,
            'price' => 6000,
            'created_at' => date('2023-04-03 15:38:24'),
        ]);

        Alternative::create([
            'name' => 'NPK Pelangi 15-15-15',
            'rainfall' => 50,
            'soil_type' => 'Lembab',
            'nitrogen' => 15,
            'phosphor' => 15,
            'kalium' => 15,
            'price' => 8000,
            'created_at' => date('2023-04-03 15:38:23'),
        ]);

        Alternative::create([
            'name' => 'NPK Pelangi 16-16-16',
            'rainfall' => 50,
            'soil_type' => 'Lembab',
            'nitrogen' => 16,
            'phosphor' => 16,
            'kalium' => 16,
            'price' => 9000,
            'created_at' => date('2023-04-03 15:38:22'),
        ]);
    }
}
