<?php

declare(strict_types=1);

use GuzzleHttp\Psr7\Response;
use JoeBocock\ChessApi\Entities\PlayerProfile;
use Tests\Factories\PlayerProfileFactory;

it('fetches a players profile', function () {
    $playerProfile = make(PlayerProfileFactory::class);

    $chess = mockClient([
        new Response(body: json_encode($playerProfile->toArray())),
    ]);

    expect($response = $chess->playerProfile('username'))
        ->toBeInstanceOf(PlayerProfile::class);

    expect($response)->toEqual($playerProfile);
});
