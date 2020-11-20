<?php

use App\Product;
use App\Review;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 5)->create();
        factory(Product::class, 50)->create();
        factory(Review::class, 300)->create();
    }
}
