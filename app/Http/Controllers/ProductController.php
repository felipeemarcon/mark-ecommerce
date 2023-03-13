<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(): View
    {
        return view('products.index');
    }

    public function show(Request $request): View
    {
        $productId = $request->id;
        $product = Product::findOrFail($productId);

        return view('products.show', ['product' => $product]);
    }
}
