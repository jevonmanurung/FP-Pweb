@extends('layouts.sidebar')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-4" style="font-size: 32px;">Edit Product</h1>

    <!-- Product Form -->
    <form action="{{ route('product.updates', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Product Name -->
        <div class="mb-3">
            <label for="product_name" class="form-label" style="font-size: 18px;">Product Name</label>
            <input 
                type="text" 
                class="form-control @error('product_name') is-invalid @enderror" 
                id="product_name" 
                name="product_name" 
                value="{{ $product->product_name }}" 
                placeholder="Enter product name" 
                required
            >
            @error('product_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Product Price -->
        <div class="mb-3">
            <label for="price" class="form-label" style="font-size: 18px;">Price</label>
            <input 
                type="number" 
                class="form-control @error('price') is-invalid @enderror" 
                id="price" 
                name="price" 
                value="{{ $product->price }}" 
                placeholder="Enter product price" 
                required
            >
            @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Product Image -->
        <div class="mb-3">
            <label for="product_img" class="form-label" style="font-size: 18px;">Product Image</label>
            <input 
                type="file" 
                class="form-control @error('product_img') is-invalid @enderror" 
                id="product_img" 
                name="product_img"
            >
            @error('product_img')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Product Description -->
        <div class="mb-3">
            <label for="product_desc" class="form-label" style="font-size: 18px;">Product Description</label>
            <textarea 
                class="form-control @error('product_desc') is-invalid @enderror" 
                id="product_desc" 
                name="product_desc" 
                rows="4" 
                placeholder="Enter product description"
                required
            >{{ $product->product_desc }}</textarea>
            @error('product_desc')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="text-center">
            <button type="submit" class="btn btn-success px-5 py-2" style="font-size: 18px;">
                Edit Product
            </button>
        </div>
    </form>
</div>
@endsection
