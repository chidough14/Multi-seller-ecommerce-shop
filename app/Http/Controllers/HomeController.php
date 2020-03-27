<?php

namespace App\Http\Controllers;

use App\Product;
use App\Cart;
use TCG\Voyager\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::take(8)->get();

        $categories = Category::whereNull('parent_id')->get();
        //dd($categories);

        $totalitems = Cart::where('user_id', auth()->id())->sum('quantity');

        return view('home', ['allProducts'=> $products, 'totalitems'=> $totalitems, 'categories'=> $categories]);
    }
}
