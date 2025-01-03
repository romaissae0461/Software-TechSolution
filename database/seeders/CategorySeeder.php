<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Development Tools', 'Production', 'Utilities', 'Business/Enterprise', 
            'Design and Creativity', 'Gaming', 'Security', 'Media and Communication', 
            'Scientific and Engineering', 'Healthcare', 'Cloud/Virtualization'];
        foreach ($categories as $category){
            Category::create(['name' => $category]);
        }
    }
}
