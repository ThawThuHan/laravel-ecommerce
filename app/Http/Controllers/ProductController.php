<?php

namespace App\Http\Controllers;

use App\Models\MainCategory;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('subCategory')->get();
        return view('admin.product.index', ['products' => $products]);
    }

    public function create()
    {
        return view('admin.product.create', [
            'mainCategories' => MainCategory::all(),
        ]);
    }

    public function store(Request $request)
    {
        $formData = $request->validate([
            'name' => 'required|unique:products',
            'description' => 'required',
            'sub_category_id' => 'required',
            'images' => 'required|min:1|max:5',
            'price' => 'required',
            'stock' => '',
        ], [
            'images.max' => "Only allow 5 images!"
        ]);
        $images = [];
        foreach ($request->images as $file) {
            $path = $file->store('products');
            $images[] = $path;
        }
        $formData['images'] = implode(",", $images);

        Product::create($formData);

        return back()->with('status', 'Create product successfully!');
    }

    public function show(Product $product)
    {
    }

    public function edit(Product $product)
    {
        $mainCategories = MainCategory::all();
        return view('admin.product.edit', [
            'product' => $product,
            'mainCategories' => $mainCategories,
        ]);
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'sub_category_id' => 'required',
            'images' => 'max:5',
            'price' => 'required',
        ], [
            'images.max' => "Only allow 5 images!"
        ]);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->sub_category_id = $request->sub_category_id;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->images = $request->old_images;
        if ($request->images) {
            Storage::delete(explode(",", $request->old_images));
            $images = [];
            foreach ($request->images as $file) {
                $path = $file->store('products');
                $images[] = $path;
            }
            $product->images = implode(',', $images);
        }

        if ($product->update()) {
            return redirect()->route('products.index');
        }

        return back()->with('status', 'Something Wrong!');
    }

    public function destroy(Product $product)
    {
        $images = explode(",", $product->images);
        Storage::delete($images);
        $product->delete();
        return back();
    }
}
