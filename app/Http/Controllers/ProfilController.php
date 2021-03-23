<?php

namespace App\Http\Controllers;

use App\Pemesanan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function index()
    {
        $title = 'Profil';
        return view('profil.index', compact('title'));
    }
}
