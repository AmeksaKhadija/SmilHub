<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PatientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('patients')->insert([
            'utilisateur_id' => 3,
            'medical_history' => json_encode(['Diabetes', 'High blood pressure']),
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
