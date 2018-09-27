<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        if (request()->category) {
            $products = Product::with('categories')->whereHas('categories', function ($query) {
                $query->where('slug', request()->category);
            })->get();
            $categories = Category::all();
            $categoryName = $categories->where('slug', request()->category)->first()->name;
        } else {
            // $products = Product::where('featured', true);
            $products = Product::inRandomOrder()->get();
            $categories = Category::all();
            $categoryName = 'Featured';
        }

        if (request()->sort == 'low_high') {
            $products = $products->sortBy('price');
        } elseif (request()->sort == 'high_low') {
            $products = $products->sortByDesc('price');
        }

        return view('shop')->with([
            'products' => $products,
            'categories' => $categories,
            'categoryName' => $categoryName,
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //
        $product = Product::where('slug', $slug)->firstOrFail();
        $productRelates = Product::where('slug', '!=', $slug)->inRandomOrder()->take(8)->get();
        $categories = $product->categories;
        return view('products-detail')->with([
            'product' => $product,
            'productRelates' => $productRelates,
            'categories' => $categories,
        ]);

    }

}
