<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Student;
use Illuminate\View\View;

class StudentController extends Controller
{

    public function index(): View
    {
        $products = Product::all();
        return view ('products.index')->with('products', $products);
    }

 
    public function create(): View
    {
        return view('products.create');
    }

  
    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        Product::create($input);
        return redirect('products')->with('flash_message', 'Product Addedd!');
    }

    public function show(string $id): View
    {
        $products = Product::find($id);
        return view('products.show')->with('products', $products);
    }

    public function edit(string $id): View
    {
        $products = Product::find($id);
        return view('products.edit')->with('products', $products);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $products = Product::find($id);
        $input = $request->all();
        $products->update($input);
        return redirect('products')->with('flash_message', 'products Updated!');  
    }

    
    public function destroy(string $id): RedirectResponse
    {
        Product::destroy($id);
        return redirect('products')->with('flash_message', 'products deleted!'); 
    }
}