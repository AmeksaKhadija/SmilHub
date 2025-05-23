<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Prevention',
                'description_courte' => 'Conseils pour éviter les maladies dentaires',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Traitement',
                'description_courte' => 'Solutions aux problèmes dentaires',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
