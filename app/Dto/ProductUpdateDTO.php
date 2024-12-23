<?php

namespace App\Dto;

class ProductUpdateDTO
{
    private int $category_id;
    private string $name;
    private string $description;
    private $status;
    public function __construct(array $data)
    {
        $this->setCategoryId($data['category_id'] ?? '');
        $this->setName($data['name'] ?? '');
        $this->setDescription($data['description'] ?? '');
        $this->setStatus($data['status'] ?? '');
    }
    public function setCategoryId(int $category_id): void
    {
        $this->category_id = $category_id;
    }
    public function getCategoryId(): int
    {
        return $this->category_id;
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
            'category_id' => $this->getCategoryId(),
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'status' => $this->getStatus()
        ];
    }
}
