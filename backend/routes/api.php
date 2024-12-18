<?php

use App\Http\Controllers\AuctionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::prefix('/auctions')->group(function () {
        Route::get('/', [AuctionController::class, 'index'])->name('auction.index');
        Route::post('/', [AuctionController::class, 'store'])->name('auction.store');
    });
});
