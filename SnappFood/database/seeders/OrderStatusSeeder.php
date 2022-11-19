<?php

namespace Database\Seeders;

use App\Models\OrderStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrderStatus::create([
            'name' => 'pending'
        ]);
        OrderStatus::create([
            'name' => 'preparing'
        ]);
        OrderStatus::create([
            'name' => 'delivering'
        ]);
        OrderStatus::create([
            'name' => 'takenOver'
        ]);
    }
}
