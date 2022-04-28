<?php

namespace App\View\Components;

use App\Models\MainCategory;
use Illuminate\View\Component;

class CategoryDropdown extends Component
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
        $categories = MainCategory::with('subCategories')->get();
        return view('components.category-dropdown', ['categories' => $categories]);
    }
}
