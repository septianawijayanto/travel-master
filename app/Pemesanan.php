<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $table = 'pemesanan';
    protected $fillable = ['id', 'id_pemesanan', 'bkttf', 'jumlah_penumpang', 'alamat', 'almt_jmpt', 'jenis_kelamin', 'no_hp', 'tanggal_pesan', 'id_jadwal', 'user_id', 'is_verifikasi'];

    public function getAvatar()
    {
        if (!$this->bkttf) {
            return asset('buktitf/icon.png');
        }
        return asset('buktitf/' . $this->bkttf);
    }
    public function jadwal()
    {
        return $this->belongsTo('App\Jadwal', 'id_jadwal', 'id');
    }
    /*public function jadwal()
    {
        return $this->belongsToMany(Jadwal::class, 'jadwal_pemesan', 'id_pemesan', 'id_jadwal')->withTimestamps();
    }*/
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    /*public function supir()
    {
        return $this->belongsTo('App\Supir', 'id_supir', 'id');
    }*/
    /*public function kursi()
    {
        return $this->hasMany(Kursi::class);
    }*/

    /*  public function mobil()
    {
        return $this->belongsToMany('App\Mobil', 'mobil_pemesanan', 'mobil_id', 'pemesanan_id');
    }*/
    public function mobil()
    {
        return $this->belongsToMany(Mobil::class);
    }
}
