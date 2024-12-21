<?php

namespace App\Dto;

class LoginCheckDTO
{
    private string $email;
    private string $password;
    public function __construct(array $data)
    {
        $this->setEmail($data['email'] ?? '');
        $this->setPassword($data['password'] ?? '');
    }
    public function setEmail(string $email): void
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException("Geçersiz email formatı.");
        }
        $this->email = $email;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function toArray(): array
    {
        return [
            'email' => $this->getEmail(),
            'password' => $this->getPassword()
        ];
    }
}
