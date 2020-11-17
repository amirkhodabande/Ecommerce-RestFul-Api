<?php

namespace App\Repositories\Api\Product;

use App\Repositories\Api\Product\ProductRepositoryInterface;
use Exception;
use Illuminate\Http\Request;


class ProductRepository implements ProductRepositoryInterface
{
    public function response($data, int $statusCode)
    {
        $response = ["data" => $data, "statusCode" => $statusCode];
        return $response;
    }
}
