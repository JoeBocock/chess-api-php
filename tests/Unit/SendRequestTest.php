<?php

declare(strict_types=1);

use GuzzleHttp\Exception\InvalidArgumentException;
use GuzzleHttp\Psr7\Response;
use JoeBocock\ChessApi\Exceptions\ChessRequestException;
use JoeBocock\ChessApi\Exceptions\ChessResponseException;
use Tests\MockRequest;

it('handles psr client exceptions', function () {
    $chess = mockClient([
        new InvalidArgumentException(),
    ]);

    $chess->send(new MockRequest());
})->throws(ChessRequestException::class);

it('handles non-200 response', function () {
    $chess = mockClient([
        new Response(404),
    ]);

    $chess->send(new MockRequest());
})->throws(ChessResponseException::class);
