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
        new Response(500),
    ]);

    $chess->send(new MockRequest());
})->throws(ChessResponseException::class);

it('handles 404s and returns null', function () {
    $chess = mockClient([
        new Response(404),
    ]);

    expect($chess->send(new MockRequest()))->toBeNull();
});
