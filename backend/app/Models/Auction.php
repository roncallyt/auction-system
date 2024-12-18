<?php

namespace App\Models;

use App\Enums\AuctionStatusEnum;
use App\Models\Traits\HasMoneyFields;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    /** @use HasFactory<\Database\Factories\AuctionFactory> */
    use HasFactory, HasMoneyFields;

    protected $fillable = [
        'product',
        'description',
        'starting_bid',
        'status',
    ];

    /**
     *
     * Set a default status value on create a new instance of this model
     */
    protected $attributes = [
        'status' => AuctionStatusEnum::OPEN,
    ];

    /**
     *
     * Starting bid accessor to format the output
     */
    protected function startingBid(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->formatMoneyField($value)
        );
    }
}
