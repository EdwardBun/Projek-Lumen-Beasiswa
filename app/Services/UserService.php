<?php

namespace App\Services;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


//memisahkan business logic dengan controller, proses manipulasi hasil dari Repository//
//Repositories -> Services -> Controller//


class UserService {
    private $userRepository;


    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        return $this->userRepository->getAllUsers();
    }

    public function store(array $data)
    {
        $data['password'] = Hash::make($data['password']);
        return $this->userRepository->storeUser($data);
    }

    public function update(array $data, $id) {
        $data['password'] = Hash::make($data['password']);
        return $this->userRepository->update($data, $id);
    }

    public function destroy($id) { 
        return $this->userRepository->deleteUser($id);
    }

    public function login(array $data) {
        $token = Auth::attempt($data);
        if (!$token) {
            //jika login gagal, langsung beri response dan hentikan proses apapun setelahnya
            return response()->json("Login gagal", 400)->send();
            exit;
        }

        $responseToken = [
            'access_token' => $token, //token JWT
            'token_type' => 'bearer', //tipe token default JWT
            'user' => Auth::user(), //detail user
        ];
        return $responseToken;
    }

    public function logout() {
        return Auth::logout();
    }

    public function profile() {
        return Auth::user();
    }

    
}
?>