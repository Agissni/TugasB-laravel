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
        // Hapus data lama terlebih dahulu
        DB::table('tokokue')->truncate();
        
        // Insert contoh produk
        DB::table('tokokue')->insert([
            [
                'kategori_id' => 1,
                'nama' => 'Kue Nastar',
                'ketersediaan' => 'tersedia',
                'detail' => 'Nastar klasik dengan butter wisman premium.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 1,
                'nama' => 'Kue Kastangel',
                'ketersediaan' => 'tersedia',
                'detail' => 'Keju edam dan cheddar yang melimpah.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 1,
                'nama' => 'Kue Putri Salju',
                'ketersediaan' => 'tersedia',
                'detail' => 'Lembut, gurih, dan manis yang pas.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
