<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanAktiva extends Model
{
    use HasFactory;

    protected $table = ['laporan_aktiva'];
    protected $fillable = [
        'aktiva_id',
        'tgl_perolehan',
        'harga_perolehan',
        'umur_teknis',
        'penghapusan',
        'ak_penyusutan',
        'penyusutan_bln',
        'jml_penyu_bln',
        'nilai_buku',
        'keterangan'
    ];
}
