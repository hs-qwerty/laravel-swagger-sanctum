<?php

namespace App\Http\Controllers;

use App\Dto\BlogCategoryCreateDTO;
use App\Dto\BlogCategoryUpdateDTO;
use App\Http\Requests\BlogCategoryStoreRequest;
use App\Http\Requests\BlogCategoryUpdateRequest;
use App\Services\BlogCategoryService;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    private BlogCategoryService $blogCategoryService;
    public function __construct(BlogCategoryService $blogCategoryService)
    {
        $this->blogCategoryService = $blogCategoryService;
    }
    public function index()
    {
        return $this->blogCategoryService->index();
    }
    public function show($id)
    {
        return $this->blogCategoryService->show($id);
    }
    public function store(BlogCategoryStoreRequest $request)
    {
        $data = $request->validated();
        $dto = new BlogCategoryCreateDTO($data);
        return $this->blogCategoryService->store($dto->toArray());
    }
    public function update($id, BlogCategoryUpdateRequest $request)
    {
        $data = $request->validated();
        $dto = new BlogCategoryUpdateDTO($data);
        return $this->blogCategoryService->update($id, $dto->toArray());
    }
    public function delete($id)
    {
        return $this->blogCategoryService->delete($id);
    }
}
