<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_laundry', function (Blueprint $table) {
            $table->id('id_laundry');
            $table->string('nama');
            $table->string('alamat');
            $table->string('nomorhp');
            $table->string('jenis');
            $table->string('berat');
            $table->string('layanan');
            $table->string('status');
            $table->string('harga');
            $table->string('pembayaran');
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
        Schema::dropIfExists('tb_laundry');
    }
};
