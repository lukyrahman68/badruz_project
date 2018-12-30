<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BarangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('barangs')->delete();

        $barang = array(
            array(
            'nama' => 'Sol',
            'warna' => 'Coklat',
            'jenis' => 'Utama',
            'kode' => 'K01',
            'harga_beli' => 10000,
            'harga_jual' => 15000,
            'created_at'  => Carbon::now('Asia/Jakarta')),

            array(
                'nama' => 'Tali',
                'warna' => 'Putih',
                'jenis' => 'Peralatan',
                'kode' => 'T01',
                'harga_beli' => 5000,
                'harga_jual' => 10000,
                'created_at'  => Carbon::now('Asia/Jakarta')),
    );
    DB::table('barangs')->insert($barang);
}
}

