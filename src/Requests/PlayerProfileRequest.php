<?php

declare(strict_types=1);

namespace JoeBocock\ChessApi\Requests;

use GuzzleHttp\Psr7\Uri;
use JoeBocock\ChessApi\Entities\PlayerProfile;
use Psr\Http\Message\UriInterface;

class PlayerProfileRequest extends Request
{
    /**
     * @var string
     */
    public const URI = '/player/{username}';

    public string $username;

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getUri(): UriInterface
    {
        return new Uri($this->requestUrl([
            'username' => $this->username,
        ]));
    }

    public function hydrate(array $body, ?array $headers = null): PlayerProfile
    {
        return new PlayerProfile(
            $body['avatar'],
            $body['player_id'],
            $body['@id'],
            $body['url'],
            $body['name'] ?? null,
            $body['username'],
            $body['title'] ?? null,
            $body['followers'],
            $body['country'],
            $body['location'] ?? null,
            $body['last_online'],
            $body['joined'],
            $body['status'],
            $body['is_streamer'],
            $body['twitch_url'] ?? null,
            $body['verified'],
            $body['league'] ?? null,
        );
    }
}
