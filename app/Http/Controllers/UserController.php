<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use App\Http\Resources\UserResource;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->index();
        return response()->json(UserResource::collection($users), 200);
    }

    public function store(Request $request)
    {
        $validatedData = UserRequest::validate($request);
        
        
        // Simpan user dengan data yang sudah divalidasi
        $user = $this->userService->store($validatedData);
        
        return response()->json(new UserResource($user), 201);
    }

    public function update(Request $request, $id) {
        try {
            $payload = UserRequest::validate($request);
            $user = $this->userService->update($payload, $id);
            return response()->json(new UserResource($user), 200);
        } catch (\Exception $err) {
            return response()->json($err->getMessage(), 400);
        }
    }    

    public function destroy($id) {
        try {
            $this->userService->destroy($id);
            return response()->json(null, 204);
        } catch (\Exception $err) {
            return response()->json($err->getMessage(), 400);
        }
    }

    public function login(Request $request) {
        try {
            $payload = LoginRequest::validate($request);
            $login = $this->userService->login($payload);
            return response()->json($login, 200);
        } catch (\Exception $err) {
                return response()->json($err->getMessage(), 400);
        }
    }

    public function logout() {
        $this->userService->logout();
        return response()->json("berhasil logout", 200);
    }

    public function profile() {
        $user = $this->userService->profile();
        return response()->json(new UserResource($user), 200);
    }

    
    //
}
