<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class AdminProductController extends Controller
{
    public function index(): View
    {
        $products = Product::latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function create(): View
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $title = $request->title;

        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'stock' => 'numeric',
            'price' => 'required|numeric',
            'image' => 'image'
        ]);

        $image = $data['image'];
        $image_path = $image->store('products', 'public');

        $data['image'] = $image_path;

        $data['slug'] = Str::slug($title);

        Product::create($data);

        return Redirect::route('admin.products_home');
    }

    public function edit(Product $product): View
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update()
    {
    }
}
