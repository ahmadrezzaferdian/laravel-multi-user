<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;




class KelasController extends Controller
{
   public function tambah()
    {
        
        return view('tambah-kelas',['key' => 'tambah']);
    }

    public function simpan (request $request)
    {
         $request->validate([
        'id' => 'required|integer',
        'nama_kelas' => 'required|string|max:255',
        'deskripsi' => 'required|string|max:255',
    ]);
        DB::table('kelas')  -> insert([
            'id' => $request->id,
            'nama_kelas' => $request->nama_kelas,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect('kelas');
    }

    public function edit($id)
    {
        $kls = DB::table('kelas')->where('id',$id)->get();
        return view('edit-kelas',['kls' => $kls], ['key' => 'edit']);
    }

    public function update (request $request)
    {
        DB::table('kelas')  -> where('id',$request->id)->update([
            'id' => $request->id,
            'nama_kelas' => $request->nama_kelas,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect('/kelas');
    }

     public function delete ($id)
    {
        $brg = DB::table('kelas')->where('id',$id)->delete();
        return redirect('/kelas');
    }

}
