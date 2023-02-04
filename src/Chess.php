<?php

declare(strict_types=1);

namespace JoeBocock\ChessApi;

use JoeBocock\ChessApi\Entities\CountryProfile;
use JoeBocock\ChessApi\Entities\PlayerProfile;
use JoeBocock\ChessApi\Entities\PlayerStats;
use JoeBocock\ChessApi\Enums\PlayerTitle;
use JoeBocock\ChessApi\Requests\CountryProfileRequest;
use JoeBocock\ChessApi\Requests\PlayerProfileRequest;
use JoeBocock\ChessApi\Requests\PlayerStatsRequest;
use JoeBocock\ChessApi\Requests\TitledPlayersRequest;

class Chess extends Client
{
    /**
     * Fetch a players profile.
     *
     * @param string $username The username of the player
     *
     * @return PlayerProfile|null Will return null if no player is found
     */
    public function playerProfile(string $username): PlayerProfile|null
    {
        return $this->send(
            (new PlayerProfileRequest())->setUsername($username)
        );
    }

    /**
     * Fetch an array of player usernames by title.
     *
     * @param PlayerTitle|string $title Must be one of PlayerTitle::cases()
     *
     * @return array<int, string>|null
     */
    public function titledPlayers(PlayerTitle|string $title): array|null
    {
        if (is_string($title)) {
            if (! $title = PlayerTitle::tryFrom($title)) {
                throw new \InvalidArgumentException('Invalid player title');
            }
        }

        return $this->send(
            (new TitledPlayersRequest())->setTitle($title->value)
        );
    }

    /**
     * Fetch an array of player usernames by title.
     *
     * @param PlayerProfile|string $username The username of the player or an instance of PlayerProfile
     *
     * @return PlayerStats|null Will return null if no player is found
     */
    public function playerStats(PlayerProfile|string $username): PlayerStats|null
    {
        if ($username instanceof PlayerProfile) {
            $username = $username->username;
        }

        return $this->send(
            (new PlayerStatsRequest())->setUsername($username)
        );
    }

    /**
     * Fetch details about a specific country.
     *
     * @param string $country a two character ISO 3166 code
     */
    public function countryProfile(string $country): CountryProfile|null
    {
        return $this->send(
            (new CountryProfileRequest())->setCountry(strtoupper($country))
        );
    }
}
