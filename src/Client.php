<?php

declare(strict_types=1);

namespace JoeBocock\ChessApi;

use GuzzleHttp\Client as GuzzleClient;
use JoeBocock\ChessApi\Exceptions\ChessRequestException;
use JoeBocock\ChessApi\Exceptions\ChessResponseException;
use JoeBocock\ChessApi\Requests\Request;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Client\NetworkExceptionInterface;
use Psr\Http\Client\RequestExceptionInterface;

abstract class Client
{
    public function __construct(private ClientInterface $client = new GuzzleClient())
    {
    }

    /**
     * Send a PSR-7 backed request and hydrate related entities.
     *
     * @param Request $request the request you wish to send
     *
     * @throws ChessRequestException
     * @throws ChessResponseException
     */
    public function send(Request $request): mixed
    {
        try {
            $response = $this->client->sendRequest($request);
        } catch (ClientExceptionInterface|RequestExceptionInterface|NetworkExceptionInterface $e) {
            throw new ChessRequestException($e->getMessage(), $e->getCode(), $e);
        }

        if (($code = $response->getStatusCode()) === 404) {
            return null;
        }

        if ($code < 200 || $code >= 300) {
            throw new ChessResponseException("Chess.com responded with a non-200 ({$code}) status code.", $code);
        }

        return $request->hydrate(
            json_decode($response->getBody()->getContents(), true) ?? [],
            $response->getHeaders()
        );
    }
}
