<?php

namespace App\Repositories\Api\Review;

use App\Repositories\Api\Review\ReviewRepositoryInterface;
use Exception;
use Illuminate\Http\Request;


class ReviewRepository implements ReviewRepositoryInterface
{
    public function response($data, int $statusCode)
    {
        $response = ["data" => $data, "statusCode" => $statusCode];
        return $response;
    }
}
