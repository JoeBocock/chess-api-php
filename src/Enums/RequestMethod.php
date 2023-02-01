<?php

declare(strict_types=1);

namespace JoeBocock\ChessApi\Enums;

enum RequestMethod: string
{
    case GET = 'GET';
    case POST = 'POST';
}
