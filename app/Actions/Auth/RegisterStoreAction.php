<?php

namespace App\Actions\Auth;

use App\Models\User;

class RegisterStoreAction
{
    public function __construct()
    {}
    public function handle(array $data)
    {
        $data['is_admin'] = false;
        return User::create($data);
    }
}
