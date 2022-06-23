<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Seeder;

class ColorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Color::insert([
            [
                'name' => 'Blue'
            ],
            [
                'name' => 'Black'
            ],
            [
                'name' => 'White'
            ],
            [
                'name' => 'Red'
            ],
            [
                'name' => 'Green'
            ],
        ]);
    }
}
