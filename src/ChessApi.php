<?php

declare(strict_types=1);

namespace JoeBocock\ChessApi;

use GuzzleHttp\Client;
use JoeBocock\ChessApi\Entities\PlayerProfile;
use JoeBocock\ChessApi\Requests\PlayerProfileRequest;
use JoeBocock\ChessApi\Requests\Request;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\ResponseInterface;

class ChessApi
{
    public function __construct(private ClientInterface $client = new Client())
    {
    }

    /**
     * Send a request and receive a hydrated object response.
     */
    private function send(Request $request): ResponseInterface
    {
        return $this->client->sendRequest($request);
    }

    private function finalise(Request $request, ResponseInterface $response): mixed
    {
        return $request->hydrate(
            json_decode($response->getBody()->getContents(), true) ?? [],
            $response->getHeaders()
        );
    }

    public function playerProfile(string $username): PlayerProfile|null
    {
        $request = new PlayerProfileRequest();

        return $this->finalise($request, $this->send($request->setUsername($username)));
    }
}
