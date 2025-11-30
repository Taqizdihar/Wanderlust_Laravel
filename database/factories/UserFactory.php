<?php
{
    return [
        'name' => $this->faker->name(),
        'email' => $this->faker->unique()->safeEmail(),
        'password' => bcrypt('password'),
        'status' => $this->faker->randomElement(['aktif', 'nonaktif']),
        'role' => 'wisatawan'
    ];
}
