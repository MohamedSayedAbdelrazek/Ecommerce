<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
use App\Models\product;
use App\Models\User;

class DashboardController extends Controller
{
    //
    public function index()
    {

        $ordersCount = order::count();
        $productsCount = product::count();
        $usersCount = User::count();
        $orders = order::latest()->take(5)->get();
        $totalRevenue = order::sum('totalPrice');

        // Get current month data
        $currentMonthStart = now()->startOfMonth();
        $currentMonthEnd = now()->endOfMonth();

        $currentMonthOrders = order::whereBetween('created_at', [$currentMonthStart, $currentMonthEnd])->count();
        $currentMonthRevenue = order::whereBetween('created_at', [$currentMonthStart, $currentMonthEnd])->sum('totalPrice');
        $currentMonthUsers = User::whereBetween('created_at', [$currentMonthStart, $currentMonthEnd])->count();
        $currentMonthProducts = product::whereBetween('created_at', [$currentMonthStart, $currentMonthEnd])->count();

        // Get previous month data
        $previousMonthStart = now()->subMonth()->startOfMonth();
        $previousMonthEnd = now()->subMonth()->endOfMonth();

        $previousMonthOrders = order::whereBetween('created_at', [$previousMonthStart, $previousMonthEnd])->count();
        $previousMonthRevenue = order::whereBetween('created_at', [$previousMonthStart, $previousMonthEnd])->sum('totalPrice');
        $previousMonthUsers = User::whereBetween('created_at', [$previousMonthStart, $previousMonthEnd])->count();
        $previousMonthProducts = product::whereBetween('created_at', [$previousMonthStart, $previousMonthEnd])->count();

        // Calculate percentage changes
        $revenueChange = $this->calculatePercentageChange($previousMonthRevenue, $currentMonthRevenue);
        $ordersChange = $this->calculatePercentageChange($previousMonthOrders, $currentMonthOrders);
        $usersChange = $this->calculatePercentageChange($previousMonthUsers, $currentMonthUsers);
        $productsChange = $this->calculatePercentageChange($previousMonthProducts, $currentMonthProducts);

        // Analytics Data
        $lowStockProducts = $this->getLowStockProducts();
        $revenueBreakdown = $this->getRevenueBreakdown();

        return view('dashboard', compact(
            'ordersCount',
            'productsCount',
            'usersCount',
            'totalRevenue',
            'revenueChange',
            'ordersChange',
            'usersChange',
            'productsChange',
            'orders',
            'lowStockProducts',
            'revenueBreakdown',
        ));
    }

    /**
     * Get top 5 selling products
     */
    private function getTopSellingProducts()
    {
        return order::select('product_id')
            ->selectRaw('SUM(quantity) as total_sold')
            ->selectRaw('SUM(totalPrice) as total_revenue')
            ->groupBy('product_id')
            ->orderByDesc('total_sold')
            ->with('product')
            ->limit(5)
            ->get();
    }

    /**
     * Get products with low stock (quantity < 10)
     */
    private function getLowStockProducts()
    {
        return product::where('quantity', '<', 10)
            ->orderBy('quantity', 'asc')
            ->limit(5)
            ->get();
    }

    /**
     * Get revenue breakdown for today, this week, and this month
     */
    private function getRevenueBreakdown()
    {
        return [
            'today' => order::whereDate('created_at', today())->sum('totalPrice'),
            'week' => order::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->sum('totalPrice'),
            'month' => order::whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()])->sum('totalPrice'),
        ];
    }

    /**
     * Get top 5 customers by total spending
     */
    private function getTopCustomers()
    {
        return order::select('user_id')
            ->selectRaw('COUNT(*) as order_count')
            ->selectRaw('SUM(totalPrice) as total_spent')
            ->groupBy('user_id')
            ->orderByDesc('total_spent')
            ->with('user')
            ->limit(5)
            ->get();
    }

    /**
     * Get order count by status
     */
    private function getOrderStatusSummary()
    {
        return order::select('order_status_id')
            ->selectRaw('COUNT(*) as count')
            ->groupBy('order_status_id')
            ->with('orderStatus')
            ->get();
    }

    /**
     * Calculate percentage change between two values
     */
    private function calculatePercentageChange($oldValue, $newValue)
    {
        if ($oldValue == 0) {
            return $newValue > 0 ? 100 : 0;
        }

        return round((($newValue - $oldValue) / $oldValue) * 100, 1);
    }
}
