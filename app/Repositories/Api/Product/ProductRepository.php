<?php

namespace App\Repositories\Api\Product;

use App\Exceptions\ProductNotBelongsToUser;
use App\Http\Requests\Product\ProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Http\Resources\Product\ProductCollection;
use App\Http\Resources\Product\ProductResource;
use App\Product;
use App\Repositories\Api\Product\ProductRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ProductRepository implements ProductRepositoryInterface
{
    public function index()
    {
        return ProductCollection::collection(Product::paginate(5));
    }
    public function show(Product $product)
    {
        return new ProductResource($product);
    }
    public function store(ProductRequest $request)
    {
        $product = Product::create($request->all());
        return response([
            'data' => new ProductResource($product)
        ], Response::HTTP_CREATED);
    }
    public function update(UpdateProductRequest $request, Product $product)
    {
        $this->ProductUserCheck($product);
        $product->update($request->all());
        return response([
            'data' => new ProductResource($product)
        ], Response::HTTP_CREATED);
    }
    public function destroy(Product $product)
    {
        $this->ProductUserCheck($product);
        $product->delete();
        return response([
            null
        ], Response::HTTP_NO_CONTENT);
    }
    public function ProductUserCheck($product)
    {
        if (Auth::id() !== $product->user_id) {
            throw new ProductNotBelongsToUser;
        }
    }
}
