<?php

namespace App\Repositories\Api\Product;

use App\Product;
use Illuminate\Http\Request;

interface ProductRepositoryInterface
{
    public function index();
    public function show(Product $product);
}
