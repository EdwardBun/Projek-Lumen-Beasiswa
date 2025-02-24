<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Validation\Factory;
use App\Models\User;

class LoginRequest
{
    public static function validate(Request $request)
    {

        $rules = [
            'email' => 'required|email:dns',
            'password' => 'required|',
        ];

        $validator = app(Factory::class)->make($request->all(), $rules);

        // Jika validasi gagal, kirimkan error response
        if ($validator->fails()) {
            response()->json($validator->errors(), 400)->send();
            exit;
        }

        // Jika validasi sukses, kembalikan data yang sudah divalidasi
        return $validator->validated();
    }
}
