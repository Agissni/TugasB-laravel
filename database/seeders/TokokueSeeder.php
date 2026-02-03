<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TokokueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert contoh produk — insertOrIgnore supaya idempotent
        DB::table('tokokue')->insertOrIgnore([
            [
                'kategori_id' => 1,
                'nama' => 'Kue Coklat',
                'ketersediaan' => 'tersedia',
                'detail' => 'Kue coklat moist, ukuran 1kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 1,
                'nama' => 'Kue Keju',
                'ketersediaan' => 'tersedia',
                'detail' => 'Kue keju lembut, ukuran 500g',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 2,
                'nama' => 'Lapis Legit',
                'ketersediaan' => 'habis',
                'detail' => 'Lapis legit premium, 12 lapis',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
