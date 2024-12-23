<?php

namespace App\Dto;

class CategoryCreateDTO
{
    private string $name;
    private string $description;
    private $status;
    public function __construct(array $data)
    {
        $this->setName($data['name'] ?? '');
        $this->setDescription($data['description'] ?? '');
        $this->setStatus($data['status'] ?? '');
    }
    public function setName(string $name): void
    {
        $this->name = $name;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
    public function getDescription(): string
    {
        return $this->description;
    }
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }
    public function getStatus(): string
    {
        return $this->status;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'status' => $this->getStatus()
        ];
    }
}
