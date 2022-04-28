<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Http\Request;

class CartItemController extends Controller
{

    public function index()
    {
        if (auth()->check()) {
            $carts = CartItem::where('user_id', auth()->id())->with('product')->get();
            dd($carts);
        }
    }

    public function store(Request $request)
    {
        if (auth()->check()) {
            $productId = $request->product_id;
            $cart = CartItem::where('product_id', $productId)->first();
            if ($cart) {
                $cart->quantity = $request->quantity;
                $cart->total = $request->total;
                $cart->update();
            } else {
                $cart = CartItem::create([
                    "product_id" => $request->product_id,
                    "user_id" => $request->user_id,
                    "total" => $request->total,
                    "quantity" => $request->quantity,
                ]);
            }
            return back();
        } else {
            dd('hit');
        }
    }
}
