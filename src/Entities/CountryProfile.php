<?php

declare(strict_types=1);

namespace JoeBocock\ChessApi\Entities;

class CountryProfile extends Entity
{
    public function __construct(
        public string $id,
        public string $code,
        public string $name,
    ) {
    }

    /**
     * @return array<string, string>
     */
    public function toArray(): array
    {
        return [
            '@id' => $this->id,
            'code' => $this->code,
            'name' => $this->name,
        ];
    }
}
