<?php

declare(strict_types=1);

use GuzzleHttp\Psr7\Response;
use JoeBocock\ChessApi\ChessApi;
use JoeBocock\ChessApi\Entities\PlayerProfile;

it('fetches a player profile', function () {
    $api = new ChessApi(mockClient([
        new Response(body: file_get_contents('./tests/fixtures/PlayerProfileResponse.json', true)),
    ]));

    expect($api->playerProfile('joesyntax'))
        ->toBeInstanceOf(PlayerProfile::class);
});
