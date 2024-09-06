<?php

namespace App\Services;

use App\Enums\ServiceHandler\UserEnum;
class UserService
{
    private function registerUser()
    {
        return "register user handler";
    }

    public function handler(UserEnum $actionType)
    {
        return match ($actionType) {
            UserEnum::REGISTER => $this->registerUser()
        };
    }
}
