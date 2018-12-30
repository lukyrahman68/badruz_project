<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class StockTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stocks')->delete();

        $stocks = array(
            array( 
            'id_barang' => '1',
            'jumlah' => '3000',
            'created_at'  => Carbon::now('Asia/Jakarta')),
            
            array( 
            'id_barang' => '2',
            'jumlah' => '2590',
            'created_at'  => Carbon::now('Asia/Jakarta')),

    );
    DB::table('stocks')->insert($stocks);
    }
}
