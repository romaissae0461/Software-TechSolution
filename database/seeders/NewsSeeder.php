<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('ALTER TABLE news AUTO_INCREMENT = 1;');
        DB::table('news')->insert([
            [
                'titre'=>'Maintenance système',
                'contenu'=>'maintenance programmée pour le 1er janvier',
                'views'=>0,
                'created_at'=>Carbon::now(),
            ],
            [
                'titre'=>'Mise à jour',
                'contenu'=>'mise à jour interrompues',
                'views'=>0,
                'created_at'=>Carbon::now(),
            ],
        ]);
    }
}
