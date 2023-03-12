<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public function index()
    {
        return view('admin.products.index');
    }

    public function edit()
    {
        return view('admin.products.edit');
    }
}
