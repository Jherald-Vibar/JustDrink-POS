<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\OpenAIService;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index()
    {
    if (Auth::check()) {
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('cart.index');
        }


        $orders_today = Order::whereDate('created_at', date('Y-m-d'))->get();
        $income_today = $orders_today->map(function ($order) {
            return min($order->receivedAmount(), $order->total());
        })->sum();


        $orders_week = Order::whereBetween('created_at', [
            now()->startOfWeek(), now()->endOfWeek()
        ])->get();
        $income_week = $orders_week->map(function ($order) {
            return min($order->receivedAmount(), $order->total());
        })->sum();


        $orders_month = Order::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->get();
        $income_month = $orders_month->map(function ($order) {
            return min($order->receivedAmount(), $order->total());
        })->sum();


        $total_income = Order::all()->map(function ($order) {
            return min($order->receivedAmount(), $order->total());
        })->sum();

        $lowProductOrder = $this->findLowestOrderedProduct();
        $predicted_income_next_week = $this->predictNextWeekIncome();
        $suggestion = $this->suggestion($income_month, $lowProductOrder);
        $isMonthEnd = now()->isLastOfMonth();

        return view('home', [
            'orders_count' => Order::count(),
            'income_today' => $income_today,
            'income_week' => $income_week,
            'income_month' => $income_month,
            'total_income' => $total_income,
            'customers_count' => Customer::count(),
            'products_count' => Product::count(),
            'latest_orders' => Order::orderBy('created_at', 'desc')->take(5)->get(),
            'predicted_income_next_week' => $predicted_income_next_week,
            'suggestion' => $suggestion,
            'isMonthEnd' => $isMonthEnd,
          ]);
        }
    }


    private function predictNextWeekIncome()
    {
        $currentYear = now()->year;
        $currentWeek = now()->week;

        $weeklySales = Order::join('order_items', 'orders.id', '=', 'order_items.order_id')
            ->selectRaw('YEAR(orders.created_at) as year, WEEK(orders.created_at) as week, SUM(order_items.quantity * order_items.price) as total_sales')
            ->groupBy('year', 'week')
            ->orderBy('year', 'desc')
            ->orderBy('week', 'desc')
            ->take(5)
            ->get()
            ->pluck('total_sales');



        if ($weeklySales->count() < 2) {
            return null;
        }


        $prediction = $weeklySales->avg();


        $isHolidaySeason = ($currentWeek == 51 || $currentWeek == 52);
        if ($isHolidaySeason) {
            $prediction *= 1.2;
        }

        return $prediction;
    }
            public function suggestion($income_month, $lowProductOrder)
            {
                $suggestion = "";


                if ($income_month > 20000 && $lowProductOrder) {
                    $suggestion = "You need to focus on boosting the sales of low-performing products, such as '{$lowProductOrder->name}', to maintain consistent growth.";
                } elseif ($income_month <= 20000 && $lowProductOrder) {
                    $suggestion = "Consider promoting products with lower orders, like '{$lowProductOrder->name}', to improve your sales and income.";
                } elseif ($income_month > 20000) {
                    $suggestion = "Your sales performance is strong, but there's always room for improvement. Keep up the good work!";
                } else {
                    $suggestion = "Work on strategies to improve your overall income and product sales. Look into new marketing or promotional activities.";
                }

                return $suggestion;
            }

       private function findLowestOrderedProduct()
        {
        $lowestOrderedProduct = Product::join('order_items', 'products.id', '=', 'order_items.product_id')
            ->selectRaw('products.id, products.name, COUNT(order_items.id) as total_orders')
            ->groupBy('products.id', 'products.name')
            ->orderBy('total_orders', 'asc')
            ->first();

        return $lowestOrderedProduct;
        }

}
