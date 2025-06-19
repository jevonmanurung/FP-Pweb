@extends('layouts.sidebar')

@section('content')
<div class="container">

    <h1 class="mb-4">View Products</h1>

    <!-- Add Product Button -->
    <a href="{{ route('addproducts') }}" class="btn btn-primary mb-3">Add Product</a>

    <!-- Products Grid -->
    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-3 mb-4">
                <div class="card shadow-sm">
                    <!-- Product Image -->
                    @if ($product->product_img)
                        <img src="{{ route('product.image', $product->id) }}" alt="{{ $product->product_name }}" class="card-img-top" style="height: 150px; object-fit: cover;">

                    @else
                        <div class="card-img-top bg-secondary d-flex align-items-center justify-content-center" style="height: 150px;">
                            <span class="text-white">No Image</span>
                        </div>
                    @endif

                    <div class="card-body">
                        <!-- Product Details -->
                        <h5 class="card-title">{{ $product->product_name }}</h5>
                        <p class="card-text">{{ $product->product_desc }}</p>
                        <p class="card-text text-success"><strong>Rp {{ number_format($product->price, 0, ',', '.') }}</strong></p>

                        <!-- Edit & Delete Buttons -->
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('editproducts', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('product.delete', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
