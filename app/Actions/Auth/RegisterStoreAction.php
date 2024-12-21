<?php

namespace App\Actions\Auth;

use App\Models\User;

class RegisterStoreAction
{
    public function __construct()
    {}

    public function handle(array $data)
    {
        return User::create($data);
    }
}
