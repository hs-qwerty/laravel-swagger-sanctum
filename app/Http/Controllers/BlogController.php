<?php

namespace App\Http\Controllers;

use App\Dto\BlogCreateDTO;
use App\Dto\BlogUpdateDTO;
use App\Http\Requests\BlogStoreRequest;
use App\Http\Requests\BlogUpdateRequest;
use App\Services\BlogService;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    private BlogService $blogService;
    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }
    public function index()
    {
        return $this->blogService->index();
    }
    public function show($id)
    {
        return $this->blogService->show($id);
    }
    public function store(BlogStoreRequest $request)
    {
        $data = $request->validated();
        $dto = new BlogCreateDTO($data);
        return $this->blogService->store($dto->toArray());
    }
    public function update($id, BlogUpdateRequest $request)
    {
        $data = $request->validated();
        $dto = new BlogUpdateDTO($data);
        return $this->blogService->update($id, $dto->toArray());
    }
    public function delete($id)
    {
        return $this->blogService->delete($id);
    }
}
