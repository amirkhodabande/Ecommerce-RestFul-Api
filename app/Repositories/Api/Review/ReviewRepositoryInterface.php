<?php

namespace App\Repositories\Api\Review;

use App\Http\Requests\Review\ReviewRequest;
use App\Http\Requests\Review\UpdateReviewRequest;
use App\Product;
use App\Review;

interface ReviewRepositoryInterface
{
    public function index(Product $product);
    public function show(Product $product, Review $review);
    public function store(ReviewRequest $request, Product $product);
    public function update(UpdateReviewRequest $request, Product $product, Review $review);
    public function destroy(Product $product, Review $review);
}
