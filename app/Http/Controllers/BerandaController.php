<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Pemesan;
use App\Pemesanan;

class BerandaController extends Controller
{
    public function index()
    {
        $title = 'Beranda | Kerinci Mulya';
        $userid = Auth::user()->id;
        //cek Konfirmasi Pembayrana
        $cek = Pemesanan::where('user_id', $userid)->count();
        if ($cek < 1) {
            $pesan = 'Harap Melakukan Pemesanan';
        } else {
            $pesan = 'Pemesanan Telah Di Lakukan';
        }

        $cek2 = Pemesanan::where('user_id', $userid)->count();
        return view('beranda.index', compact('pesan', 'cek2', 'title'));
    }
}
