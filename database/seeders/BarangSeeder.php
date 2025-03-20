<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['barang_id' => 1, 'kategori_id' => 1, 'barang_kode' => 'LPT001', 'barang_nama' => 'Laptop', 'harga_beli' => 5000000, 'harga_jual' => 5500000],
            ['barang_id' => 2, 'kategori_id' => 1, 'barang_kode' => 'SMP002', 'barang_nama' => 'Smartphone', 'harga_beli' => 3000000, 'harga_jual' => 3500000],
            ['barang_id' => 3, 'kategori_id' => 2, 'barang_kode' => 'KMJ003', 'barang_nama' => 'Kemeja', 'harga_beli' => 150000, 'harga_jual' => 200000],
            ['barang_id' => 4, 'kategori_id' => 2, 'barang_kode' => 'CLN004', 'barang_nama' => 'Celana', 'harga_beli' => 180000, 'harga_jual' => 230000],
            ['barang_id' => 5, 'kategori_id' => 3, 'barang_kode' => 'NSG005', 'barang_nama' => 'Nasi Goreng', 'harga_beli' => 20000, 'harga_jual' => 25000],
            ['barang_id' => 6, 'kategori_id' => 3, 'barang_kode' => 'AYM006', 'barang_nama' => 'Ayam Goreng', 'harga_beli' => 25000, 'harga_jual' => 30000],
            ['barang_id' => 7, 'kategori_id' => 4, 'barang_kode' => 'BKU007', 'barang_nama' => 'Buku Tulis', 'harga_beli' => 5000, 'harga_jual' => 10000],
            ['barang_id' => 8, 'kategori_id' => 4, 'barang_kode' => 'PNS008', 'barang_nama' => 'Pensil', 'harga_beli' => 2000, 'harga_jual' => 5000],
            ['barang_id' => 9, 'kategori_id' => 5, 'barang_kode' => 'MSK009', 'barang_nama' => 'Masker', 'harga_beli' => 1000, 'harga_jual' => 3000],
            ['barang_id' => 10, 'kategori_id' => 5, 'barang_kode' => 'SRG010', 'barang_nama' => 'Sarung Tangan', 'harga_beli' => 5000, 'harga_jual' => 12000],
        ];
        DB::table('m_barang')->insert($data);
    }
}
