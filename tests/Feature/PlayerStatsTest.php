<?php

declare(strict_types=1);

use GuzzleHttp\Psr7\Response;
use JoeBocock\ChessApi\Entities\PlayerProfile;
use Tests\Factories\PlayerProfileFactory;
use Tests\Factories\PlayerStatsFactory;

it('fetches players by string or player profile', function () {
    /** @var PlayerProfile */
    $playerProfile = (new PlayerProfileFactory())->make();
    $playerStats = (new PlayerStatsFactory())->make();

    $chess = mockClient([
        new Response(body: json_encode($playerStats->toArray())),
        new Response(body: json_encode($playerStats->toArray())),
    ]);

    expect($chess->playerStats($playerProfile->username))
        ->toEqual($playerStats);

    expect($chess->playerStats($playerProfile))
        ->toEqual($playerStats);
});
