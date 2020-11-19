<?php

namespace App\Repositories\Api\Product;

use App\Http\Resources\Product\ProductCollection;
use App\Http\Resources\Product\ProductResource;
use App\Product;
use App\Repositories\Api\Product\ProductRepositoryInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductRepository implements ProductRepositoryInterface
{
    const SUCCUSUS_STATUS_CODE     = 200;
    const UNAUTHORISED_STATUS_CODE = 401;

    public function index()
    {
        return ProductCollection::collection(Product::paginate(5));
    }
    public function show(Product $product)
    {
        return new ProductResource($product);
    }
}
