<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supir;
use App\Jadwal;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SupirExport;
use Illuminate\Support\Facades\Auth;


class SupirController extends Controller
{
    public function index()
    {
        $title = 'Data Supir | Kerinci Mulya Travel';
        $jadwal = \App\Jadwal::all();
        //dd($jadwal);
        $supir = \App\Supir::all();
        return view('supir.index', compact('title'), ['supir' => $supir, 'jadwal' => $jadwal]);
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
            'nama_supir' => 'required|max:30',
            'mobil' => 'required',
            'tanggal' => 'required',
            'no_hp' => 'required|max:13',
            'email' => 'required|email|unique:users',
            'alamat' => 'required|max:50',
            'jenis_kelamin' => 'required',
            'status' => 'required',
            'id_jadwal' => 'required',
            'avatar' => 'mimes:jpeg,png'
        ], $messages);
        //insert ke tabel user
        $user = new \App\User;
        $user->role = 'supir';
        $user->name = $request->nama_supir;
        $user->email = $request->email;
        // $user->photo = $request->photo;
        $user->password = bcrypt('12345678');
        // $user->remember_token = Str::random(40);
        $user->save();

        //insert ke tabel supir
        $request->request->add(['user_id' => $user->id]);
        $supir = \App\Supir::create($request->all());
        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $supir->avatar = $request->file('avatar')->getClientOriginalName();
            $supir->save();
        }
        return redirect('/supir')->with('sukses', 'Data Berhasil Ditambah!');
    }
    public function edit($id)
    {
        $title = 'Edit Data supir | Kerinci Mulya Travel';
        $jadwal = \App\Jadwal::all();
        $supir = \App\Supir::find($id);
        return view('supir/edit', compact('title'), ['supir' => $supir, 'jadwal' => $jadwal]);
    }
    public function update(Request $request, $id)
    {

        $messages = [
            'required' => ':attribute wajib diisi!',
            'min' => ':attribute harus diisi minimal :min karakter!',
            'max' => ':attribute harus diisi maksimal :max karakter!',
        ];
        $this->validate($request, [
            'nama_supir' => 'required|max:30',
            'mobil' => 'required',
            'tanggal' => 'required',
            'no_hp' => 'required|max:13',
            'alamat' => 'required|max:50',
            'jenis_kelamin' => 'required',
            'status' => 'required',
            'id_jadwal' => 'required',
            'avatar' => 'mimes:jpeg,png'
        ], $messages);

        $supir = \App\Supir::find($id);

        $supir->update($request->all());
        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $supir->avatar = $request->file('avatar')->getClientOriginalName();
            $supir->save();
        }
        return redirect('/supir')->with('sukses', 'Data Berhasil di Update');
    }
    public function delete($id)
    {
        $supir = \App\Supir::find($id);
        $supir->delete();
        return redirect('/supir')->with('sukses', 'Data Berhasil di Hapus');
    }
    public function detail($id)
    {
        $title = 'Profil Supir | Kerinci Mulya Travel';
        $supir = \App\Supir::find($id);

        //sup = \App\Supir::all();
        $jadwal = \App\Jadwal::all();

        return view('supir.detail', compact('title'), ['supir' => $supir, 'jadwal' => $jadwal]);
    }
    /*public function detail($id)
    {
        $supir = \App\Supir::find($id);
        return view('jadwal.detail', ['supir' => $supir]);
    }*/
    public function export()
    {
        return Excel::download(new SupirExport, 'supir.xlsx');
    }
    public function jadwal($id)
    {
        $title = 'Jadwal Supir | Kerinci Mulya Travel';
        //$supir = \App\Supir::find($id);
        $dt = Supir::where('user_id', Auth::user()->id)->first();
        $supir = \App\Supir::all();
        $jadwal = \App\Jadwal::all();
        $pemesanan = \App\Pemesanan::all();


        return view('supir.supir.jadwal', compact('dt', 'title'), ['supir' => $supir, 'jadwal' => $jadwal, 'pemesanan' => $pemesanan]);
    }
}
