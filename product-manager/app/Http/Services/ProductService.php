<?php

namespace App\Http\Services;

use App\Models\Product;

class ProductService
{
    public function getAll($filters = [])
    {
        $query = Product::query();
        if (isset($filters['name'])) {
            $query->where('name', 'ILIKE', '%' . $filters['name'] . '%');
        }
        if (isset($filters['min_price'])) {
            $query->where('price', '>=', $filters['min_price']);
        }
        if (isset($filters['max_price'])) {
            $query->where('price', '<=', $filters['max_price']);
        }
        if (isset($filters['category'])) {
            $query->where('category', 'ILIKE', '%' . $filters['category'] . '%');
        }
        if (isset($filters['stock'])) {
            $query->where('stock', '>=', $filters['stock']);
        }
        if (isset($filters['per_page'])) {
            $query->paginate($filters['per_page'] ?? 10);
        }
        return $query->get();
    }

    public function getById($id)
    {
        return Product::findOrFail($id);
    }

    public function create(array $data)
    {
        return Product::create($data);
    }

    public function update(array $data, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($data);
        return $product;
    }

    public function updatePartial(array $data, $id)
    {
        $product = Product::findOrFail($id);
        $product->fill($data);
        $product->save();
        return $product;
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        return $product->delete();
    }
}