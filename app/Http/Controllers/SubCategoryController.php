<?php

namespace App\Http\Controllers;

use App\Models\MainCategory;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SubCategoryController extends Controller
{
    public function index(MainCategory $category)
    {
        $subCategories = $category->subCategories;
        return view('admin.sub-category.index', [
            'mainCategory' => $category,
            'subCategories' => $subCategories,
        ]);
    }

    public function create(MainCategory $category)
    {
        return view('admin.sub-category.create', ['mainCategory' => $category]);
    }

    public function store(Request $request, MainCategory $category)
    {
        $formData = $request->validate([
            'name' => ['required', Rule::unique('sub_categories', 'name')]
        ], [
            'name.required' => "Category name is required!",
        ]);

        $category->subCategories()->create($formData);
        return back()->with('status', 'Sub-Category Added!');
    }

    public function edit(SubCategory $sub_category)
    {
        return view('admin.sub-category.edit', ['subCategory' => $sub_category]);
    }

    public function update(Request $request, SubCategory $sub_category)
    {
        $request->validate([
            'name' => ['required', Rule::unique('sub_categories', 'name')]
        ], [
            'name.required' => "Category name is required!",
        ]);
        $sub_category->name = $request->name;
        $sub_category->update();
        return redirect()->route('category.sub-category.index', $sub_category->main_category_id);
    }

    public function destroy(SubCategory $sub_category)
    {
        $sub_category->delete();
        return back()->with('status', "$sub_category->name is Deleted!");
    }

    public function getSubCategory()
    {
        if (isset($_GET['cid'])) {
            $cid = $_GET['cid'];
            $main = MainCategory::find($cid);
            $value = $main->subCategories;
            return json_encode([
                'message' => 'success',
                'value' => $value,
            ]);
        } else {
            return json_encode([
                'message' => 'fail',
                'value' => '',
            ]);
        }
    }
}
