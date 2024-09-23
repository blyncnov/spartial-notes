<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Note>
 */
class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'n_title' => $this->faker->sentence(),
            'n_content' => $this->faker->paragraph(),
            'n_passkey' => $this->faker->bothify('???###'),
            'n_description' => $this->faker->sentence(),
            'n_geolocation'=> $this->faker->address(),
            'n_latitude' => $this->faker->latitude(),
            'n_longitude' => $this->faker->longitude(),
            'n_visibility' => $this->faker->randomElement(['private', 'public']),
            'n_label' => $this->faker->randomElement(['simple', 'urgent']),
            'user_id' => User::factory(),
        ];
    }
}
