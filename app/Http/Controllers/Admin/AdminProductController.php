<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public function index(): View
    {
        return view('admin.products.index');
    }

    public function create(): View
    {
        return view('admin.products.create');
    }

    public function store()
    {
    }

    public function edit(Product $product): View
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update()
    {
    }
}
