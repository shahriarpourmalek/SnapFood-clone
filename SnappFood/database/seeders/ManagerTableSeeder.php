<?php

namespace Database\Seeders;

use App\Models\Manager;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ManagerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Manager::create([
            'name' => 'alireza',
            'email' => 'alireza@gmail.com',
            'phone' => '09192418754',
            'password' => bcrypt('12345678'),
        ]);
        Manager::create([
            'name' => 'shahriar',
            'email' => 'shahriar.purmalek@gmail.com',
            'phone' => '09365515927',
            'password' => bcrypt('12345678'),
        ]);
        Manager::create([
            'name' => 'sina',
            'email' => 'sina@gmail.com',
            'phone' => '09127845623',
            'password' => bcrypt('12345678'),
        ]);
        Manager::create([
            'name' => 'morteza',
            'email' => 'morteza@gmail.com',
            'phone' => '09122435623',
            'password' => bcrypt('12345678'),
        ]);
    }
}
