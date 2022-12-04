<?php

namespace App\Http\Controllers;

use App\Models\surat_keluar;
use Illuminate\Http\Request;
use App\Models\surat_masuk;
use App\Models\User;


class DashboardController extends Controller
{
    public function index()
    {

        $surat_masuk = surat_masuk::count();
        $surat_keluar = surat_keluar::count();
        $user = user::where('level','admin')->count();

        return view('dashboard', compact('surat_masuk','surat_keluar','user'));


    }
}
