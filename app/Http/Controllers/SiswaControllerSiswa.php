<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaControllerSiswa extends Controller
{
    public function tambah()
    {
        $kelas = Kelas::all();
    
        return view('tambah-siswa', ['key' => 'tambah', 'kelas' => $kelas]);
    }

    public function simpan (request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'kelas_id' => 'required',
            'nama_siswa' => 'required',
            'alamat' => 'required',
            'phone_number' => 'required',
        ]);
        DB::table('siswa')  -> insert([
            'id' => $request->id,
            'kelas_id' => $request->kelas_id,
            'nama_siswa'=> $request->nama_siswa,
            'alamat'=> $request->alamat,
            'phone_number'=> $request->phone_number,
        ]);
        

        return redirect('/siswa/siswa');
    }

    public function edit($id)
    {
        $kelas = Kelas::all();
        $siswa = Siswa::where('id',$id)->get();
        return view('edit-siswa',['siswa' => $siswa, 'kelas' => $kelas], ['key' => 'edit']);
    }

    

    public function update (request $request)
    {
        DB::table('siswa')  -> where('id',$request->id)->update([
            'id' => $request->id,
            'kelas_id' => $request->kelas_id,
            'nama_siswa'=> $request->nama_siswa,
            'alamat'=> $request->alamat,
            'phone_number'=> $request->phone_number,
        ]);

        return redirect('/siswa/siswa');
    }

     public function delete ($id)
    {
        $siswa= DB::table('siswa')->where('id',$id)->delete();
        return redirect('/siswa/siswa');
    }
}
