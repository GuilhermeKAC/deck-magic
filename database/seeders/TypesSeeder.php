<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::insert([
            [
                'name' => 'Crature',
            ],
            [
                'name' => 'Instant',
            ],
            [
                'name' => 'Basic Land',
            ],
        ]);
    }
}
