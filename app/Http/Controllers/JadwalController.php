<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\JadwalExport;
use Maatwebsite\Excel\Facades\Excel;

class JadwalController extends Controller
{
    public function index()
    {
        $title = 'Jadwal | Kerinci Mulya Travel';
        $supir = \App\Supir::all();

        $jadwal = \App\Jadwal::all();
        //dd($jadwal);
        return view('jadwal.index', compact('title'), ['jadwal' => $jadwal, 'supir' => $supir]);
    }
    public function create(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi!',
            'min' => ':attribute harus diisi minimal :min karakter!',
            'max' => ':attribute harus diisi maksimal :max karakter!',
        ];
        //dd($request->all());
        $this->validate($request, [
            'kode' => 'required|min:4',
            'jam' => 'required',
            'tujuan' => 'required',
            'biaya' => 'required'
        ], $messages);

        //insert ke tabelJadwal

        $jadwal = \App\Jadwal::create($request->all());
        //dd($jadwal);
        return redirect('/jadwal')->with('sukses', 'Data Berhasil Ditambah!');
    }
    public function delete($id)
    {
        $jadwal = \App\Jadwal::find($id);
        $jadwal->delete();
        return redirect('/jadwal')->with('sukses', 'Data Berhasil di Hapus');
    }
    public function edit($id)
    {
        $title = 'Edit Jadwal | Kerinci Mulya Travel';
        $jadwal = \App\Jadwal::find($id);
        return view('jadwal/edit', compact('title'), ['jadwal' => $jadwal]);
    }
    public function update(Request $request, $id)
    {
        $messages = [
            'required' => ':attribute wajib diisi!',
            'min' => ':attribute harus diisi minimal :min karakter!',
            'max' => ':attribute harus diisi maksimal :max karakter!',
        ];
        $this->validate($request, [
            'kode' => 'required|min:4',
            'jam' => 'required',
            'tujuan' => 'required',
            'biaya' => 'required'
        ], $messages);
        $jadwal = \App\Jadwal::find($id);
        $jadwal->update($request->all());
        return redirect('/jadwal')->with('sukses', 'Data Berhasil di Update');
    }
    public function export()
    {
        return Excel::download(new JadwalExport, 'jadwal.xlsx');
    }
}
