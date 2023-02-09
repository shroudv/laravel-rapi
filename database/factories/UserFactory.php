<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->name,
            'about'=>$this->faker->text,
            'email'=>$this->faker->email,
            'password'=>$this->faker->password,
            'address'=>$this->faker->address,
            'phone'=>$this->faker->phoneNumber,
            'map'=>$this->faker->url,
            'category'=>1,
        ];
    }
}
