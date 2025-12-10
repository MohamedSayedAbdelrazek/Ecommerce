<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\product;
class CustomerController extends Controller
{
    public function index()
    {
        $products = product::all();
        $categories=Category::all();
        return view('user.index',compact('products','categories'));
    }
}
