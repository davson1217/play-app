<?php

class UserServiceDTO
{

    public function __construct(
        public ?int $userId,
        public ?string $message
    ) {}
}
