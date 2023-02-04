<?php

declare(strict_types=1);

namespace Tests\Factories;

use JoeBocock\ChessApi\Entities\CountryProfile;

class CountryProfileFactory extends Factory
{
    public function definition(): CountryProfile
    {
        return new CountryProfile(
            $this->faker->url,
            strtoupper($this->faker->lexify('##')),
            $this->faker->word,
        );
    }
}
