<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $kelasData = [
        [
            'nama_kelas' => 'Matematika',
            'deskripsi' => 'Algoritma',
        ],
        [
            'nama_kelas' => 'Bahasa Indonesia',
            'deskripsi' => 'Ejaan Bahasa Indonesia yang Disempurnakan (EYD) ',
        ],
        [
            'nama_kelas' => 'Sejarah',
            'deskripsi' => 'Perang Dunia Ke-1',
        ],
        [
            'nama_kelas' => 'Bahasa Inggris',
            'deskripsi' => 'preparation IELTS',
        ],
        [
            'nama_kelas' => 'Ilmu Pengetahuan Alam',
            'deskripsi' => 'Klasifikasi Makhluk Hidup',
        ],
            
        ];

        foreach ($kelasData as $kelas) {
            Kelas::create($kelas);
        }
    }
}
