<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request): View
    {
        $products = Product::query();
        $products->when($request->search, fn ($query, $value) => $query->where('name', 'like', "%$value%"));
        $products = $products->latest()->paginate(12);

        return view('home', compact('products'));
    }
}
