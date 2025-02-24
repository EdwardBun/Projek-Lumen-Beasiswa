<?php

namespace App\Repositories;
use App\Models\Beasiswa;

//Repositories : memisahkan logika data dengan controller, jadi isinya hanya berupa ORM/Eloquent dengan model//
//Modal -> Repositories -> Services -> Controller//

class BeasiswaRepository {
    public function getAllData () {
        //Mengambil data
        return Beasiswa::paginate(10);
    }

    public function storeNewData (array $data) {
        //Simpan data ke database
        return Beasiswa::create($data);
    }

    public function updateData (array $data, $id) {
        //update data
        Beasiswa::where('id', $id)->update($data);
        return Beasiswa::find($id);
    }

    public function deleteData ($id) {
        //hapus data
        return Beasiswa::where('id', $id)->delete();
    }
}
?>