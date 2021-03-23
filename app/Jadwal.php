<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal';

    protected $fillable = ['kode', 'jam', 'tujuan', 'biaya'];

    public function supir()
    {
        return $this->hasMany('App\Supir', 'id_jadwal');
    }
    public function pemesanan()
    {
        return $this->hasMany('App\Pemesanan', 'id_jadwal');
    }

    /*public function pemesan()
    {
        return $this->belongsToMany(Pemesan::class, 'jadwal_pemesan', 'id_jadwal', 'id_pemesan')->withTimestamps();
    }*/
}
