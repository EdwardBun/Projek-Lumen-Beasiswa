<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Validation\Factory;
use App\Models\User;

class UserRequest
{
    public static function validate($request)
    {
        $request['role'] = $request['role'] ?? 'staff';


        $rules = [
            'username' => 'required|string',
            'email' => 'required|email|',
            'password' => 'required|',
            'role' => 'required|in:siswa,admin',
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
