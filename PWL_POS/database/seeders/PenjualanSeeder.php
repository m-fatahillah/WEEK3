<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('t_penjualan')->insert([
                'penjualan_id' => $i,
                'user_id' => 3, // Anggap dilakukan oleh Staff/Kasir
                'pembeli' => 'Customer ' . $i,
                'penjualan_kode' => 'PJN' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'penjualan_tanggal' => now(),
            ]);

            // 2. Isi 3 Barang untuk setiap transaksi (Total 30 Detail)
            for ($j = 1; $j <= 3; $j++) {
                DB::table('t_penjualan_detail')->insert([
                    'penjualan_id' => $i,
                    'barang_id' => rand(1, 15), // Acak dari 15 barang
                    'harga' => rand(10000, 20000),
                    'jumlah' => rand(1, 5),
                ]);
            }
        }
    }
}
