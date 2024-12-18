<?php

namespace App\Models\Traits;

trait HasMoneyFields
{
    protected function formatMoneyField($value): string
    {
        return $value > 0
            ? number_format($value, 2, ',', '.')
            : '';
    }
}
