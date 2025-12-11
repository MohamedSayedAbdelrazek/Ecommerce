<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\product; // Note: Model names should be capitalized (Product)

class ShopController extends Controller
{
    public function index()
    {
        // 1. Fetch all categories, and EAGER LOAD their related products and product images.
        // Eager loading (`with()`) is crucial here to prevent many separate database queries (N+1 problem).
        $categories = Category::with('products.images')->get();
        
        // 2. Pass ONLY the categories collection to the view.
        // The view can access products and images directly via $category->products and $product->images.
        return view('user.shop.shop', compact('categories'));
    }
}