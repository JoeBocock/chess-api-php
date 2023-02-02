<?php

declare(strict_types=1);

use JoeBocock\ChessApi\Enums\GameResultCode;

it('provides readable names for each', function () {
    foreach (GameResultCode::cases() as $case) {
        expect($case->readable())->toBeString();
    }
});
