<?php

namespace App\Http\Controllers;

use App\Models\MainCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class MainCategoryController extends Controller
{
    public function index()
    {
        $mainCategories = MainCategory::with('subCategories')->get();
        return view('admin.category.index', ['mainCategories' => $mainCategories]);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $formData = $request->validate([
            'name' => ['required', Rule::unique('main_categories', 'name')],
            'image' => 'required',
        ], [
            'name.required' => "Category name is required!",
        ]);
        $formData['image'] = $request->image->store('MainCategories');
        MainCategory::create($formData);
        return back()->with('status', 'Category Added!');
    }

    public function edit(MainCategory $category)
    {
        // dd($mainCategory);
        return view('admin.category.edit', ['mainCategory' => $category]);
    }

    public function update(MainCategory $category, Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'old_image' => "",
            'image' => "",
        ]);
        $category->image = $request->old_image;
        if ($request->image) {
            Storage::delete($category->image);
            $category->image = $request->image->store('MainCategories');
        }
        $category->name = $request->name;
        $category->update();
        return redirect()->route('category.index');
    }

    public function destroy(MainCategory $category)
    {
        Storage::delete($category->image);
        $category->delete();
        return back()->with('status', 'Category Deleted!');
    }
}
