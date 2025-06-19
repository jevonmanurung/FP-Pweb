@extends('layouts.sidebar')

@section('content')
<div class="container py-5">
<div class="form-group mb-3">
        <label for="cust_name">Name:</label>
        <input type="text" name="cust_name" id="cust_name" class="form-control" required>
    </div>
    <div class="form-group mb-3">
        <label for="cust_email">Email:</label>
        <input type="email" name="cust_email" id="cust_email" class="form-control" required>
    </div>
    <input type="hidden" name="payment_method" value="Unknown">
    <h1 class="text-center mb-4" style="font-size: 32px;">Product List</h1>

    <!-- Product List -->
    <form action="{{ route('transactions.submit') }}" method="POST">
        @csrf
        <div class="row">
            @forelse($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img 
                            src="{{ asset('storage/' . $product->product_img) }}" 
                            class="card-img-top" 
                            alt="{{ $product->product_name }}"
                        >
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->product_name }}</h5>
                            <p class="card-text">{{ $product->product_desc }}</p>
                            <p class="card-text"><strong>Price:</strong> ${{ $product->price }}</p>
                            <!-- Quantity Input -->
                            <div class="form-group">
                                <label for="quantity_{{ $product->id }}">Quantity:</label>
                                <input 
                                    type="number" 
                                    name="quantities[{{ $product->id }}]" 
                                    id="quantity_{{ $product->id }}" 
                                    class="form-control" 
                                    min="0" 
                                    value="0"
                                >
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p>No products available.</p>
                </div>
            @endforelse
        </div>

        <!-- Submit Button -->
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-success px-5 py-2" style="font-size: 18px;">Submit</button>
        </div>
    </form>
</div>
@endsection