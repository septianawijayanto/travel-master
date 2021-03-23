<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function home()
    {
        $jadwal = \App\Jadwal::all();
        //dd($jadwal);

        return view('site.home', ['jadwal' => $jadwal]);
    }
    public function about()
    {
        return view('site.about');
    }
    public function kontak()
    {
        return view('site.kontak');
    }
}
