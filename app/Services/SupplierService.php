<?php

namespace App\Services;

use App\Models\Supplier;
use App\Repositories\Contracts\SupplierRepositoryInterface;

class SupplierService
{
    public function __construct(
        protected SupplierRepositoryInterface $supplierRepository
    ) {}

    public function list(): array
    {
        return $this->supplierRepository->all();
    }

    public function find(int $id): ?Supplier
    {
        return $this->supplierRepository->find($id);
    }

    public function findByEmail(string $email): ?Supplier
    {
        return $this->supplierRepository->findByEmail($email);
    }

    public function create(array $data): Supplier
    {
        return $this->supplierRepository->create($data);
    }

    public function update(Supplier $supplier, array $data): Supplier
    {
        return $this->supplierRepository->update($supplier, $data);
    }

    public function delete(Supplier $supplier): void
    {
        $this->supplierRepository->delete($supplier);
    }
}