<?php

declare(strict_types=1);

namespace JoeBocock\ChessApi\Requests;

use JoeBocock\ChessApi\Entities\PlayerStats;

class PlayerStatsRequest extends Request
{
    /**
     * @var string
     */
    public const URI = '/player/{username}/stats';

    public string $username;

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getRequestParameters(): array
    {
        return [
            'username' => $this->username,
        ];
    }

    public function hydrate(array $body, ?array $headers = null): PlayerStats
    {
        return new PlayerStats(
            $body['fide'] ?? null,
            $body['chess_daily'] ?? null,
            $body['chess960_daily'] ?? null,
            $body['chess_rapid'] ?? null,
            $body['chess_bullet'] ?? null,
            $body['chess_blitz'] ?? null,
            $body['tactics'] ?? null,
            $body['lessons'] ?? null,
            $body['puzzle_rush'] ?? null,
        );
    }
}
