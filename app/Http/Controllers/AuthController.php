<?php

namespace App\Http\Controllers;

use App\Pemesan;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function login()
    {
        return view('auths.login');
    }
    public function postlogin(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/beranda');
        }
        return redirect('/login');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
    public function registrasi()
    {
        return view('auths.registrasi');
    }
    public function postregistrasi(Request $request)
    {
        $messages = [
            'name.required' => 'Nama Wajib di Isi',
            'email.required' => 'Email Wajib di Isi',
            'email.unique' => 'Email Sudah Pernah Terdaftar',
            'password.min' => 'Password Minimal 8 Karakter',
            'photo.mimes' => 'Format Foto jpeg/png',

        ];
        $this->validate($request, [
            'name' => 'required|max:30',
            'email' => 'required|email|unique:users',
            'password' => 'min:8',
            'photo' => 'mimes:jpeg,png',
        ], $messages);

        $data['name'] = $request->name;
        $data['role'] = $request->role = 'pemesan';
        $data['password'] = bcrypt($request->password);
        // $data['remember_token'] = Str::random(40);
        $data['email'] = $request->email;
        $data['id_registrasi'] = 'REG-' . date('YmdHis');
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        $file = $request->file('photo');
        if ($file) {
            $file->move('images/userphoto', $file->getClientOriginalName());
            $data['photo'] =  $file->getClientOriginalName();
        }
        //dd($file);

        User::insert($data);

        return redirect('/login');
    }
}
