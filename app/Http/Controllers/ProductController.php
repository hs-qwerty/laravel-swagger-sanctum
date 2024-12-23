<?php

namespace App\Http\Controllers;

use App\Dto\ProductCreateDTO;
use App\Dto\ProductUpdateDTO;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private ProductService $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    public function index()
    {
        return $this->productService->index();
    }
    public function show(int $id)
    {
        return $this->productService->show($id);
    }
    public function store(ProductStoreRequest $request)
    {
        $data = $request->validated();
        $dto = new ProductCreateDTO($data);
        return $this->productService->store($dto->toArray());
    }
    public function update(int $id, ProductUpdateRequest $request)
    {
        $data = $request->validated();
        $dto = new ProductUpdateDTO($data);
        return $this->productService->update($id, $dto->toArray());
    }
    public function delete(int $id)
    {
        return $this->productService->delete($id);
    }
}
