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
                'harga_kecil' => 85000,
                'harga_besar' => 110000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 1,
                'nama' => 'Kue Kastangel',
                'ketersediaan' => 'tersedia',
                'detail' => 'Keju edam dan cheddar yang melimpah.',
                'harga_kecil' => 90000,
                'harga_besar' => 120000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 1,
                'nama' => 'Kue Putri Salju',
                'ketersediaan' => 'tersedia',
                'detail' => 'Lembut, gurih, dan manis yang pas.',
                'harga_kecil' => 75000,
                'harga_besar' => 95000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
