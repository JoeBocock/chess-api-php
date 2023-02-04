<?php

declare(strict_types=1);

namespace Tests\Factories;

use JoeBocock\ChessApi\Entities\PlayerStats;

class PlayerStatsFactory extends Factory
{
    public function definition(): PlayerStats
    {
        return new PlayerStats(
            $this->faker->randomElement([$this->faker->randomNumber(), null]),
            $this->faker->randomElement([[$this->faker->word => []], null]),
            $this->faker->randomElement([[$this->faker->word => []], null]),
            $this->faker->randomElement([[$this->faker->word => []], null]),
            $this->faker->randomElement([[$this->faker->word => []], null]),
            $this->faker->randomElement([[$this->faker->word => []], null]),
            $this->faker->randomElement([[$this->faker->word => []], null]),
            $this->faker->randomElement([[$this->faker->word => []], null]),
            $this->faker->randomElement([[$this->faker->word => []], null]),
        );
    }
}
