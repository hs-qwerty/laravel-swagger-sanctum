<?php

namespace App\Services;

use App\Repositories\Category\CategoryRepositoryInterface;
use Illuminate\Support\Facades\Redis;

class CategoryService
{
    const category_prefix = "category:";
    private CategoryRepositoryInterface $categoryRepository;
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    public function index()
    {
        $redis = Redis::connection();

        if ($redis->exists(self::category_prefix.'all'))
        {
            $category = $redis->get(self::category_prefix.'all');
        }else{
            $category = $this->categoryRepository->all();
            $redis->set(self::category_prefix.'all', $category);
        }
        return $category;
    }
    public function show(int $id)
    {
        return $this->categoryRepository->findById($id);
    }
    public function store(array $data)
    {
        return $this->categoryRepository->create($data);
    }
    public function update(int $id, array $data)
    {
       return $this->categoryRepository->update($id, $data);
    }
    public function delete(int $id)
    {
        return $this->categoryRepository->delete($id);
    }
}
