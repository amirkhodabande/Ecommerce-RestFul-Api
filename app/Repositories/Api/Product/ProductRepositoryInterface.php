<?php

namespace App\Repositories\Api\Product;

use App\Http\Requests\Product\ProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Product;
use Illuminate\Http\Request;

interface ProductRepositoryInterface
{
    public function index();
    public function show(Product $product);
    public function store(ProductRequest $request);
    public function update(UpdateProductRequest $request, Product $product);
    public function destroy(Product $product);
}
