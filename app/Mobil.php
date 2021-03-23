<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    protected $table = 'mobil';

    protected $fillable = ['kd_mobil', 'bangku', 'no_pol', 'merk', 'tahun', 'jml_kursi'];
    /*   public function  pemesanan()
    {
        return $this->belongsToMany('App\Pemesanan', 'mobil_pemesanan', 'mobil_id', 'pemesanan_id');
    }*/
    public function  pemesanan()
    {
        return $this->belongsToMany(Pemesanan::class);
    }
}
