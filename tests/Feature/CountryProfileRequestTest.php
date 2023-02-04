<?php

declare(strict_types=1);

use GuzzleHttp\Psr7\Response;
use JoeBocock\ChessApi\Entities\CountryProfile;
use Tests\Factories\CountryProfileFactory;

it('fetches a country profile', function () {
    /** @var CountryProfile */
    $countryProfile = make(CountryProfileFactory::class);

    $chess = mockClient([
        new Response(body: json_encode($countryProfile->toArray())),
    ]);

    expect($chess->countryProfile($countryProfile->code))
        ->toEqual($countryProfile);
});
