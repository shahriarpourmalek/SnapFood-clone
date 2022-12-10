<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'hamid shali' ,
            'email' => 'hamid@gmail.com',
            'password' =>bcrypt('12345678'),
            'phone' => '09361112233'
        ]);
        $user = User::create([
            'name' => 'shahriar dadash' ,
            'email' => 'shahriar@gmail.com',
            'password' => bcrypt('12345678'),
            'phone' => '09362223344'
        ]);
        $user = User::create([
            'name' => 'saied aqa' ,
            'email' => 'saeid@gmail.com',
            'password' => bcrypt('12345678'),
            'phone' => '09363334455'
        ]);
    }
}
