<?php

declare(strict_types=1);

use GuzzleHttp\Psr7\Response;
use JoeBocock\ChessApi\Chess;

use function Pest\Faker\faker;

it('fetches players by title', function () {
    $names = [faker()->name, faker()->name, faker()->name];

    $chess = mockClient([
        new Response(body: json_encode($names)),
    ]);

    expect($chess->titledPlayers('GM'))
        ->toEqual($names);
});

it('requires a valid title', function () {
    (new Chess())->titledPlayers('not-a-title');
})->expectException(InvalidArgumentException::class);
