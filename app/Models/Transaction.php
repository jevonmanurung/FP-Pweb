<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    public function users(){
        return $this->belongsTo(User::class, 'user_id');  
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'transactions_products', 'transaction_id', 'product_id')->withPivot('quantity');
    }

    protected $fillable = [
        'cust_name',
        'cust_email',
        'total_amount',
        'payment_method',
        'user_id',
    ];
}