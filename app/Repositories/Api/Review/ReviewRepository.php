<?php

namespace App\Repositories\Api\Review;

use App\Exceptions\ProductNotBelongsToUser;
use App\Http\Requests\Review\ReviewRequest;
use App\Http\Requests\Review\UpdateReviewRequest;
use App\Http\Resources\ReviewResource;
use App\Product;
use App\Review;
use App\Repositories\Api\Review\ReviewRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;


class ReviewRepository implements ReviewRepositoryInterface
{
    public function index(Product $product)
    {
        return ReviewResource::collection($product->reviews()->paginate(5));
    }
    public function show(Product $product, Review $review)
    {
        if ($review->product_id === $product->id)
            return new ReviewResource($review);
        else
            return response([
                'errors' => "Sorry This Review is not belong to this product!"
            ], Response::HTTP_NOT_FOUND);
    }
    public function store(ReviewRequest $request, Product $product)
    {
        $review = $product->reviews()->create($request->all());
        return response([
            'data' => new ReviewResource($review)
        ], Response::HTTP_CREATED);
    }
    public function update(UpdateReviewRequest $request, Product $product, Review $review)
    {
        // We want only the creator of the product can edit/delete Reviews of that product.
        // 1 : Check if Product belongs to the User.
        // 2 : Check the review belongs to the selected Product.        
        $this->ProductUserCheck($product);
        if ($review->product_id === $product->id) {
            $review->update($request->all());
            return response([
                'data' => new ReviewResource($review)
            ], Response::HTTP_CREATED);
        } else
            return response([
                'errors' => "Sorry This Review is not belong to this product!"
            ], Response::HTTP_NOT_FOUND);
    }
    public function destroy(Product $product, Review $review)
    {
        $this->ProductUserCheck($product);
        if ($review->product_id === $product->id) {
            $review->delete();
            return response([
                'data' => "Hello"
            ], Response::HTTP_NO_CONTENT);
        } else
            return response([
                'errors' => "Sorry This Review is not belong to this product!"
            ], Response::HTTP_NOT_FOUND);
    }
    public function ProductUserCheck($product)
    {
        if (Auth::id() !== $product->user_id) {
            throw new ProductNotBelongsToUser();
        }
    }
}
