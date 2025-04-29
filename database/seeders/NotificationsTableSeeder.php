<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('notifications')->insert([
            'utilisateur_id' => 3,
            'type' => 'appointment',
            'message' => 'Votre rendez-vous est confirmé',
            'read' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
