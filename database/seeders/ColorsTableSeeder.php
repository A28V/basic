<?php

namespace Database\Seeders;
use App\Models\Color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Color::create(['name' => 'Red']);
        Color::create(['name' => 'Green']);
        Color::create(['name' => 'Blue']);
        // Add more colors as needed
    }
}
