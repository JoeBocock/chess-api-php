<?php

declare(strict_types=1);

use GuzzleHttp\Psr7\Response;
use JoeBocock\ChessApi\Chess;
use JoeBocock\ChessApi\Entities\PlayerProfile;

it('fetches a players profile', function () {
    $chess = new Chess(mockClient([
        new Response(body: file_get_contents('./tests/fixtures/PlayerProfileResponse.json', true)),
    ]));

    expect($chess->playerProfile('username'))
        ->toBeInstanceOf(PlayerProfile::class);
});
