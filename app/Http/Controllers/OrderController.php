<?php

namespace App\Http\Controllers;

use App\Order;
use App\Cart;
use Illuminate\Http\Request;

class OrderController extends Controller
{
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'shipping_fullname'=> 'required',
            'shipping_state'=> 'required',
            'shipping_city'=> 'required',
            'shipping_address'=> 'required',
            'shipping_zipcode'=> 'required',
            'shipping_phone'=> 'required',
            'payment_method'=> 'required',
        ]);

        $order = new Order;
        $order->order_no = uniqid('OrderNumber-');

        $order->shipping_fullname = $request->input('shipping_fullname');
        $order->shipping_state = $request->input('shipping_state');
        $order->shipping_city = $request->input('shipping_city');
        $order->shipping_address = $request->input('shipping_address');
        $order->shipping_phone = $request->input('shipping_phone');
        $order->shipping_zipcode = $request->input('shipping_zipcode');

        $order->grand_total = Cart::where('user_id', auth()->id())->sum('price');
        $order->item_count = Cart::where('user_id', auth()->id())->sum('quantity');
        //$order->status = 'pending';
        $order->user_id = auth()->id();

        if(request('payment_method') == 'paypal') {
            $order->payment_method = 'paypal';
        }

        if (!$request->has('billing_fullname')) {
            $order->billing_fullname = $request->input('shipping_fullname');
            $order->billing_state = $request->input('shipping_state');
            $order->billing_city = $request->input('shipping_city');
            $order->billing_address = $request->input('shipping_address');
            $order->billing_phone = $request->input('shipping_phone');
            $order->billing_zipcode = $request->input('shipping_zipcode');
        } else {
            $order->billing_fullname = $request->input('billing_fullname');
            $order->billing_state = $request->input('billing_state');
            $order->billing_city = $request->input('billing_city');
            $order->billing_address = $request->input('billing_address');
            $order->billing_phone = $request->input('billing_phone');
            $order->billing_zipcode = $request->input('billing_zipcode');
        }


        $order->save();

        $cartItems = Cart::where('user_id', auth()->id())->get();

        foreach($cartItems as $item) {
            $order->items()->attach($item->product_id, ['price'=> $item->price, 'quantity'=> $item->quantity]);
        }

        //Payment
        if(request('payment_method') == 'paypal') {
            return redirect()->route('paypal.checkout', $order->id);
        }

        Cart::where('user_id', auth()->id())->delete();

        //dd('order created', $order);
        return redirect()->route('home')->withMessage('Order Completed');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
