<?php

namespace App\Http\Controllers;

use App\Services\BeasiswaService;
use App\Http\Resources\BeasiswaResource;
use App\Http\Requests\BeasiswaRequest;
use Illuminate\Http\Request;

class BeasiswaController extends Controller
{
    private $beasiswaService;

    public function __construct(BeasiswaService $beasiswaService)
    {
        $this->beasiswaService = $beasiswaService;
    }

    public function index() {
        try {
            //Ambil dari services//
            $beasiswa = $this->beasiswaService->index();
            //response()->json : hasil yang akan dimunculkan ketika mengakses url terkait : json (data yang mau dimunculin, httpstatuscode)
            //Ambil dari Collection//
            return response()->json(beasiswaResource::collection($beasiswa), 200);
        } catch (\Exception $err) {
            //jikaa try ada yang erro, muunculkan error seperti ini
            return response()->json($err->getMessage(), 400);
        }
        }

    public function store (Request $request) {
        try {
            $payload = BeasiswaRequest::validate($request);
            $beasiswa = $this->beasiswaService->store($payload);
            return response()->json(new BeasiswaResource($beasiswa), 200);
        } catch (\Exception $err) {
            return response()->json($err->getMessage(), 400);
        }
    }

    public function update(Request $request, $id) {
        try {
            $payload = BeasiswaRequest::validate($request);
            $beasiswa = $this->beasiswaService->update($payload, $id);
            return response()->json(new BeasiswaResource($beasiswa), 200);
        } catch (\Exception $err) {
            return response()->json($err->getMessage(), 400);
        }
    }   
    
    public function destroy($id) {
        try {
            $this->beasiswaService->destroy($id);
            return response()->json(null, 204);
        } catch (\Exception $err) {
            return response()->json($err->getMessage(), 400);
        }
    }
}
