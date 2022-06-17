<?php

namespace Database\Factories;

use Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProdiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $prodi = ['Akuntansi', 'Akuntansi Publik', 'Mekatronika', 'Teknologi Elektronika', 'Teknologi Informasi'];
        return [
            'prodi' => Arr::random($prodi),
        ];
    }
}
