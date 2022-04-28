<?php

namespace App\Http\Controllers;

use App\Models\MainCategory;
use App\Models\Product;
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
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $latestProducts = Product::latest()->take(5)->get();
        $appleProducts = MainCategory::where('name', 'Apple')->first()->products()->take(5)->get();
        $popularProducts = Product::orderBy('order_count', 'asc')->take(5)->get();
        return view('home', [
            'latest' => $latestProducts,
            'apple' => $appleProducts,
            'popular' => $popularProducts,
        ]);
    }

    public function getProductByCategory(MainCategory $category)
    {
        $subCategories = $category->subCategories->load('products');
        return view('main-category', ["subCategories" => $subCategories]);
    }

    public function detailProduct(Product $product)
    {
        return view('detail-product', ['product' => $product]);
    }
}
