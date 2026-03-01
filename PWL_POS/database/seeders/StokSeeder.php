<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;




class StokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];
        for ($i = 1; $i <= 15; $i++) {
            $data[] = [
                'stok_id' => $i,
                'supplier_id' => rand(1, 3), // Acak dari 3 supplier
                'barang_id' => $i,           // Untuk 15 barang berbeda
                'user_id' => 1,              // Anggap admin yang input
                'stok_tanggal' => now(),
                'stok_jumlah' => rand(50, 100),
            ];
        }
        DB::table('t_stok')->insert($data);
    }
}
