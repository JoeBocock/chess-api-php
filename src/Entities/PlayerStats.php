<?php

declare(strict_types=1);

namespace JoeBocock\ChessApi\Entities;

class PlayerStats extends Entity
{
    /**
     * @param array<string, array<string, mixed>>|null $chessDaily
     * @param array<string, array<string, mixed>>|null $chess960Daily
     * @param array<string, array<string, mixed>>|null $chessRapid
     * @param array<string, array<string, mixed>>|null $chessBullet
     * @param array<string, array<string, mixed>>|null $chessBlitz
     * @param array<string, array<string, mixed>>|null $tactics
     * @param array<string, array<string, mixed>>|null $lessons
     * @param array<string, array<string, mixed>>|null $puzzleRush
     */
    public function __construct(
        public int|null $fide,
        public array|null $chessDaily,
        public array|null $chess960Daily,
        public array|null $chessRapid,
        public array|null $chessBullet,
        public array|null $chessBlitz,
        public array|null $tactics,
        public array|null $lessons,
        public array|null $puzzleRush,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'fide' => $this->fide,
            'chess_daily' => $this->chessDaily,
            'chess960_daily' => $this->chess960Daily,
            'chess_rapid' => $this->chessRapid,
            'chess_bullet' => $this->chessBullet,
            'chess_blitz' => $this->chessBlitz,
            'tactics' => $this->tactics,
            'lessons' => $this->lessons,
            'puzzle_rush' => $this->puzzleRush,
        ];
    }
}
