<?php

namespace App\Http\Controllers\user;

// 🚨 Make sure you import the Product Model
use App\Models\product; 
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index()
    {
        // Fetch exactly 2 products, ordered by the latest created products,
        // and eager load the images relationship for the view.
        $featuredProducts = product::with('images')
                                    ->latest() 
                                    ->take(2) 
                                    ->get(); 

        // 🚨 This variable must be passed to the view
        return view('user.index', compact('featuredProducts'));
    }
}