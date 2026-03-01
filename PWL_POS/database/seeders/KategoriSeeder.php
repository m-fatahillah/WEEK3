<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['kategori_id' => 1, 'kategori_kode' => 'SNC', 'kategori_nama' => 'Snack/Makanan Ringan'],
            ['kategori_id' => 2, 'kategori_kode' => 'DRN', 'kategori_nama' => 'Minuman'],
            ['kategori_id' => 3, 'kategori_kode' => 'MTN', 'kategori_nama' => 'Makanan Instan'],
            ['kategori_id' => 4, 'kategori_kode' => 'HGN', 'kategori_nama' => 'Kebersihan/Higiene'],
            ['kategori_id' => 5, 'kategori_kode' => 'KOS', 'kategori_nama' => 'Kosmetik'],
        ];
        DB::table('m_kategori')->insert($data);
    }
}
