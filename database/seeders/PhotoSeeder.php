<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PhotoSeeder extends Seeder
{

    public function run()
    {
        \App\Models\Photo::factory(10)->create();
    }
}
