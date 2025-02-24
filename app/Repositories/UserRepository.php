<?php

namespace App\Repositories;
use App\Models\User;

//Repositories : memisahkan logika data dengan controller, jadi isinya hanya berupa ORM/Eloquent dengan model//
//Modal -> Repositories -> Services -> Controller//

class UserRepository {
    public function getAllUsers () {
        //Mengambil data
        return User::paginate(10);
    }

    public function storeUser (array $data) {
        //Simpan data ke database
        return User::create($data);
    }

    public function update (array $data, $id) {
        //update data
        User::where('id', $id)->update($data);
        return User::find($id);
    }

    public function deleteUser ($id) {
        //hapus data
        return User::where('id', $id)->delete();
    }
}
?>