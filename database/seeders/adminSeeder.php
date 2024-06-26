<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::where('email', 'admin@gmail.com')->delete();
        User::where('email', 'kaprodi@gmail.com')->delete();
        User::where('email', 'mahasiswa1@gmail.com')->delete();

        $admins = [
            [
                'name' => 'Rahel Natasya',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('adminmr'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Josua Jawak',
                'email' => 'kaprodi@gmail.com',
                'password' => Hash::make('kaprodi123'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Mahasiswa 1',
                'email' => 'mahasiswa1@gmail.com',
                'password' => Hash::make('mahasiswa123'),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];
                User::insert($admins);

    }
}
