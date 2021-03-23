<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supir extends Model
{
    protected $table = 'supir';
    protected $fillable = ['id', 'nama_supir', 'mobil', 'alamat', 'jenis_kelamin', 'no_hp', 'status', 'avatar', 'user_id', 'id_jadwal', 'tanggal'];

    public function getAvatar()
    {
        if (!$this->avatar) {
            return asset('images/icon.png');
        }
        return asset('images/' . $this->avatar);
    }
    public function jadwal()
    {
        return $this->belongsTo('App\Jadwal', 'id_jadwal', 'id');
    }
    /*public function pemesanan()
    {
        return $this->hasMany('App\Pemesanan', 'id_supir');
    }*/
}
