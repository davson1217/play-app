<?php

namespace App\Services;

use App\Enums\ServiceHandler\UserEnum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserService
{
    public function __construct(public Request $request)
    {}
    private function registerUser()
    {

        Log::info("inputs", ['firstName' => is_array($this->request->all())]);
        $id = DB::table('users')->insertGetId([
            'firstName' => $this->request->input('firstName'),
            'lastName' => $this->request->input('lastName'),
            'email' => $this->request->input('email'),
            'password' => Hash::make($this->request->input('password')),
        ]);

        return "registered user with id: " . $id;
    }

    public function handler(UserEnum $actionType)
    {
        return match ($actionType) {
            UserEnum::REGISTER => $this->registerUser()
        };
    }
}
