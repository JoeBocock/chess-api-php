<?php

declare(strict_types=1);

namespace JoeBocock\ChessApi\Entities;

class Streamer extends Entity
{
    public function __construct(
        public string $username,
        public string $avatar,
        public ?string $twitchUrl,
        public string $url,
        public bool $isLive,
        public bool $isCommunityStreamer,
    ) {
    }

    public function toArray(): array
    {
        return [
            'username' => $this->username,
            'avatar' => $this->avatar,
            'twitch_url' => $this->twitchUrl,
            'url' => $this->url,
            'is_live' => $this->isLive,
            'is_community_streamer' => $this->isCommunityStreamer,
        ];
    }
}
