<?php

namespace App\Services;

use App\Actions\Auth\LoginCheckAction;
use App\Actions\Auth\RegisterStoreAction;
use App\Events\LoginEvent;

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
        $check = (new LoginCheckAction())->handle($data);

        if ($check){
            LoginEvent::dispatch($data['email']);
            return $check;
        }
        return false;
    }
}
