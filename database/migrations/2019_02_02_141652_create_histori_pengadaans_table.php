<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoriPengadaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histori_pengadaans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('barang_id');
            $table->string('supplier_id');
            $table->integer('jml_order')->nullable();
            $table->integer('jml_diterima')->nullable();
            $table->integer('harga_beli')->nullable();
            $table->integer('cost')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('histori_pengadaans');
    }
}
