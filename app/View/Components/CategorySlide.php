<?php

namespace App\View\Components;

use App\Models\MainCategory;
use Illuminate\View\Component;

class CategorySlide extends Component
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
        return view('components.category-slide', [
            "categories" => MainCategory::all(),
        ]);
    }
}
