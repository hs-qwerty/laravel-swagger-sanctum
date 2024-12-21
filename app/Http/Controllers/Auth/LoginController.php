<?php

namespace App\Http\Controllers\Auth;

use App\Dto\LoginCheckDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Service\UserService;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    private UserService $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function login(LoginRequest $request)
    {
        $validate = $request->validated();
        $dto = new LoginCheckDTO($validate);
        $user = $this->userService->check($dto->toArray());

        if ($user){
            $data['token'] = $user;

            return response()->json([
                'success' => true,
                'message' => "registration was successful",
                'data' => $data
            ], 201);
        }else {
            return response()->json([
                'success' => false,
                'message' => "registration failed",
            ], 500);
        }

    }
}
