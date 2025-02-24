<?php

namespace App\Services;
use App\Repositories\BeasiswaRepository;

//memisahkan business logic dengan controller, proses manipulasi hasil dari Repository//
//Repositories -> Services -> Controller//


class BeasiswaService {
    private $beasiswaRepository;

    //Fungsi __Construct untuk definisi dan dijalani pertama agar bisa dipanggil
    public function __construct(BeasiswaRepository $beasiswaRepository) {
        //proses panggil file repository
        $this->beasiswaRepository = $beasiswaRepository;
    }

    public function index() {
        return $this->beasiswaRepository->getAllData();
    }

    public function store(array $data) {
        return $this->beasiswaRepository->storeNewData($data);
    }

    public function update(array $data, $id) {
        return $this->beasiswaRepository->updateData($data, $id);
    }

    public function destroy($id) { 
        return $this->beasiswaRepository->deleteData($id);
    }
}
?>