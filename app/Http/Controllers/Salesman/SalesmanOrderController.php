<?php

namespace App\Http\Controllers\Salesman;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalesmanOrderController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $user->load('products.orderItems.order');

        $uniqueOrderItemByProduct = $user->products->map(function ($product) {
            return $product->orderItems->unique('order_id')->all();
        });

        $orders = $uniqueOrderItemByProduct->collapse()->map(function ($product) {
            return $product->order;
        });

        return view('authoried.order.index')->with('orders', $orders);
    }
}
