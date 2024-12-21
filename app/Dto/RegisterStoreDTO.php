<?php

namespace App\Dto;

class RegisterStoreDTO
{
    private string $name;
    private string $email;
    private string $password;

    public function __construct(array $data)
    {
        $this->setName($data['name'] ?? '');
        $this->setEmail($data['email'] ?? '');
        $this->setPassword($data['password'] ?? '');
    }
    public function setName(string $name): void
    {
        $this->name = trim($name);
    }

    public function getName(): string
    {
        return $this->name;
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
        if (strlen($password) < 8) {
            throw new \InvalidArgumentException("Şifre en az 8 karakter olmalıdır.");
        }
        $this->password = password_hash($password, PASSWORD_BCRYPT);
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->getName(),
            'email' => $this->getEmail(),
            'password' => $this->getPassword()
        ];
    }
}
