<?php

namespace App\View\Components;

use App\Models\CartItem;
use Illuminate\View\Component;

class CartIcon extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $cart = CartItem::where('user_id', auth()->id())->count();
        return view('components.cart-icon', ["cart" => $cart]);
    }
}
