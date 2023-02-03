<?php

declare(strict_types=1);

use GuzzleHttp\Psr7\Response;
use JoeBocock\ChessApi\Entities\PlayerProfile;

it('fetches a players profile', function () {
    $chess = mockClient([
        new Response(body: file_get_contents('./tests/Fixtures/PlayerProfileResponse.json', true)),
    ]);

    expect($chess->playerProfile('username'))
        ->toBeInstanceOf(PlayerProfile::class);
});
