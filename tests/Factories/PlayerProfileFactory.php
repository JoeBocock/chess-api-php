<?php

declare(strict_types=1);

namespace Tests\Factories;

use JoeBocock\ChessApi\Entities\PlayerProfile;

class PlayerProfileFactory extends Factory
{
    public function definition(): PlayerProfile
    {
        return new PlayerProfile(
            $this->faker->url,
            $this->faker->randomNumber(),
            $this->faker->url,
            $this->faker->url,
            $this->faker->randomElement([$this->faker->name, null]),
            $this->faker->name,
            $this->faker->randomElement([$this->faker->title, null]),
            $this->faker->randomNumber(),
            $this->faker->url,
            $this->faker->randomElement([$this->faker->city, null]),
            $this->faker->randomNumber(),
            $this->faker->randomNumber(),
            $this->faker->randomElement(['basic', 'premium']),
            $this->faker->boolean,
            $this->faker->randomElement([$this->faker->url, null]),
            $this->faker->boolean,
            $this->faker->randomElement([$this->faker->word, null]),
        );
    }
}
