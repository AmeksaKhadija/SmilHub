<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'nom' => 'Admin',
                'prenom' => 'User',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'phone' => '0600000001',
                'role' => 'admin',
                'status' => 'active',
                'image' => 'admin.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nom' => 'Dentist',
                'prenom' => 'Doe',
                'email' => 'dentist@example.com',
                'password' => Hash::make('password'),
                'phone' => '0600000002',
                'role' => 'dentiste',
                'status' => 'active',
                'image' => 'dentist.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nom' => 'Patient',
                'prenom' => 'Jane',
                'email' => 'patient@example.com',
                'password' => Hash::make('password'),
                'phone' => '0600000003',
                'role' => 'patient',
                'status' => 'active',
                'image' => 'patient.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
