<?php

declare(strict_types=1);

namespace JoeBocock\ChessApi\Entities;

class PlayerProfile extends Entity
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

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'avatar' => $this->avatar,
            'player_id' => $this->playerId,
            '@id' => $this->id,
            'url' => $this->url,
            'name' => $this->name,
            'username' => $this->username,
            'title' => $this->title,
            'followers' => $this->followers,
            'country' => $this->country,
            'location' => $this->location,
            'last_online' => $this->lastOnline,
            'joined' => $this->joined,
            'status' => $this->status,
            'is_streamer' => $this->isStreamer,
            'twitch_url' => $this->twitchUrl,
            'verified' => $this->verified,
            'league' => $this->league,
        ];
    }
}
