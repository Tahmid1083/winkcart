<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Allow these fields to be filled when creating products
    protected $fillable = [
        'name',
        'description',
        'price',
        'sale_price',
        'image',
        'category',
        'stock_quantity'
    ];

    // Convert price fields to decimal numbers
    protected $casts = [
        'price' => 'decimal:2',
        'sale_price' => 'decimal:2',
    ];

    // Get the cart items for this product
    public function cartItems()
    {
        return $this->hasMany(Cart::class);
    }

    // Get the final price (sale price if available, otherwise regular price)
    public function getFinalPrice()
    {
        if ($this->sale_price) {
            return $this->sale_price;
        }
        return $this->price;
    }

    // Check if product is on sale
    public function isOnSale()
    {
        return $this->sale_price && $this->sale_price < $this->price;
    }
}