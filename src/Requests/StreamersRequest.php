<?php

declare(strict_types=1);

namespace JoeBocock\ChessApi\Requests;

use JoeBocock\ChessApi\Entities\Streamer;

class StreamersRequest extends Request
{
    /**
     * @var string
     */
    public const URI = '/streamers';

    /**
     * @param array<string, array<string, mixed>> $body
     *
     * @return array<int, Streamer>
     */
    public function hydrate(array $body, ?array $headers = null): array
    {
        $streamers = [];

        foreach ($body as $streamer) {
            $streamers[] = new Streamer(
                $streamer['username'],
                $streamer['avatar'],
                $streamer['twitch_url'],
                $streamer['url'],
                $streamer['is_live'],
                $streamer['is_community_streamer'],
            );
        }

        return $streamers;
    }
}
