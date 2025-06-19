<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    // Display the transaction form
    public function create()
    {
        // Get all products and users to populate the form options
        $products = Product::all();
        

        return view('transactionscreate', compact('products'));
    }

    // Store a new transaction
    public function submit(Request $request)
    {
        $request->validate([
            'cust_name' => 'required|string|max:255',
            'cust_email' => 'required|email|max:255',
            'quantities' => 'required|array',
        ]);
    
        $quantities = $request->input('quantities', []);
        $products = collect();
        $totalAmount = 0;
    
        foreach ($quantities as $productId => $quantity) {
            if ($quantity > 0) {
                $product = Product::find($productId);
                if ($product) {
                    $products->push([
                        'product_id' => $productId,
                        'quantity' => $quantity,
                    ]);
                    $totalAmount += $product->price * $quantity;
                }
            }
        }
    
        if ($products->isEmpty()) {
            return redirect()->route('transactions.index')->with('error', 'No products selected.');
        }
    
        // Create the transaction
        $transaction = Transaction::create([
            'cust_name' => $request->cust_name,
            'cust_email' => $request->cust_email,
            'total_amount' => $totalAmount,
            'payment_method' => $request->payment_method ?? 'Unknown', // Add a payment method field to the form if needed
            'user_id' => Auth::user()->id,
        ]);
    
        // Attach products to the transaction
        foreach ($products as $productData) {
            $transaction->products()->attach($productData['product_id'], ['quantity' => $productData['quantity']]);
        }
    
        return redirect()->route('transactions.index')->with('success', 'Transaction successfully created.');
    }


    // Display all transactions
    public function index()
    {
        $transactions = Transaction::with(['users', 'products'])->get();
        
        return view('transactions', compact('transactions'));
    }
}
