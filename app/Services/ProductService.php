<?php

namespace App\Services;

use App\Jobs\ProductStoreJob;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Support\Facades\Redis;

class ProductService
{
    const product_prefix = 'product:';
    private ProductRepositoryInterface $productRepository;
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    public function index()
    {
        $redis = Redis::connection();

        if ($redis->exists(self::product_prefix.'all'))
        {
            $product = $redis->get(self::product_prefix.'all');
        }else{
            $product = $this->productRepository->all();
            $redis->set(self::product_prefix.'all', $product);
        }
        return $product;
    }
    public function show(int $id)
    {
        return $this->productRepository->findById($id);
    }
    public function store(array $data)
    {
        $product = $this->productRepository->create($data);
        ProductStoreJob::dispatch('product store');
        return $product;
    }
    public function update(int $id, array $data)
    {
        ProductStoreJob::dispatch('product update');
        return $this->productRepository->update($id, $data);
    }
    public function delete(int $id)
    {
        return $this->productRepository->delete($id);
    }
}
