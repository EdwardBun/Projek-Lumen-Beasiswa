<?php

namespace App\Http\Controllers;

use App\Http\Requests\DetailRequest;
use App\Http\Resources\DetailResource;
use App\Services\DetailService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request; // <- Tambahkan use Request

class DetailController extends Controller
{
    protected $detailService;

    public function __construct(DetailService $detailService)
    {
        $this->detailService = $detailService;
    }

    public function index() {
        try {
            $detail = $this->detailService->index();
            return response()->json(DetailResource::collection($detail), 200);
        } catch (\Exception $err) {
            return response()->json($err->getMessage(), 400);
        }
        }

    public function store(Request $request): JsonResponse
    {
        try {
            $payload = DetailRequest::validate($request);
            $detail = $this->detailService->store($payload);
            return response()->json(new DetailResource($detail), 200);
        } catch (\Exception $err) {
            return response()->json(['error' => $err->getMessage()], 400);
        }
    }
}
