<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
    // Get all products from the database
    $products = Product::all();

    // Pass the products to the view
    return view('view_product', compact('products'));
    }

    public function showAdd()
    {
        return view('addproducts');
    }

    public function showEdit($product_id)
    {
        $product = Product::findOrFail($product_id);
        return view('edit_product', compact('product'));
    }

    public function store(Request $request)
    {
        // Validate request
        $validated = $request->validate([
            'product_name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'product_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'product_desc' => 'required|string',
        ]);
    
        // Handle image upload if exists
        if ($request->hasFile('product_img')) {
            $imageFile = $request->file('product_img');
            $imageData = file_get_contents($imageFile); // Save the image path in the validated array
            $validated['product_img'] = $imageData;
        }
    
        // Create a new product
        Product::create($validated);
    
        return redirect()->route('product.index')->with('success', 'Product added successfully!');
    }
    

    public function update(Request $request, $id)
    {
        // Validate the request
        $validated = $request->validate([
            'product_name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'product_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'product_desc' => 'required|string',
        ]);
    
        // Find the product
        $product = Product::findOrFail($id);
    
        // Handle image upload
        if ($request->hasFile('product_img')) {
            // Delete old image if it exists
            if ($product->product_img && \Storage::exists($product->product_img)) {
                \Storage::delete($product->product_img);
            }
    
            $imagePath = $request->file('product_img')->store('public/products');
            $validated['product_img'] = $imagePath;
        }
    
        // Update the product
        $product->update($validated);
    
        return redirect()->route('product.index')->with('success', 'Product updated successfully!');
    }
    

    public function destroy(Product $product)
    {
    // Check if the product has an associated image and delete it from storage
    if ($product->product_img) {
        Storage::delete($product->product_img);
    }

    // Delete the product from the database
    $product->delete();

    // Redirect to the products index page with a success message
    return redirect()->route('view_product')->with('success', 'Product deleted successfully!');
    }

        public function buy($id)
    {
        // Retrieve the product from the database
        $product = Product::findOrFail($id);

        // Return the view with the product details
        return view('buy_product', compact('product'));
    }

    public function productlist()
    {
        $products = Product::all(); // Fetch all products
        return view('productlist', compact('products'));
    }

    public function getImage($id)
    {
        $product = Product::find($id);

        if (!$product) {
            abort(404, 'Product not found');
        }

        // Convert image to base64 for embedding in the view
        $imageBase64 = base64_encode($product->product_img);
        $imageSrc = 'data:image/jpeg;base64,' . $imageBase64;
    }
    


}
