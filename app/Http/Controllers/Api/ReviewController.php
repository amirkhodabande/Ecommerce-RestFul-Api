<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Review\ReviewRequest;
use App\Http\Requests\Review\UpdateReviewRequest;
use App\Product;
use App\Review;
use App\Repositories\Api\Review\ReviewRepositoryInterface;

class ReviewController extends Controller
{
    /**
     * Use RepositoryInterface to access functions inside Repository.
     * @param  App\Repositories\Api\Product\ReviewRepositoryInterface $reviewRepository
     */
    public function __construct(ReviewRepositoryInterface $reviewRepository)
    {
        $this->reviewRepository = $reviewRepository;
        $this->middleware('auth:api')->except('index', 'show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        return $this->reviewRepository->index($product);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Review\ReviewRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReviewRequest $request, Product $product)
    {
        return $this->reviewRepository->store($request, $product);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product, Review $review)
    {
        return $this->reviewRepository->show($product, $review);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Review\UpdateReviewRequest  $request
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReviewRequest $request, Product $product, Review $review)
    {
        return $this->reviewRepository->update($request, $product, $review);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, Review $review)
    {
        return $this->reviewRepository->destroy($product, $review);
    }
}
