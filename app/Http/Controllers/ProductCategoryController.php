<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function index()
    {
        // $categories = ProductCategory::all();
        $categories = ProductCategory::with('products')->get();

        return view('products_categories.index', compact('categories'));
    }

    public function show(string $category_id)
    {
        // dd($category_id);
        $category = ProductCategory::with('products')->find($category_id);
        dd($category->toArray());
    }
}
