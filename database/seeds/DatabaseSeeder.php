<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call("BarangTableSeeder");
        $this->call("SupplierTableSeeder");
        $this->call("StockTableSeeder");
    }
}
