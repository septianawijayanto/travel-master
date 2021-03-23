<?php

namespace App\Http\Controllers;

use App\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifikasiController extends Controller
{
    public function index()
    {
        $title = 'Verifikasi Pembayaran';

        return view('beranda.verifikasi.index', compact('title'));
    }

    public function verifikasi(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi!',
            'min' => ':attribute harus diisi minimal :min karakter!',
            'max' => ':attribute harus diisi maksimal :max karakter!',
        ];
        $this->validate($request, [
            'id_pemesanan' => 'required'
        ], $messages);


        $userid = Auth::user()->id;
        $id = $request->id_pemesanan;

        $cek = Pemesanan::where('id_pemesanan', $id)->count();



        if ($cek > 0) {
            Pemesanan::where('id_pemesanan', $id)->update(['is_verifikasi' => $userid]);
            \Session::flash('sukses', 'Pembayaran berhasil di verifikasi');
        } else {
            \Session::flash('gagal', 'ID Pemesanan tidak ditemukan');
        }


        return redirect()->back();
    }
}
