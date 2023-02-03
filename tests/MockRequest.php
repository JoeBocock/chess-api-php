<?php

declare(strict_types=1);

namespace Tests;

use JoeBocock\ChessApi\Requests\Request;

class MockRequest extends Request
{
    public function hydrate(array $body, ?array $headers = null): MockEntity
    {
        return new MockEntity();
    }
}
