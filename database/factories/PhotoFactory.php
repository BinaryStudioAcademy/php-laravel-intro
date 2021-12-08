<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PhotoFactory extends Factory
{

    public function definition()
    {
        return [
            'format' => 'jpg',
            'path' => Str::random(),
        ];
    }
}
