<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanInventaris extends Model
{
    use HasFactory;

    protected $table = 'laporan_inventaris';
    protected $fillable = [
        'inventaris_id',
        'nama',
        'lokasi',
        'kelompok',
        'tgl_perolehan',
        'banyak',
        'harga_satuan',
        'jml_hrg_perolehan',
        'umur',
        'penghapusan',
        'akum_penyusutan',
        'penyusutan_bln',
        'jml_penyusutan',
        'nilai_buku',
        'keterangan'
    ];
}
