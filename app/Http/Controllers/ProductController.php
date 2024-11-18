<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Product;
use Illuminate\View\View;

class ProductController extends Controller
{

    public function index(): View
    {
        $products = Product::all(); // Fetch all products from the database
        return view('products.index', compact('products'));
    }

 
    public function create(): View
    {
        return view('products.create');
    }

  
    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        Product::create($input);
        return redirect('products')->with('flash_message', 'Product Added!');
    }

    public function show(string $id): View
    {
        $products = Product::find($id);
        return view('products.show')->with('products', $products);
    }

    public function edit(string $id): View
    {
        $products = Product::find($id);
        return view('products.edit')->with('products', $products)
    }

    public function update(Request $request, string $id): RedirectResponse
    {
       
    }

    
    public function destroy(string $id): RedirectResponse
    {
       
    }
}