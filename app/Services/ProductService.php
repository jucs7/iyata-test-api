<?php

namespace App\Services;

use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryInterface;

class ProductService
{
    public function __construct(
        protected ProductRepositoryInterface $productRepository
    ) {}

    public function list(): array
    {
        return $this->productRepository->all();
    }

    public function find(int $id): ?Product
    {
        return $this->productRepository->find($id);
    }

    public function create(array $data): Product
    {
        return $this->productRepository->create($data);
    }

    public function update(Product $product, array $data): Product
    {
        return $this->productRepository->update($product, $data);
    }

    public function delete(Product $product): void
    {
        $this->productRepository->delete($product);
    }
}