<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\product;
use App\Models\User;
use App\Models\orderStatus;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = order::with(['product', 'user', 'orderStatus'])->get();
        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = product::all();
        $users = User::all();
        $orderStatuses = orderStatus::all();
        return view('admin.orders.create', compact('products', 'users', 'orderStatuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'orderName' => 'required',
            'orderDate' => 'required|date',
            'totalAmount' => 'required|numeric',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'totalPrice' => 'required|numeric',
            'order_status_id' => 'required|exists:order_statuses,id',
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
        ]);

        order::create($request->all());

        return redirect()->route('orders.index')->with('success', 'Order created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(order $order)
    {
        return view('admin.orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(order $order)
    {
        $products = product::all();
        $users = User::all();
        $orderStatuses = orderStatus::all();
        return view('admin.orders.edit', compact('order', 'products', 'users', 'orderStatuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, order $order)
    {
        $request->validate([
            'orderName' => 'required',
            'orderDate' => 'required|date',
            'totalAmount' => 'required|numeric',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'totalPrice' => 'required|numeric',
            'order_status_id' => 'required|exists:order_statuses,id',
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
        ]);

        $order->update($request->all());

        return redirect()->route('orders.index')->with('success', 'Order updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Order deleted successfully');
    }
}
