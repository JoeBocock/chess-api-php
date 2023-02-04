<?php

declare(strict_types=1);

namespace JoeBocock\ChessApi\Requests;

use JoeBocock\ChessApi\Entities\CountryProfile;

class CountryProfileRequest extends Request
{
    /**
     * @var string
     */
    public const URI = '/country/{country}';

    public string $country;

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getRequestParameters(): array
    {
        return [
            'country' => $this->country,
        ];
    }

    /**
     * @param array<string, string> $body
     */
    public function hydrate(array $body, ?array $headers = null): CountryProfile
    {
        return new CountryProfile(
            $body['@id'],
            $body['code'],
            $body['name'],
        );
    }
}
