<?php

namespace App\Service;

use App\Actions\Auth\LoginCheckAction;
use App\Actions\Auth\RegisterStoreAction;

class UserService
{
    public function __construct()
    {}

    public function store(array $data)
    {
        return (new RegisterStoreAction())->handle($data);
    }

    public function check(array $data)
    {
        return (new LoginCheckAction())->handle($data);
    }
}
