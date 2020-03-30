<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductSearchRequest;
use App\Products;

class ProductsController extends Controller
{
    public function show()
    {
        $products = Products::with('price')->paginate(5);
        return view('products', compact('products'));
    }

    public function search(ProductSearchRequest $request)
    {
        //$products = Products::search($request)->paginate(5);
        $products = Products::search($request);
        return view('products', compact('products', 'request'));
    }
}
