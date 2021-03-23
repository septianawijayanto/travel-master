<?php

namespace App\Http\Controllers;


use App\Jadwal;

use Illuminate\Http\Request;
use App\Pemesanan;
use App\Mobil;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Support\Facades\Auth;

use PDF;

class PemesananController extends Controller
{
    public function index()
    {
        $title = 'Form Pemesanan | Kerinci Mulya Travel';
        $mobil = Mobil::all();
        $jadwal = \App\Jadwal::all();


        $dt = Pemesanan::where('user_id', Auth::user()->id)->first();
        $cek = Pemesanan::where('user_id', Auth::user()->id)->count();

        return view('pemesanan.index', compact('dt', 'cek', 'title', 'mobil'), ['jadwal' => $jadwal]);
    }
    public function create(Request $request, $id)
    {

        $messages = [
            'required' => ':attribute wajib diisi!',
            'min' => ':attribute harus diisi minimal :min karakter!',
            'max' => ':attribute harus diisi maksimal :max karakter!',

        ];

        $this->validate($request, [
            'id_jadwal' => 'required',
            //'mobil_id' => ['required', 'unique:mobil_pemesanan'],
            // 'mobil_id' => 'unique:connection.mobil_pemesanan,mobil_id',
            //'mobil_id' => 'array|required',
            // 'mobil_id' => 'exists:App\Mobil,id',

            'mobil' => 'required',

            'jumlah_penumpang' => 'required',
            'tanggal_pesan' => 'required',
            'jenis_kelamin' => 'required',
            'no_hp' => 'required|unique:pemesanan,no_hp|max:13',
            'alamat' => 'required',
            'almt_jmpt' => 'required',


        ], $messages);
        $pemesanan = Pemesanan::create([
            'user_id' => $id,
            'id_jadwal' => $request->id_jadwal,
            'jumlah_penumpang' => $request->jumlah_penumpang,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'almt_jmpt' => $request->almt_jmpt,

            'no_hp' => $request->no_hp,
            'tanggal_pesan' => $request->tanggal_pesan,
            'id_pemesanan' => 'P-' . date('mdHis'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),

            // 'bkttf' => 'public/uploads/' . $new_bkttf
        ]);
        //$bkttf->move('public/uploads/' . $new_bkttf);

        // $pemesanan = $pemesanan->mobil()->where('mobil_id', $request->mobil)->count();


        if ($pemesanan->mobil()->where('mobil_id', $request->mobil)->exists()) {
            return redirect()->back()->with('gagal', 'Kursi Sudah');
        }
        // $pemesanan->mobil()->sync($request->mobil);
        $pemesanan->mobil()->attach($request->mobil);

        return redirect()->back()->with('sukses', 'Pemesanan Berhasil Dilakukan');
    }
    public function update(Request $request, $id)
    {
        $messages = [
            'required' => ':attribute wajib diisi!',
            'bkttf.required' => 'Wajib Mengupload Bukti Transfer',
            'bkttf.mimes' => 'Format Foto jpeg/png',
            'min' => ':attribute harus diisi minimal :min karakter!',
            'max' => ':attribute harus diisi maksimal :max karakter!',
        ];
        $this->validate($request, [
            'id_jadwal' => 'required',
            'jumlah_penumpang' => 'required',
            'almt_jmpt' => 'required',
            'tanggal_pesan' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'bkttf' => 'mimes:jpeg,png',
            'no_hp' => 'required',
        ], $messages);

        // $data['user_id'] = $id;


        $data['id_jadwal'] = $request->id_jadwal;
        $data['jumlah_penumpang'] = $request->jumlah_penumpang;
        $data['jenis_kelamin'] = $request->jenis_kelamin;

        $data['alamat'] = $request->alamat;
        $data['almt_jmpt'] = $request->almt_jmpt;
        $data['no_hp'] = $request->no_hp;
        $data['tanggal_pesan'] = $request->tanggal_pesan;
        // $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        //upload foto
        // dd($data);
        $file = $request->file('bkttf');
        if ($file) {
            $file->move('buktitf', $file->getClientOriginalName());
            $data['bkttf'] =  $file->getClientOriginalName();
        }

        Pemesanan::where('user_id', $id)->update($data);




        // if ($pemesanan->mobil()->where('mobil_id', $request->mobil)->exists()) {
        //     return redirect()->back()->with('gagal', 'kkk');


        // }



        return redirect('/pemesanan/' . Auth::user()->id . '/data')->with('sukses', 'Data Berhasil Diedit');
    }



    public function cetak()
    {

        $dt = Pemesanan::where('user_id', Auth::user()->id)->first();
        $mobil = Mobil::all();
        $pdf = PDF::loadview('beranda.pdf', compact('dt', 'mobil'))->setPaper('a5', 'landscape');
        return $pdf->stream();


        return redirect()->back();
    }
    public function data(Request $request)
    {
        $title = 'Data Pemesanan | Kerinci Mulya Travel';

        $jadwal = \App\Jadwal::all();
        $mobil = Mobil::all();

        $dt = Pemesanan::where('user_id', Auth::user()->id)->first();

        //cek Konfirmasi Pembayrana
        $id = $dt->is_verifikasi;

        //$cek2 = Pemesanan::where('is_verifikasi', Auth::user()->id)->count();
        $cek2 = Pemesanan::where('id', $id)->count();

        return view('pemesanan.data', compact('dt', 'title', 'cek2', 'mobil'), ['jadwal' => $jadwal]);
    }
}
