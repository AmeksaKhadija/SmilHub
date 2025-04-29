<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Treatment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TreatmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $appointments = Appointment::all();

        foreach ($appointments as $appointment) {
            Treatment::create([
                'appointment_id' => $appointment->id,
                'description' => 'Traitement pour le rendez-vous ' . $appointment->id,
                'medications' => 'Paracétamol 500mg',
            ]);
        }
    }
}
