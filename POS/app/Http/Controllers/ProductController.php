<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($category)
    {
        return view('products', compact('category'));
    }
}
