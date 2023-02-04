<?php

declare(strict_types=1);

namespace Tests;

use JoeBocock\ChessApi\Entities\Entity;

class MockEntity extends Entity
{
    public function toArray(): array
    {
        return [];
    }
}
