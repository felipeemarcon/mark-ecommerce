<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $products = Product::latest()->paginate(12);
        return view('home', compact('products'));
    }
}
