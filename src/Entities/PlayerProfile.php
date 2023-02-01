<?php

declare(strict_types=1);

namespace JoeBocock\ChessApi\Entities;

class PlayerProfile implements Entity
{
    public function __construct(
        public string $avatar,
        public int $playerId,
        public string $id,
        public string $url,
        public string|null $name,
        public string $username,
        public string|null $title,
        public int $followers,
        public string $country,
        public string|null $location,
        public int $lastOnline,
        public int $joined,
        public string $status,
        public bool $isStreamer,
        public string|null $twitchUrl,
        public bool $verified,
        public string|null $league,
    ) {
    }
}
