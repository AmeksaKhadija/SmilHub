<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contents')->insert([
            [
                'title' => 'Comment bien se brosser les dents',
                'type' => 'article',
                'content' => 'Un bon brossage dure au moins deux minutes...',
                'categorie_id' => 1,
                'dentist_id' => 1,
                'image' => 'image.png',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
