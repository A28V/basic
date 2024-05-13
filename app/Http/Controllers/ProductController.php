<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Color;
use App\Models\Size;    
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {   
        $products = Product::with('color', 'size')->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $colors = Color::all();
        $sizes = Size::all();
        return view('products.create', compact('colors', 'sizes'));
    }

    public function store(Request $request)
    {   
        // Validation
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image',
            'color_id' => 'required|exists:colors,id',
            'size_id' => 'required|exists:sizes,id',
        ]);

        // Create Product
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        // Handle image upload if necessary
        $product->image = $request->file('image') ? $request->file('image')->store('images') : null;
        $product->color_id = $request->color_id;
        $product->size_id = $request->size_id;
        $product->save();

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $colors = Color::all();
        $sizes = Size::all();
        return view('products.edit', compact('product', 'colors', 'sizes'));
    }

    public function update(Request $request, Product $product)
    {
        // Validation
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image',
            'color_id' => 'required|exists:colors,id',
            'size_id' => 'required|exists:sizes,id',
        ]);

        // Update Product
        $product->name = $request->name;
        $product->description = $request->description;
        // Handle image update if necessary
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($product->image) {
               // Storage::delete($product->image);
            }
            $product->image = $request->file('image')->store('images');
        }
        $product->color_id = $request->color_id;
        $product->size_id = $request->size_id;
        $product->save();

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        // Delete product image if exists
        if ($product->image) {
            Storage::delete($product->image);
        }
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
