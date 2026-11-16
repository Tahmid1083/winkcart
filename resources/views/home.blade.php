@extends('layouts.app')

@section('title', 'WinkCart - Simple Shopping')

@section('content')
<!-- Simple Hero Section -->
<div class="hero-section">
    <div class="container">
        <h1>Welcome to WinkCart!</h1>
        <p>Your simple and easy online shopping experience</p>
        <a href="{{ route('search') }}" class="btn btn-light btn-lg">Start Shopping</a>
    </div>
</div>

<!-- Simple Categories Section -->
<div class="container my-5">
    <h2 class="text-center mb-4">Shop by Category</h2>
    
    <div class="category-grid">
        <a href="{{ route('search') }}?category=Electronics" class="category-item">
            <div class="category-icon">
                <i class="fas fa-laptop"></i>
            </div>
            <h5>Electronics</h5>
            <p>Phones, Laptops & More</p>
        </a>
        
        <a href="{{ route('search') }}?category=Fashion" class="category-item">
            <div class="category-icon">
                <i class="fas fa-tshirt"></i>
            </div>
            <h5>Fashion</h5>
            <p>Clothes & Accessories</p>
        </a>
        
        <a href="{{ route('search') }}?category=Home & Garden" class="category-item">
            <div class="category-icon">
                <i class="fas fa-home"></i>
            </div>
            <h5>Home & Garden</h5>
            <p>Furniture & Decor</p>
        </a>
        
        <a href="{{ route('search') }}?category=Sports" class="category-item">
            <div class="category-icon">
                <i class="fas fa-dumbbell"></i>
            </div>
            <h5>Sports</h5>
            <p>Sports Equipment</p>
        </a>
        
        <a href="{{ route('search') }}?category=Books" class="category-item">
            <div class="category-icon">
                <i class="fas fa-book"></i>
            </div>
            <h5>Books</h5>
            <p>Books & Media</p>
        </a>
        
        <a href="{{ route('search') }}?category=Beauty" class="category-item">
            <div class="category-icon">
                <i class="fas fa-spa"></i>
            </div>
            <h5>Beauty</h5>
            <p>Beauty Products</p>
        </a>
    </div>
</div>

<!-- Featured Products -->
@if($products->count() > 0)
<div class="container my-5">
    <h2 class="text-center mb-4">Our Products</h2>
    
    <div class="product-grid">
        @foreach($products as $product)
        <div class="card product-card">
            @if($product->image)
                <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}">
            @else
                <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                    <i class="fas fa-image fa-3x text-muted"></i>
                </div>
            @endif
            
            <div class="card-body">
                <h6 class="card-title">{{ $product->name }}</h6>
                <p class="text-muted small">{{ $product->category }}</p>
                <p class="card-text">{{ Str::limit($product->description, 80) }}</p>
                
                <div class="mb-3">
                    @if($product->isOnSale())
                        <span class="price-sale">${{ number_format($product->sale_price, 2) }}</span>
                        <small class="price-original ms-2">${{ number_format($product->price, 2) }}</small>
                    @else
                        <span class="fw-bold">${{ number_format($product->price, 2) }}</span>
                    @endif
                </div>
                
                <div class="d-grid gap-2">
                    <a href="{{ route('product.show', $product->id) }}" class="btn btn-outline-primary">
                        View Details
                    </a>
                    <form method="POST" action="{{ route('cart.add') }}">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="btn btn-primary w-100">
                            Add to Cart
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    
    <div class="text-center mt-4">
        <a href="{{ route('search') }}" class="btn btn-primary btn-lg">View All Products</a>
    </div>
</div>
@endif

<!-- Simple Call to Action -->
<div class="bg-light py-5">
    <div class="container text-center">
        <h3>Ready to Start Shopping?</h3>
        <p class="text-muted">Find great products at amazing prices!</p>
        @guest
            <a href="{{ route('register') }}" class="btn btn-primary me-2">Create Account</a>
            <a href="{{ route('search') }}" class="btn btn-outline-primary">Browse Products</a>
        @else
            <a href="{{ route('search') }}" class="btn btn-primary">Continue Shopping</a>
        @endguest
    </div>
</div>
@endsection