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
        dd($categories->toArray());
    }
}
