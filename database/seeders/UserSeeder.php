<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin SPK Jenis Pupuk',
            'email' => 'gahasapurba.tech@gmail.com',
            'email_verified_at' => date('Y-m-d H:i:s', time()),
            'password' => bcrypt('spkjenispupuk123456'),
            'is_admin' => true,
        ]);

        User::create([
            'name' => 'Gahasa Purba',
            'email' => 'gahasapurba.social@gmail.com',
            'email_verified_at' => date('Y-m-d H:i:s', time()),
            'password' => bcrypt('gahasa123456'),
        ]);
    }
}
