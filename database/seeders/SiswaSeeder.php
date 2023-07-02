<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $siswaData = [
        [
            'kelas_id' => '1',
            'nama_siswa' => 'Ahmad',
            'alamat' => 'Kosambi',
            'phone_number' => '081234567890',
        ],
        [
            'kelas_id' => '2',
            'nama_siswa' => 'Wahyu',
            'alamat' => 'Nganjuk',
            'phone_number' => '083234567890',
        ],
        [
            'kelas_id' => '3',
            'nama_siswa' => 'Daka',
            'alamat' => 'Cengkareng',
            'phone_number' => '084234567890',
        ],
        [
            'kelas_id' => '4',
            'nama_siswa' => 'Rezza',
            'alamat' => 'Jelambar',
            'phone_number' => '081234567890',
        ],
        [
            'kelas_id' => '5',
            'nama_siswa' => 'Budi',
            'alamat' => 'Jaksel',
            'phone_number' => '081234567890',
        ],
            
        ];

        foreach ($siswaData as $siswa) {
            Siswa::create($siswa);
        }
    }
}
