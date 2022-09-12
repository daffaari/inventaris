<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aktiva extends Model
{
    use HasFactory;

    /* cek relasi model sebelum di hapus, jika terdapat relasi maka tdk bisa di hapus

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($telco) {
            $relationMethods = ['laporan'];

            foreach ($relationMethods as $relationMethod) {
                if ($telco->$relationMethod()->count() > 0) {
                    return false;
                }
            }
        });
    }
    */

    protected $table = 'aktiva';
    protected $fillable = ['kode', 'nama'];

    public function laporan()
    {
        return $this->hasMany('App\Models\LaporanAktiva');
    }
}
