<?php

declare(strict_types=1);

namespace JoeBocock\ChessApi\Interfaces;

interface Arrayable
{
    /**
     * @return array<mixed, mixed>
     */
    public function toArray(): array;
}
