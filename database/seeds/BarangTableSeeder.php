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
            'created_at'  => Carbon::now('Asia/Jakarta')),
            
            array( 
            'nama' => 'Tali',
            'created_at'  => Carbon::now('Asia/Jakarta')),

            array( 
                'nama' => 'Mata Ikan',
                'created_at'  => Carbon::now('Asia/Jakarta')),

            array( 
            'nama' => 'Kulit',
            'created_at'  => Carbon::now('Asia/Jakarta')),
    );
    DB::table('barangs')->insert($barang);
}
}

