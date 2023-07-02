<?php

namespace App\Models;

use App\Models\Siswa;
use App\Models\KelasSiswa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kelas extends Model
{
    use HasFactory;
    protected $table = 'kelas';
    protected $guarded = ['id'];

    protected $fillable = [
        'nama_kelas',
        'deskripsi',



    ];
    public function kelas()
    {
        return $this->hasMany(Siswa::class);
    }

    public function kelassiswa()
    {
        return $this->hasMany(KelasSiswa::class);
    }
}
