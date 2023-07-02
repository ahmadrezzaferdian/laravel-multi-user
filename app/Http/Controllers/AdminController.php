<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $kelas = Kelas::paginate()->count('kelas');
        $siswa = Siswa::paginate()->count('siswa');
        return view('home', ['key' => 'home', 'kelas' => $kelas, 'siswa' => $siswa]);
    }
    public function admin()
    {
        $kelas = Kelas::paginate()->count('kelas');
        $siswa = Siswa::paginate()->count('siswa');
        return view('home', ['key' => 'home', 'kelas' => $kelas, 'siswa' => $siswa]);
    }
    public function siswa()
    {
        $kelas = Kelas::paginate()->count('kelas');
        $siswa = Siswa::paginate()->count('siswa');
        return view('home', ['key' => 'home', 'kelas' => $kelas, 'siswa' => $siswa]);
    }

    public function kelas()
    {
        $kelas = Kelas::paginate(5);
        return view('kelas', ['key' => 'kelas', 'kelas' => $kelas]);
    }

    public function siswa_()
    {
        $siswa = Siswa::with('kelas')->paginate(5);
        return view('siswa', ['key' => 'siswa', 'siswa' => $siswa]);
    }

    public function pencarian_kelas(Request $request)
    {
        $cari = $request->cari;
        $kelas = Kelas::where('id', 'like', '%' . $cari . '%')->orWhere('nama_kelas', 'like', '%' . $cari . '%')->orWhere('deskripsi', 'like', '%' . $cari . '%')->paginate(5);
        $kelas->appends($request->all());
        return view('kelas', ['key' => '', 'kelas' => $kelas]);
    }

    public function pencarian_siswa(Request $request)
    {
        $cari = $request->cari;
        $siswa = Siswa::with('kelas')->orWhereHas('kelas', function ($query) use ($cari) {
            $query->where('nama_kelas', 'like', '%' . $cari . '%');
        })->orWhere('id', 'like', '%' . $cari . '%')->orWhere('nama_siswa', 'like', '%' . $cari . '%')->orWhere('alamat', 'like', '%' . $cari . '%')->orWhere('phone_number', 'like', '%' . $cari . '%')->paginate(5);
        $siswa->appends($request->all());
        return view('siswa', ['key' => '', 'siswa' => $siswa]);
    }
}
