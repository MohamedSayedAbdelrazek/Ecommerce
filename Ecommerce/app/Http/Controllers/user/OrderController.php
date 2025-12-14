<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display the authenticated user's orders.
     */
    public function myOrders()
    {
        $orders = order::with(['product.images', 'orderStatus'])
            ->where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('user.orders.my-orders', compact('orders'));
    }
}
