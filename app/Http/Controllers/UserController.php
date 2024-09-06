<?php

namespace App\Http\Controllers;

use App\Enums\ServiceHandler\UserEnum;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules\Password;
use Illuminate\Routing\Controller as BaseController;
class UserController extends BaseController
{
    public function __construct(
        public UserService $userService
    )
    {
    }

    public function register(Request $request): string
    {
        $request->validate([
            'firstName' => 'required|string|max:25',
            'lastName' => 'required|string|max:25',
            'email' => 'required|email',
            'password' => [
                'required',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised()
            ],
        ]);

        $response = $this->userService->handler(UserEnum::REGISTER);

        return response()->json($response);
    }

    public function login()
    {
        return 'login';
    }

    public function logout()
    {
    }
}
