<?php

declare(strict_types=1);

use GuzzleHttp\Psr7\Response;
use JoeBocock\ChessApi\Entities\Streamer;
use Tests\Factories\StreamerFactory;

it('fetches a list of streamers', function () {
    /** @var array<int, Streamer> */
    $streamers = make(
        StreamerFactory::class,
        StreamerFactory::class,
        StreamerFactory::class,
    );

    $responseData = [];

    foreach ($streamers as $streamer) {
        $responseData[] = $streamer->toArray();
    }

    $chess = mockClient([
        new Response(body: json_encode($responseData)),
    ]);

    expect($chess->streamers())->toEqual($streamers);
});
