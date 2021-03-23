<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jadwal;
use App\Exports\PemesananExport;
use App\Pemesanan;
use App\Mobil;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;

class PemesanController extends Controller
{
    public function tblpemesan()
    {
        $title = 'Data Pemesan | Kerinci Mulya Travel';
        $mobil = Mobil::all();
        $data = Pemesanan::orderBy('tanggal_pesan', 'desc')->get();
        $jadwal = \App\Jadwal::all();

        $cek = Jadwal::where('biaya')->count();

        //$dt = Pemesanan::where('user_id', Auth::user()->id)->first();
        return view('pemesanan.pesan.tblpemesanan', compact('cek', 'title', 'data', 'mobil'), ['jadwal' => $jadwal]);
    }
    public function detail($id)

    {
        $title = 'Detail Pemesan | Kerinci Mulya Travel';
        $pemesanan = \App\Pemesanan::find($id);
        $jadwal = \App\Jadwal::all();
        $mobil = Mobil::all();
        return view('pemesanan.pesan.detail', compact('title', 'mobil'), ['pemesanan' => $pemesanan, 'jadwal' => $jadwal]);
    }
    public function delete($id)
    {
        $pemesanan = \App\Pemesanan::find($id);
        $pemesanan->delete();

        return redirect('/datapemesan')->with('sukses', 'Data Berhasil di Hapus');
    }
    public function edit($id)

    {
        $title = 'Edit Data Pemesan | Kerinci Mulya Travel';
        $jadwal = \App\Jadwal::all();
        $mobil = Mobil::all();
        $pemesanan = \App\Pemesanan::find($id);
        return view('pemesanan.pesan/edit', compact('title', 'mobil'), ['pemesanan' => $pemesanan, 'jadwal' => $jadwal]);
    }
    public function update(Request $request, $id)

    {
        $messages = [
            'required' => ':attribute wajib diisi!',
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
            'no_hp' => 'required',
        ], $messages);


        // $data['user_id'] = $id;
        $data['id_jadwal'] = $request->id_jadwal;
        //$data['jumlah_penumpang'] = $request->jumlah_penumpang;
        $data['jenis_kelamin'] = $request->jenis_kelamin;
        $data['alamat'] = $request->alamat;
        $data['almt_jmpt'] = $request->almt_jmpt;
        $data['no_hp'] = $request->no_hp;
        $data['tanggal_pesan'] = $request->tanggal_pesan;
        // $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');


        Pemesanan::where('id', $id)->update($data);

        return redirect('/datapemesan',)->with('sukses', 'Data Berhasil Diedit');
        /* $title = 'Edit Data Pemesan | Kerinci Mulya Travel';
        $jadwal = \App\Jadwal::all();
        $pemesanan = \App\Pemesanan::find($id);
        $pemesanan->update($request->all());
        return view('pemesanan.pesan.tblpemesanan', compact('title'), ['pemesanan' => $pemesanan, 'jadwal' => $jadwal])->with('sukses', 'Data Berhasil di Update');
  */
    }

    public function export()
    {
        return Excel::download(new PemesananExport, 'pemesan.xlsx');
    }
    public function periode(Request $request)
    {
        $dari = $request->dari;
        $sampai = $request->sampai;
        $jadwal = \App\Jadwal::all();
        $mobil = Mobil::all();
        $title = "Transaksi Pemesanan dari $dari sampai $sampai";

        $data = Pemesanan::whereDate('tanggal_pesan', '>=', $dari)->whereDate('tanggal_pesan', '<=', $sampai)->orderBy('tanggal_pesan', 'desc')->get();

        return view('pemesanan.pesan.tblpemesanan', compact('title', 'data', 'mobil'), ['jadwal' => $jadwal]);
    }
    public function tujuan(Request $request)
    {
        $tujuan = $request->tujuan;
        $mobil = Mobil::all();
        $title = "Tujuan $tujuan";
        $jadwal = \App\Jadwal::all();
        $data = Pemesanan::where('id_jadwal', '=', $tujuan)->orderBy('id_jadwal', 'desc')->get();

        return view('pemesanan.pesan.tblpemesanan', compact('title', 'data', 'mobil'), ['jadwal' => $jadwal]);
    }
    public function verifikasi($id)
    {
        //  $title = 'Data Pemesan | Kerinci Mulya Travel';
        // $mobil = Mobil::all();
        // $data = Pemesanan::orderBy('tanggal_pesan', 'desc')->get();
        $data = Pemesanan::where('id', $id)->first();
        // $jadwal = \App\Jadwal::all();

        $verifikasi = $data->is_verifikasi;
        if ($verifikasi == 1) {
            Pemesanan::where('id', $id)->update(['is_verifikasi' => 0]);
        } else {
            Pemesanan::where('id', $id)->update(['is_verifikasi' => 1]);
        }

        //$dt = Pemesanan::where('user_id', Auth::user()->id)->first();
        return redirect()->back()->with('sukses', 'Transaksi Pembayaran berhasil di Update');
    }
}
