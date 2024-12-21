<?php

namespace App\Http\Controllers\Auth;

use App\Dto\RegisterStoreDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterStoreRequest;
use App\Service\UserService;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    private UserService $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function store(RegisterStoreRequest $request)
    {
        $validate = $request->validated();
        $dto = new RegisterStoreDTO($validate);
        $user = $this->userService->store($dto->toArray());

        if ($user){
            return response()->json([
                'success' => true,
                'message' => "registration was successful",
            ], 201);
        }else {
            return response()->json([
                'success' => false,
                'message' => "registration failed",
            ], 500);
        }
    }
}
