<?php

declare(strict_types=1);

namespace JoeBocock\ChessApi\Enums;

enum GameResultCode: string
{
    case WIN = 'win';
    case CHECKMATED = 'checkmated';
    case AGREED = 'agreed';
    case REPETITION = 'repetition';
    case TIMEOUT = 'timeout';
    case RESIGNED = 'resigned';
    case STALEMATE = 'stalemate';
    case LOSE = 'lose';
    case INSUFFICIENT = 'insufficient';
    case FIFTY_MOVE = '50move';
    case ABANDONED = 'abandoned';
    case KING_OF_THE_HILL = 'kingofthehill';
    case THREE_CHECK = 'threecheck';
    case TIME_VS_INSUFFICIENT = 'timevsinsufficient';
    case BUGHOUSE_PARTNER_LOSE = 'bughousepartnerlose';

    public function readable(): string
    {
        return match ($this) {
            self::WIN => 'Win',
            self::CHECKMATED => 'Checkmated',
            self::AGREED => 'Draw agreed',
            self::REPETITION => 'Draw by repetition',
            self::TIMEOUT => 'Timeout',
            self::RESIGNED => 'Resigned',
            self::STALEMATE => 'Stalemate',
            self::LOSE => 'Lose',
            self::INSUFFICIENT => 'Insufficient material',
            self::FIFTY_MOVE => 'Draw by 50-move rule',
            self::ABANDONED => 'Abandoned',
            self::KING_OF_THE_HILL => 'Opponent king reached the hill',
            self::THREE_CHECK => 'Checked for the 3rd time',
            self::TIME_VS_INSUFFICIENT => 'Draw by timeout vs insufficient material',
            self::BUGHOUSE_PARTNER_LOSE => 'Bughouse partner lost',
        };
    }
}
