<?php

namespace App\Repositories\Contracts;

use App\Models\Supplier;

interface SupplierRepositoryInterface
{
    public function all(): array;
    public function find(int $id): ?Supplier;
    public function findByEmail(string $email): ?Supplier;
    public function create(array $data): Supplier;
    public function update(Supplier $supplier, array $data): Supplier;
    public function delete(Supplier $supplier): void;
}