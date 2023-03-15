<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
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

    public function store(Request $request): RedirectResponse
    {
        $title = $request->title;

        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'stock' => 'numeric|nullable',
            'price' => 'required|numeric',
            'image' => 'image|nullable'
        ]);

        if (!empty($data['image']) && $data['image']->isValid()) {
            $data['image'] = $this::storageImage($data['image']);
        }

        $data['slug'] = Str::slug($title);

        Product::create($data);

        return Redirect::route('admin.products');
    }

    public function edit(Product $product): View
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Product $product, Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title' => 'required|string',
            'stock' => 'numeric|nullable',
            'price' => 'required|integer',
            'image' => 'image|nullable',
            'description' => 'required|string',
        ]);

        if (!empty($data['image']) && $data['image']->isValid()) {
            $data['image'] = $this::storageImage($data['image']);
        }

        $product->fill($data);
        $product->save();

        return Redirect::route('admin.products');
    }

    static private function storageImage($image): String
    {
        $image_path = $image->store('products', 'public');
        return $image_path;
    }
}
