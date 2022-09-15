<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanAktivaTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan_aktiva', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('aktiva_id');
            $table->string('nama', 35);
            $table->date('tgl_perolehan')->nullable();
            $table->integer('harga_perolehan');
            $table->string('umur_teknis', 15)->nullable();
            $table->integer('penghapusan')->nullable()->default(0);
            $table->integer('ak_penyusutan');
            $table->integer('penyusutan_bln');
            $table->integer('jml_penyu_bln');
            $table->float('nilai_buku', 10, 0);
            $table->string('keterangan', 50)->nullable();
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
        Schema::drop('laporan_aktiva');
    }
}
