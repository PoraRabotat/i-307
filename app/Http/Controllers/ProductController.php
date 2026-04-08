<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('products.index', compact('products'));
    }
    public function create(){
        return view('products.create');
    }
    public function store(Product $product, Request $request){
        $data = $request->validate([
            'title' => 'string|required',
            'description' => 'string|required',
            'price' => 'required|decimal:0,2'
        ]);
        $product->create($data);
        return redirect()->back();
    }

    public function show(Product $product){
        return view('products.show', compact('product'));
    }

    public function edit(Product $product) {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'title' => 'string|required',
            'description' => 'string|required',
            'price' => 'required|decimal:0,2'
        ]);
        $product->update($data);
        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back();
    }
}
