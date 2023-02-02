<?php

declare(strict_types=1);

namespace JoeBocock\ChessApi;

use GuzzleHttp\Client;
use JoeBocock\ChessApi\Entities\PlayerProfile;
use JoeBocock\ChessApi\Requests\PlayerProfileRequest;
use JoeBocock\ChessApi\Requests\Request;
use Psr\Http\Client\ClientInterface;

class Chess
{
    public function __construct(private ClientInterface $client = new Client())
    {
    }

    public function send(Request $request): mixed
    {
        $response = $this->client->sendRequest($request);

        return $request->hydrate(
            json_decode($response->getBody()->getContents(), true) ?? [],
            $response->getHeaders()
        );
    }

    public function playerProfile(string $username): PlayerProfile|null
    {
        return $this->send(
            (new PlayerProfileRequest())->setUsername($username)
        );
    }
}
