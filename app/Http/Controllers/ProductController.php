<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        return view('products.index');
    }

    public function show(Product $product)
    {
        $product->load('productCategory');
        return view('products.show', compact('product'));
    }
}
