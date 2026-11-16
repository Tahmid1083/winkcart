<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    // Allow these fields to be filled when creating cart items
    protected $fillable = [
        'user_id',
        'session_id',
        'product_id',
        'quantity'
    ];

    // Get the user who owns this cart item
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Get the product in this cart item
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Calculate total price for this cart item
    public function getTotal()
    {
        return $this->quantity * $this->product->getFinalPrice();
    }

    // Add accessor for total attribute
    public function getTotalAttribute()
    {
        return $this->getTotal();
    }
}