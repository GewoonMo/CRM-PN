<?php

namespace Database\Factories;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    protected $model = Profile::class;

    public function definition()
    {
        return [
            'user_id' => function () {
                return User::factory()->create()->id;
            },
            'UserName' => $this->faker->name,
            'profile_photo' => 'default.jpg',
            'biography' => $this->faker->jobTitle,
            'experience' => $this->faker->text,
            'education' => $this->faker->text,
            'skills' => $this->faker->realText,
            'visibility' => $this->faker->boolean,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
