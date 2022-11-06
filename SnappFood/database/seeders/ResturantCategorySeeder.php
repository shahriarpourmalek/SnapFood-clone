<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResturantCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
Category::create([
   'name' => 'fastfood',
   'slug' => 'fastfood',
   'icon' => '2',

]);
        Category::create([
            'name' => 'sonati',
            'slug' => 'sonati',
            'icon' => '2',

        ]);
        Category::create([
            'name' => 'ashkade',
            'slug' => 'ashkade',
            'icon' => '2',

        ]);
        Category::create([
            'name' => 'sokhari',
            'slug' => 'sokhari',
            'icon' => '2',

        ]);
    }
}
