<?php

declare(strict_types=1);

namespace JoeBocock\ChessApi\Enums;

enum PlayerTitle: string
{
    case GM = 'GM';
    case WGM = 'WGM';
    case IM = 'IM';
    case WIM = 'WIM';
    case FM = 'FM';
    case WFM = 'WFM';
    case NM = 'NM';
    case WNM = 'WNM';
    case CM = 'CM';
    case WCM = 'WCM';
}
