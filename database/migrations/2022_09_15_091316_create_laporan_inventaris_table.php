<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanInventarisTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan_inventaris', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('inventaris_id');
            $table->string('nama', 50);
            $table->text('lokasi');
            $table->text('kelompok');
            $table->date('tgl_perolehan')->nullable();
            $table->integer('banyak');
            $table->integer('harga_satuan');
            $table->integer('jml_hrg_perolehan');
            $table->text('umur')->nullable();
            $table->integer('penghapusan')->nullable()->default(0);
            $table->integer('akum_penyusutan');
            $table->integer('penyusutan_bln');
            $table->integer('jml_penyusutan');
            $table->integer('nilai_buku');
            $table->text('keterangan')->nullable();
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
        Schema::drop('laporan_inventaris');
    }
}
