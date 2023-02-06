<?php

declare(strict_types=1);

namespace Tests\Factories;

use JoeBocock\ChessApi\Entities\Streamer;

class StreamerFactory extends Factory
{
    public function definition(): Streamer
    {
        return new Streamer(
            $this->faker->userName,
            $this->faker->url,
            $this->faker->randomElement([$this->faker->url, null]),
            $this->faker->url,
            $this->faker->boolean,
            $this->faker->boolean
        );
    }
}
