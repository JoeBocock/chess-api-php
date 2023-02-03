<?php

declare(strict_types=1);

namespace JoeBocock\ChessApi;

use GuzzleHttp\Client;
use JoeBocock\ChessApi\Entities\PlayerProfile;
use JoeBocock\ChessApi\Exceptions\ChessRequestException;
use JoeBocock\ChessApi\Exceptions\ChessResponseException;
use JoeBocock\ChessApi\Requests\PlayerProfileRequest;
use JoeBocock\ChessApi\Requests\Request;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Client\NetworkExceptionInterface;
use Psr\Http\Client\RequestExceptionInterface;

class Chess
{
    public function __construct(private ClientInterface $client = new Client())
    {
    }

    public function send(Request $request): mixed
    {
        try {
            $response = $this->client->sendRequest($request);
        } catch (ClientExceptionInterface|RequestExceptionInterface|NetworkExceptionInterface $e) {
            throw new ChessRequestException($e->getMessage(), $e->getCode(), $e);
        }

        $code = $response->getStatusCode();

        if ($code < 200 || $code >= 300) {
            throw new ChessResponseException("Chess.com responded with a non-200 ({$code}) status code.", $code);
        }

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
