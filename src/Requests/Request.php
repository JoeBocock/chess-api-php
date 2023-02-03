<?php

declare(strict_types=1);

namespace JoeBocock\ChessApi\Requests;

use GuzzleHttp\Psr7\Request as Psr7Request;
use GuzzleHttp\Psr7\Uri;
use JoeBocock\ChessApi\Enums\RequestMethod;
use Psr\Http\Message\UriInterface;

abstract class Request extends Psr7Request
{
    /**
     * @var RequestMethod
     */
    public const METHOD = RequestMethod::GET;

    /**
     * @var string
     */
    public const URI = '';

    /**
     * @var string
     */
    public const BASE_URI = 'https://api.chess.com/pub';

    public function __construct()
    {
        parent::__construct(static::METHOD->value, static::BASE_URI . static::URI);
    }

    public function getUri(): UriInterface
    {
        return new Uri($this->requestUrl(
            $this->getRequestParameters()
        ));
    }

    /**
     * @return array<string, mixed>
     */
    public function getRequestParameters(): array
    {
        return [];
    }

    /**
     * @param array<string, string> $uriParameters
     */
    public function requestUrl(array $uriParameters): string
    {
        return self::BASE_URI . str_replace(
            array_map(fn ($key) => "{{$key}}", array_keys($uriParameters)),
            $uriParameters,
            static::URI
        );
    }

    /**
     * Hydrate PHP objects with the response data of a request.
     *
     * @param array<mixed, mixed>      $body
     * @param array<mixed, mixed>|null $headers
     */
    abstract public function hydrate(array $body, ?array $headers = null): mixed;
}
