<?php

namespace App\Services;

use App\Repositories\BlogCategory\BlogCategoryRepositoryInterface;

class BlogCategoryService
{
    private BlogCategoryRepositoryInterface $blogCategoryRepository;
    public function __construct(BlogCategoryRepositoryInterface $blogCategoryRepository)
    {
        $this->blogCategoryRepository = $blogCategoryRepository;
    }
    public function index()
    {
        return $this->blogCategoryRepository->all();
    }
    public function show(int $id)
    {
        return $this->blogCategoryRepository->findById($id);
    }
    public function store(array $data)
    {
        return $this->blogCategoryRepository->create($data);
    }
    public function update(int $id, array $data)
    {
        return $this->blogCategoryRepository->update($id, $data);
    }
    public function delete(int $id)
    {
        return $this->blogCategoryRepository->delete($id);
    }
}
