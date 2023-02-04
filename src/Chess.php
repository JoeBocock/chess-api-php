<?php

declare(strict_types=1);

namespace JoeBocock\ChessApi;

use JoeBocock\ChessApi\Entities\PlayerProfile;
use JoeBocock\ChessApi\Enums\PlayerTitle;
use JoeBocock\ChessApi\Requests\PlayerProfileRequest;
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
        if (! in_array($title, array_column(PlayerTitle::cases(), 'value'))) {
            throw new \InvalidArgumentException('Invalid player title');
        }

        return $this->send(
            (new TitledPlayersRequest())->setTitle($title)
        );
    }
}
