<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DentistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dentists')->insert([
            'utilisateur_id' => 2,
            'speciality' => 'Orthodontist',
            'available_slots' => json_encode(['{
    "days": [
        "Lundi",
        "Mardi",
        "Mercredi",
        "Jeudi",
        "Vendredi"
    ],
    "end_time": "17:30",
    "break_end": "13:30",
    "start_time": "09:00",
    "break_start": "12:00",
    "appointment_duration": "45"
}']),
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
