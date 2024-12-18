<?php

namespace App\Enums;

use MyCLabs\Enum\Enum;

/**
 * Auction status enum
 */
final class AuctionStatusEnum extends Enum
{
    const OPEN = 'open';
    const SOLD = 'sold';
}
