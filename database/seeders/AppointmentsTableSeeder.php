<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppointmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('appointments')->insert([
            'patient_id' => 1,
            'dentist_id' => 1,
            'date' => '2025-04-22 09:00:00',
            'status' => 'confirmed',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
