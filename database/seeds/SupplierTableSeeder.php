<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SupplierTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('suppliers')->delete();

        $suppliers= array(
            array( 
                'nama' => 'Toko Maju Djaya',
                'alamat' => 'Mojokerto Permai 23 A',
                'tlpn' => '(031) 789987',
                'created_at'  => Carbon::now('Asia/Jakarta')),
            
            array( 
                'nama' => 'Toko Sarana Maju',
                'alamat' => 'Jl Raya Mojokerto Jombang',
                'tlpn' => '(031) 787898',
                'created_at'  => Carbon::now('Asia/Jakarta')),

            array( 
                'nama' => 'Toko Kahuripan',
                'alamat' => 'Sooko Mojokerto',
                'tlpn' => '(031) 789987',
                'created_at'  => Carbon::now('Asia/Jakarta')),

            array( 
                'nama' => 'Toko Harum Manis',
                'alamat' => 'Mojokerto Utara',
                'tlpn' => '(031) 789987',
                'created_at'  => Carbon::now('Asia/Jakarta')),
    );
    DB::table('suppliers')->insert($suppliers);
    }
}
