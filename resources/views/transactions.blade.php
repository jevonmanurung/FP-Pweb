@extends('layouts.sidebar')

@section('content')
<div class="container">
    {{-- <h1>All Transactions</h1> --}}

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>All Transactions</h1>
        <a href="{{ route('transactions.create') }}" class="btn btn-primary">Add New Transaction</a>
    </div>

    @if ($transactions->isEmpty())
        <p>No transactions found.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Transaction ID</th>
                    <th>Customer Name</th>
                    <th>Customer Email</th>
                    <th>Products</th>
                    <th>Total Amount</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->id }}</td>
                        <td>{{ $transaction->cust_name }}</td>
                        <td>{{ $transaction->cust_email }}</td>
                        <td>
                            <ul>
                                @foreach ($transaction->products as $product)
                                    <li>{{ $product->product_name }} (x{{ $product->pivot->quantity }})</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>Rp{{ number_format($transaction->total_amount, 2) }}</td>
                        <td>{{ $transaction->created_at->format('d-m-Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
