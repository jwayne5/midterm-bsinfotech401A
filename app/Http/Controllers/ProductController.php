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
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|integer',
        'description' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate the image
    ]);

    $imagePath = null;

    // Check if an image was uploaded
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public'); // Save to 'storage/app/public/images'
    }

    // Save the product with the image path
    Product::create(array_merge($validated, ['image' => $imagePath]));

    return redirect('products')->with('flash_message', 'Product Added!');
}

    public function show(string $id): View
    {
        $products = Product::find($id);
        return view('products.view')->with('products', $products);
    }

    public function edit(string $id): View
    {
        $products = Product::find($id);
        return view('products.edit')->with('products', $products);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate the image
        ]);
    
        $product = Product::find($id);
    
        // Check if a new image was uploaded
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($product->image) {
                \Storage::disk('public')->delete($product->image);
            }
    
            // Store the new image
            $validated['image'] = $request->file('image')->store('images', 'public');
        } else {
            // If no image was uploaded, do not include the image field in the update
            unset($validated['image']);
        }
    
        // Update the product with the validated data
        $product->update($validated);
    
        return redirect('products')->with('flash_message', 'Product Updated!');
    }

    
    public function destroy(string $id): RedirectResponse
    {
        Product::destroy($id);
        return redirect('products')->with('flash_message', 'Product deleted!');
    }
}