<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { 
        $userData = [
        [
            'name' => 'Mas Admin',
            'email' => 'admin@test.test',
            'role' => 'admin',
            'password' => Hash::make('123456')

        ],
        [
            'name' => 'Mas siswa',
            'email' => 'siswa1@test.test',
            'role' => 'siswa',
            'password' => Hash::make('123456')

        ],
            
        ];

        foreach ($userData as $user) {
            User::create($user);
        }
    }
}
