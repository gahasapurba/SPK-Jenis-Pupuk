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
            'name' => 'NPK Mutiara 16-16-16',
            'nitrogen' => 16,
            'phosphor' => 16,
            'kalium' => 16,
            'price' => 23000,
            'created_at' => date('2023-04-03 15:38:48'),
        ]);

        Alternative::create([
            'name' => 'NPK Pelangi 16-16-16',
            'nitrogen' => 16,
            'phosphor' => 16,
            'kalium' => 16,
            'price' => 16500,
            'created_at' => date('2023-04-03 15:38:46'),
        ]);

        Alternative::create([
            'name' => 'NPK Mutiara Profesional 9-25-25',
            'nitrogen' => 9,
            'phosphor' => 25,
            'kalium' => 25,
            'price' => 55000,
            'created_at' => date('2023-04-03 15:38:45'),
        ]);

        Alternative::create([
            'name' => 'Urea',
            'nitrogen' => 46,
            'phosphor' => 0,
            'kalium' => 0,
            'price' => 10000,
            'created_at' => date('2023-04-03 15:38:44'),
        ]);

        Alternative::create([
            'name' => 'NPK Phonska',
            'nitrogen' => 15,
            'phosphor' => 10,
            'kalium' => 12,
            'price' => 10000,
            'created_at' => date('2023-04-03 15:38:43'),
        ]);

        Alternative::create([
            'name' => 'NPK 15-15-15 + TE',
            'nitrogen' => 15,
            'phosphor' => 15,
            'kalium' => 15,
            'price' => 16000,
            'created_at' => date('2023-04-03 15:38:42'),
        ]);

        Alternative::create([
            'name' => 'NPK Kebomas 15-15-15',
            'nitrogen' => 15,
            'phosphor' => 15,
            'kalium' => 15,
            'price' => 13000,
            'created_at' => date('2023-04-03 15:38:41'),
        ]);

        Alternative::create([
            'name' => 'NPK Holland 15-15-15',
            'nitrogen' => 15,
            'phosphor' => 15,
            'kalium' => 15,
            'price' => 36000,
            'created_at' => date('2023-04-03 15:38:40'),
        ]);

        Alternative::create([
            'name' => 'NPK Mutiara Sprinter 20-10-10',
            'nitrogen' => 20,
            'phosphor' => 10,
            'kalium' => 10,
            'price' => 24000,
            'created_at' => date('2023-04-03 15:38:39'),
        ]);

        Alternative::create([
            'name' => 'NPK Padi 21-14-7',
            'nitrogen' => 21,
            'phosphor' => 14,
            'kalium' => 7,
            'price' => 22288,
            'created_at' => date('2023-04-03 15:38:38'),
        ]);

        Alternative::create([
            'name' => 'NPK Pelangi 20-10-10',
            'nitrogen' => 20,
            'phosphor' => 10,
            'kalium' => 10,
            'price' => 18000,
            'created_at' => date('2023-04-03 15:38:37'),
        ]);

        Alternative::create([
            'name' => 'NPK Phonska Plus 15-15-15',
            'nitrogen' => 15,
            'phosphor' => 15,
            'kalium' => 15,
            'price' => 16625,
            'created_at' => date('2023-04-03 15:38:36'),
        ]);

        Alternative::create([
            'name' => 'NPK Pusri 15-15-15',
            'nitrogen' => 15,
            'phosphor' => 15,
            'kalium' => 15,
            'price' => 17400,
            'created_at' => date('2023-04-03 15:38:35'),
        ]);

        Alternative::create([
            'name' => 'ZK Petro',
            'nitrogen' => 0,
            'phosphor' => 0,
            'kalium' => 50,
            'price' => 26000,
            'created_at' => date('2023-04-03 15:38:34'),
        ]);

        Alternative::create([
            'name' => 'SP-36 Petro',
            'nitrogen' => 0,
            'phosphor' => 36,
            'kalium' => 0,
            'price' => 19000,
            'created_at' => date('2023-04-03 15:38:33'),
        ]);

        Alternative::create([
            'name' => 'ZA Petro',
            'nitrogen' => 21,
            'phosphor' => 0,
            'kalium' => 0,
            'price' => 16000,
            'created_at' => date('2023-04-03 15:38:32'),
        ]);

        Alternative::create([
            'name' => 'SP-26 Petro',
            'nitrogen' => 0,
            'phosphor' => 26,
            'kalium' => 0,
            'price' => 16000,
            'created_at' => date('2023-04-03 15:38:31'),
        ]);

        Alternative::create([
            'name' => 'Fosfat Phosgreen',
            'nitrogen' => 0,
            'phosphor' => 20,
            'kalium' => 0,
            'price' => 15000,
            'created_at' => date('2023-04-03 15:38:30'),
        ]);
    }
}