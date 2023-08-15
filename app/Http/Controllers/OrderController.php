<?php

namespace App\Http\Controllers;

use App\Enums\PaymentMethod;
use App\Enums\OrderStatus;
use App\Http\Requests\Order\OrderRequest;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    const ORDER_STATUS_DEFAULT = OrderStatus::WAITING;
    private function getPaymentStatusOnStore($paymentMethods)
    {
        switch ($paymentMethods) {
            case PaymentMethod::CASH:
                return false;
            case PaymentMethod::VISA_CARD:
                return true;
            default:
                return true;
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $user->load('cartItems');
        $user->load('contacts');
        $paymentMethods = PaymentMethod::$types;

        if ($user->cartItems->count() <= 0) {
            return redirect()->back()->with('fail', trans('order.create.cart.required'));
        }

        return view('order.create')->with(['user' => $user, 'paymentMethods' => $paymentMethods]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        $request->validated();
        $user = Auth::user()->load('cartItems');

        if ($user->cartItems->count() <= 0) {
            return redirect()->back()->with('fail', trans('order.store.fail'));
        }

        DB::transaction(function () use ($request, $user) {
            $order = new Order;
            $order->user_id = Auth::id();
            $order->contact_id = $request["contact_id"];
            $order->save();

            foreach ($user->cartItems as $item) {
                $orderItem = new OrderItem;
                $orderItem->order_id = $order->id;
                $orderItem->product_id = $item->product_id;
                $orderItem->quantity = $item->quantity;
                $orderItem->payment_method = $request["payment_method"];
                $orderItem->status = self::ORDER_STATUS_DEFAULT;
                $orderItem->payment_status = $this->getPaymentStatusOnStore($request["payment_method"]);
                $orderItem->save();
            };

            CartItem::destroy($user->cartItems->pluck('id'));
        });

        return redirect(route('products.index'))->with('success', trans('order.store.success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
