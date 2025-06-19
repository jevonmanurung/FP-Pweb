@extends('layouts.sidebar')

@section('content')
<div class="container">
    <h1>Create Transaction</h1>

    <!-- Display Validation Errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('transactions.submit') }}" method="POST">
        @csrf

        <!-- User ID from session -->
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

        <!-- Customer Name -->
        <div class="mb-3">
            <label for="cust_name" class="form-label">Customer Name</label>
            <input type="text" id="cust_name" name="cust_name" class="form-control" value="{{ old('cust_name') }}" required>
        </div>

        <!-- Customer Email -->
        <div class="mb-3">
            <label for="cust_email" class="form-label">Customer Email</label>
            <input type="email" id="cust_email" name="cust_email" class="form-control" value="{{ old('cust_email') }}" required>
        </div>

        <!-- Payment Method -->
        <div class="mb-3">
            <label for="payment_method" class="form-label">Payment Method</label>
            <select id="payment_method" name="payment_method" class="form-control">
                <option value="Cash">Cash</option>
                <option value="Credit Card">Credit Card</option>
                <option value="Bank Transfer">Bank Transfer</option>
                <option value="E-Wallet">E-Wallet</option>
            </select>
        </div>

        <!-- Products Selection -->
        <div class="mb-3">
            <h3>Products</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->product_name }}</td>
                            <td>
                                <input type="number" name="quantities[{{ $product->id }}]" class="form-control" min="0" value="0">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection