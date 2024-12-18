<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuctionRequest;
use App\Http\Resources\AuctionResource;
use App\Models\Auction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class AuctionController extends Controller
{
    public function index(): JsonResource
    {
        Gate::authorize('index', Auction::class);

        return AuctionResource::collection(Auction::all());
    }

    public function store(AuctionRequest $request): JsonResponse
    {
        Gate::authorize('create', Auction::class);

        $auction = Auction::create($request->validated());

        return response()->json([
            'data' => new AuctionResource($auction),
            'message' => 'Auction created successfully.'
        ], Response::HTTP_CREATED);
    }

    public function show(Request $request, Auction $auction): JsonResponse
    {
        return response()->json([
            'data' => new AuctionResource($auction),
        ], Response::HTTP_FOUND);
    }

    public function update(AuctionRequest $request, Auction $auction): JsonResponse
    {
        $auction->update($request->validated());

        return response()->json([
            'data' => new AuctionResource($auction),
            'message' => 'Auction updated successfully.'
        ], Response::HTTP_OK);
    }

    public function destroy(Request $request, Auction $auction): JsonResponse
    {
        $auction->delete();

        return response()->json([
            'message' => 'Auction deleted successfully.'
        ], Response::HTTP_OK);
    }
}
