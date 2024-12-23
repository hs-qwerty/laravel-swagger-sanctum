<?php

namespace App\Services;

use App\Repositories\Blog\BlogRepositoryInterface;

class BlogService
{
    private BlogRepositoryInterface $blogRepository;
    public function __construct(BlogRepositoryInterface $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }
    public function index()
    {
        return $this->blogRepository->all();
    }
    public function show(int $id)
    {
        return $this->blogRepository->findById($id);
    }
    public function store(array $data)
    {
        return $this->blogRepository->create($data);
    }
    public function update(int $id, array $data)
    {
        return $this->blogRepository->update($id, $data);
    }
    public function delete(int $id)
    {
        return $this->blogRepository->delete($id);
    }
}
