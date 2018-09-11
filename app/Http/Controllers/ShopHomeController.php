<?php

namespace App\Http\Controllers;

use App\Product;

class ShopHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::inRandomOrder()->take(8)->get();
        return view('home')->with('products', $products);
    }

}
