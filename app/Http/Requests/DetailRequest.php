<?php

namespace App\Http\Requests;

use App\Models\Detail;
use Illuminate\Http\Request;
use Illuminate\Validation\Factory;

class DetailRequest {
    public static function validate(Request $request) { // <- Tambahkan Request sebagai parameter
        $rules = [
            'beasiswa_id' => 'required|exists:beasiswas,id',
            'status' => 'required|in:' . implode(',', [Detail::AKTIF, Detail::SELESAI, Detail::BERHENTI]),
            'waktu_bulan' => 'required|integer|min:1',
        ];

        $validator = app(Factory::class)->make($request->all(), $rules);

        if ($validator->fails()) {
            response()->json($validator->errors(), 400)->send();
            exit;
        }

        return $validator->validated();
    }
}
