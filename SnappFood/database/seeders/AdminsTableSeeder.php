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
        if(config('admin.admin_name')) {
            Admin::firstOrCreate(
                ['email' => config('admin.admin_email')], [
                    'name' => config('admin.admin_name'),
                    'phone' => config('admin.admin_phone'),
                    'password' => bcrypt(config('admin.admin_password')),
                ]
            );
        }    }
}
