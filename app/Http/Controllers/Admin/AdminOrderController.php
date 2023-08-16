<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminOrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        $orders->load('orderItems');
        $orders->load('user');

        return view('authoried.order.index')->with('orders', $orders);
    }
}
