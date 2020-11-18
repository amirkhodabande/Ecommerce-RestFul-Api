<?php

namespace App\Repositories\Api\Product;

use App\Http\Resources\Product\ProductResource;
use App\Product;
use App\Repositories\Api\Product\ProductRepositoryInterface;
use Exception;
use Illuminate\Http\Request;


class ProductRepository implements ProductRepositoryInterface
{
    const SUCCUSUS_STATUS_CODE     = 200;
    const UNAUTHORISED_STATUS_CODE = 401;

    public function index()
    {
        $products = Product::paginate(8);
        return $this->response([$products], self::SUCCUSUS_STATUS_CODE);
    }
    public function show(Product $product)
    {
        return $this->response([new ProductResource($product)], self::SUCCUSUS_STATUS_CODE);
        return $this->response([$product], self::SUCCUSUS_STATUS_CODE);
    }

    public function response($data, int $statusCode)
    {
        $response = ["data" => $data, "statusCode" => $statusCode];
        return $response;
    }
}
