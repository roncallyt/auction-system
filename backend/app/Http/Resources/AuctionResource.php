<?php

namespace App\Http\Resources;

use App\Enums\AuctionStatusEnum;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuctionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'product' => $this->product,
            'description' => $this->description,

            /**
             *
             * I am returning to the frontend both of values, the formatted one
             * and also the unformatted.
             */
            'starting_bid' => [
                'formatted' => $this->starting_bid,
                'value' => $this->getRawOriginal('starting_bid'),
            ],

            'status' => AuctionStatusEnum::from($this->status)
        ];
    }
}
