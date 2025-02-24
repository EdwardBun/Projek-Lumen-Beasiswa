<?php
namespace App\Http\Requests;

use Illuminate\Validation\Factory;

class TimeRequest
{
    public static function validate($request)
    {
        $rules = [
            'beasiswa_id' => 'required|exists:beasiswas,id',
            'detail_id' => 'required|exists:details,id',
            'time_plus' => 'nullable|integer|min:0',
            'time_minus' => 'nullable|integer|min:0',
        ];

        $validator = app(Factory::class)->make($request->all(), $rules);

        if ($validator->fails()) {
            response()->json($validator->errors(), 400)->send();
            exit;
        }

        return $validator->validated();
    }
}

?>