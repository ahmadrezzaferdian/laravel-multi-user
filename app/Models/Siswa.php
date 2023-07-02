<?php

namespace App\Models;

use App\Models\Kelas;
use App\Models\KelasSiswa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswa';
    protected $guarded = ['id'];

    protected $fillable = [
        'kelas_id',
        'nama_siswa',
        'alamat',
        'phone_number',

    ];
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
    public function kelassiswa()
    {
        return $this->hasMany(KelasSiswa::class);
    }
}
