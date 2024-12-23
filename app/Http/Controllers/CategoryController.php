<?php

namespace App\Http\Controllers;

use App\Dto\CategoryCreateDTO;
use App\Dto\CategoryUpdateDTO;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Services\CategoryService;

class CategoryController extends Controller
{
    private CategoryService $categoryService;
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    public function index()
    {
        return $this->categoryService->index();
    }
    public function show(int $id)
    {
        return $this->categoryService->show($id);
    }
    public function store(CategoryStoreRequest $request)
    {
        $data = $request->validated();
        $dto = new CategoryCreateDTO($data);
        return $this->categoryService->store($dto->toArray());
    }
    public function update(int $id, CategoryUpdateRequest $request)
    {
        $data = $request->validated();
        $dto = new CategoryUpdateDTO($data);
        return $this->categoryService->update($id, $dto->toArray());
    }
    public function delete(int $id)
    {
        return $this->categoryService->delete($id);
    }
}
