<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            AdminsTableSeeder::class,
            DentistsTableSeeder::class,
            PatientsTableSeeder::class,
            CategoriesTableSeeder::class,
            ContentsTableSeeder::class,
            AppointmentsTableSeeder::class,
            NotificationsTableSeeder::class,
            TreatmentSeeder::class,

        ]);
    }
}
