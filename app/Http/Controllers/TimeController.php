<?php

namespace App\Http\Controllers;

use App\Http\Requests\TimeRequest;
use App\Services\TimeService;
use App\Http\Resources\TimeResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TimeController extends Controller
{
    protected $timeService;

    public function __construct(TimeService $timeService)
    {
        $this->timeService = $timeService;
    }

    public function store(Request $request): JsonResponse
    {
        try {
            $payload = TimeRequest::validate($request);
            $time = $this->timeService->store($payload);
            return response()->json(new TimeResource($time), 200);
        } catch (\Exception $err) {
            return response()->json(['error' => $err->getMessage()], 400);
        }
    }
}
