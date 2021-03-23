<?php

namespace App\Http\Controllers;

use App\Exports\MobilExport;
use Illuminate\Http\Request;
use App\Mobil;
use Maatwebsite\Excel\Facades\Excel;

class MobilController extends Controller
{
    public function index()
    {
        $title = 'Data Mobil | Kerinci Mulya Travel';
        $supir = \App\Supir::all();

        $mobil = \App\Mobil::all();
        //dd($Mobil);
        return view('mobil.index', compact('title'), ['mobil' => $mobil, 'supir' => $supir]);
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
            'kd_mobil' => 'required|min:4',
            'merk' => 'required',
            'no_pol' => 'required',
            'jml_kursi' => 'required',
            'tahun' => 'required',
            'bangku' => 'required'
        ], $messages);

        //insert ke tabelMobil
        $mobil = \App\Mobil::create($request->all());
        return redirect('/mobil')->with('sukses', 'Data Berhasil Ditambah!');
    }
    public function delete($id)
    {
        $mobil = \App\Mobil::find($id);
        $mobil->delete();
        return redirect('/mobil')->with('sukses', 'Data Berhasil di Hapus');
    }
    public function edit($id)
    {
        $title = 'Edit Mobil | Kerinci Mulya Travel';
        $mobil = \App\Mobil::find($id);
        return view('mobil/edit', compact('title'), ['mobil' => $mobil]);
    }
    public function update(Request $request, $id)
    {
        $messages = [
            'required' => ':attribute wajib diisi!',
            'min' => ':attribute harus diisi minimal :min karakter!',
            'max' => ':attribute harus diisi maksimal :max karakter!',
        ];
        //dd($request->all());
        $this->validate($request, [
            'kd_mobil' => 'required|min:4',
            'merk' => 'required',
            'no_pol' => 'required',
            'jml_kursi' => 'required',
            'tahun' => 'required',
            'bangku' => 'required'
        ], $messages);
        $mobil = \App\Mobil::find($id);
        $mobil->update($request->all());
        return redirect('/mobil')->with('sukses', 'Data Berhasil di Update');
    }
    public function export()
    {
        return Excel::download(new MobilExport, 'mobil.xlsx');
    }
}
