<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add(Product $product) {




        Cart::create([
           'product_id'=> $product->id,
           'name'=> $product->name,
           'price'=> $product->price,
           'quantity'=> 1,
           'user_id'=> auth()->id()
        ]);

        $totalitems = Cart::where('user_id', auth()->id())->sum('quantity');
        //return view('cart.index', compact('totalitems'));
        $totalprice = Cart::where('user_id', auth()->id())->sum('price');


        return redirect()->route('cart.index', ['totalitems'=> $totalitems, 'totalprice'=> $totalprice]);
    }

    public function index () {
        $cart = Cart::where('user_id', auth()->id())->get();

        $totalitems = Cart::where('user_id', auth()->id())->sum('quantity');
        $totalprice = Cart::where('user_id', auth()->id())->sum('price');
        //return view('cart.index', compact('totalitems'));

        return view('cart.index', compact('cart', 'totalitems', 'totalprice'));
    }

    public function destroy ($id) {
        Cart::where('id', $id)
               ->delete();
        $totalitems = Cart::where('user_id', auth()->id())->sum('quantity');

        $totalprice = Cart::where('user_id', auth()->id())->sum('price');

        return redirect()->back()->with(['totalitems', $totalitems, 'totalprice'=> $totalprice]);
    }

    public function update ($cartId) {
        $cart  = Cart::find($cartId);
        $cartprice = ($cart->price / $cart->quantity) * request('quantity');

        Cart::where('id', $cartId)
                ->update([
                    'quantity'=> request('quantity'),
                    'price'=>$cartprice
                ]);

        $totalitems = Cart::where('user_id', auth()->id())->sum('quantity');

        $totalprice = Cart::where('user_id', auth()->id())->sum('price');


        return redirect()->back()->with(['totalitems', $totalitems, 'totalprice'=> $totalprice]);
    }


    public function checkout () {
        $totalitems = Cart::where('user_id', auth()->id())->sum('quantity');
        return view('cart.checkout', ['totalitems'=> $totalitems]);
    }
}
