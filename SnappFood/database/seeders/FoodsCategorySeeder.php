<?php

namespace Database\Seeders;

use App\Models\FoodsCatgory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FoodsCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FoodsCatgory::create([
            'name' => 'kebab',
            'slug' => 'kebab',
            'icon' => "2"
        ]);
        FoodsCatgory::create([
            'name' => 'sandewich',
            'slug' => 'sandewich',
            'icon' => "2"
        ]);
        FoodsCatgory::create([
            'name' => 'pizza',
            'slug' => 'pizza',
            'icon' => "2"
        ]);
        FoodsCatgory::create([
            'name' => 'spageti',
            'slug' => 'spageti',
            'icon' => "2"
        ]);
        FoodsCatgory::create([
            'name' => 'sokhari',
            'slug' => 'sokhari',
            'icon' => "2"
        ]);
    }
}
