<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
            'nama' => 'admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('admin'),
            'role' => 'admin',
            ],
            [
            'nama' => 'dokter',
            'email' => 'dokter@mail.com',
            'password' => Hash::make('dokter'),
            'role' => 'dokter',
            ]
        ];
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
