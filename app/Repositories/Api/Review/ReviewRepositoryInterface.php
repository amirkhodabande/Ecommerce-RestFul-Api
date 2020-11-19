<?php

namespace App\Repositories\Api\Review;

use App\Product;
use App\Review;
use Illuminate\Http\Request;

interface ReviewRepositoryInterface
{
    public function index(Product $product);
    public function show(Review $review);
}
