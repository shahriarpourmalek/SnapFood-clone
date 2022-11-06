<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Manager;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Admin::firstOrCreate(
            ['email' => 'shahriar.purmalek@gmail.com'], [
                'name' => 'shahriar pourmalek',
                'phone' => '09365515927',
                'password' => bcrypt('12345678'),
            ]
        );
    }
}
