<?php

namespace App\Repositories\Eloquent;

use App\Models\Supplier;
use App\Repositories\Contracts\SupplierRepositoryInterface;

class SupplierRepository implements SupplierRepositoryInterface
{
    public function all(): array
    {
        return Supplier::all()->toArray();
    }

    public function find(int $id): ?Supplier
    {
        return Supplier::find($id);
    }

    public function findByEmail(string $email): ?Supplier
    {
        return Supplier::where('email', $email)->first();
    }

    public function create(array $data): Supplier
    {
        return Supplier::create($data);
    }

    public function update(Supplier $supplier, array $data): Supplier
    {
        $supplier->update($data);
        return $supplier;
    }

    public function delete(Supplier $supplier): void
    {
        $supplier->delete();
    }
}