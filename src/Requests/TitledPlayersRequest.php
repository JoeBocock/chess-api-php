<?php

declare(strict_types=1);

namespace JoeBocock\ChessApi\Requests;

class TitledPlayersRequest extends Request
{
    /**
     * @var string
     */
    public const URI = '/titled/{title}';

    public string $title;

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getRequestParameters(): array
    {
        return [
            'title' => $this->title,
        ];
    }

    /**
     * @param array<string, string> $body
     *
     * @return array<string, string>
     */
    public function hydrate(array $body, ?array $headers = null): array
    {
        return $body;
    }
}
