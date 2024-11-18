<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Student;
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
        
    }

  
    public function store(Request $request): RedirectResponse
    {
        
    }

    public function show(string $id): View
    {
        
    }

    public function edit(string $id): View
    {
        
    }

    public function update(Request $request, string $id): RedirectResponse
    {
       
    }

    
    public function destroy(string $id): RedirectResponse
    {
       
    }
}