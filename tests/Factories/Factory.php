<?php

declare(strict_types=1);

namespace Tests\Factories;

use Faker\Factory as FakerFactory;
use Faker\Generator;
use JoeBocock\ChessApi\Entities\Entity;

abstract class Factory
{
    public Generator $faker;

    public function __construct()
    {
        $this->faker = FakerFactory::create();
    }

    public function make(int $count = 1): array|Entity
    {
        $i = 0;
        $items = [];

        while ($i++ < $count) {
            $items[] = $this->definition();
        }

        return $count === 1 ? array_pop($items) : $items;
    }

    abstract public function definition(): mixed;
}
