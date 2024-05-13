<?php

namespace Database\Seeders;
use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SizesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Size::create(['name' => 's']);
        Size::create(['name' => 'm']);
        Size::create(['name' => 'l']);
    }
}
