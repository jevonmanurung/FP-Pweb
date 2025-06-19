<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Define the table associated with the Product model (optional, Laravel assumes plural form)
    protected $table = 'products';

    // Define the fillable fields (which can be mass assigned)
    protected $fillable = [
        'product_name',
        'price',
        'product_img',
        'product_desc',
    ];

    // Optionally, you can define casting for fields, especially for things like price
    protected $casts = [
        'product_price' => 'decimal:2',
    ];

    // If you have accessor methods for any fields, define them here
    // Example: Accessor for formatted price
    public function getFormattedPriceAttribute()
    {
        return 'Rp ' . number_format($this->product_price, 0, ',', '.');
    }

    public function transactions()
    {
        return $this->belongsToMany(Transaction::class, 'transactions_products', 'product_id', 'transaction_id')->withPivot('quantity');
    }
}
