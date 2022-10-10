<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            "name" => "Admin Boat",
            "email" => "thiraphat@admin.com",
            "password" => Hash::make("thiraphat1234")
        ];
    }
}
