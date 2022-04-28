<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gender = ['pria', 'wanita'];
        $study_program = ['TI', 'AK', 'AKP', 'MK', 'EK'];

        return [
            'user_id' => rand(1, 5),
            'address' => $this->faker->address(),
            'date_of_birth' => date('d-m-Y'),
            'gender' => Arr::random($gender),
            'phone_number' =>  $this->faker->phoneNumber(),
            'grade' => '3',
            'study_program' => Arr::random($study_program),

        ];
    }
}
