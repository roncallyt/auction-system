<?php

namespace App\Policies;

use App\Models\User;

class AuctionPolicy
{
    /**
     *
     * Auction list permission
     */
    public function index(User $user): bool
    {
        return $user->can('list auctions');
    }

    /**
     *
     * Auction creation permission
     */
    public function create(User $user): bool
    {
        return $user->can('create auction');
    }
}
