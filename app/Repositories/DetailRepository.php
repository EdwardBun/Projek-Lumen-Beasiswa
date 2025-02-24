<?php

namespace App\Repositories;
use App\Models\Detail;

//Repositories : memisahkan logika data dengan controller, jadi isinya hanya berupa ORM/Eloquent dengan model//
//Modal -> Repositories -> Services -> Controller//

class DetailRepository {

    public function storeNewDetail (array $data) {
        //Simpan data ke database
        return Detail::create($data);
    }

    public function getAllDetail () {
        //Mengambil data
        return Detail::with('beasiswa')->paginate(10);

    }

}
?>