<?php

namespace App\Repositories\Api\Review;

use App\Http\Resources\ReviewResource;
use App\Product;
use App\Repositories\Api\Review\ReviewRepositoryInterface;
use App\Review;
use Exception;
use Illuminate\Http\Request;


class ReviewRepository implements ReviewRepositoryInterface
{
    const SUCCUSUS_STATUS_CODE     = 200;
    const UNAUTHORISED_STATUS_CODE = 401;

    public function index(Product $product)
    {
        return ReviewResource::collection($product->reviews()->paginate(5));
    }
    public function show(Review $review)
    {
        // return new ReviewResource($review);
    }


    public function response($data, int $statusCode)
    {
        $response = ["data" => $data, "statusCode" => $statusCode];
        return $response;
    }
}
