<?php

namespace App\Http\Requests;

use App\Models\Beasiswa;
use Illuminate\Validation\Factory;

//Request untuk validasi

class BeasiswaRequest {
    //menggunakan static agar pemanggilan menggunakan :: tanpa perlu new//
    public static function validate($request) {
        //validasi ini agar data yang diisi hanya diantara item array tersebut saja, selain dari itu gabisa
        $rules = [
            'name' => 'required|min:3',
            'type' => 'required|in:' . implode(',', [Beasiswa::PENUH, Beasiswa::PARSIAL, Beasiswa::BANTUAN]),
        ];
        //lumen hanya bbisa validasi bentuk $this->validate($request, [...]) tapi hanya bisa dipanggil di controller, tempat awal. jadi solusinya gunakan factory dari validation;
        $validator = app(Factory::class)->make($request->all(), $rules);
        //jika validasi ada error, langsung kirim json dan exit, kodingan lainnya (di kontroler) tidak dijalankan
        if ($validator->fails()) {
            response()->json($validator->errors(), 400)->send();
            exit;
        } else {
            //jika tidak ada yang gagal validasinya, kirim hasil data yang sudah divalidasi
            return $validator->validated();
        }
            
    }
}


?>

        
