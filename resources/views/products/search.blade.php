@extends('layouts.app')

@section('title', 'Search Products - WinkCart')

@section('content')
<div class="container my-4">
    <!-- Simple Search Header -->
    <div class="row mb-4">
        <div class="col-12">
            <h2>Products
                @if($query)
                    - Search: "{{ $query }}"
                @endif
            </h2>
            
            <!-- Simple Search Form -->
            <form method="GET" action="{{ route('search') }}" class="row g-3 mt-2">
                <div class="col-md-6">
                    <input type="text" class="form-control" name="q" value="{{ request('q') }}" placeholder="Search products...">
                </div>
                <div class="col-md-3">
                    <select class="form-control" name="category">
                        <option value="">All Categories</option>
                        <option value="Electronics" {{ request('category') == 'Electronics' ? 'selected' : '' }}>Electronics</option>
                        <option value="Fashion" {{ request('category') == 'Fashion' ? 'selected' : '' }}>Fashion</option>
                        <option value="Home & Garden" {{ request('category') == 'Home & Garden' ? 'selected' : '' }}>Home & Garden</option>
                        <option value="Sports" {{ request('category') == 'Sports' ? 'selected' : '' }}>Sports</option>
                        <option value="Books" {{ request('category') == 'Books' ? 'selected' : '' }}>Books</option>
                        <option value="Beauty" {{ request('category') == 'Beauty' ? 'selected' : '' }}>Beauty</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary">Search</button>
                    <a href="{{ route('search') }}" class="btn btn-outline-secondary ms-2">Clear</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Products -->
    @if($products->count() > 0)
        <div class="mb-3">
            <p>Found {{ $products->count() }} products</p>
        </div>
        
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
    @else
        <div class="text-center py-5">
            <h4>No products found</h4>
            <p>Try searching for something else.</p>
            <a href="{{ route('home') }}" class="btn btn-primary">Back to Home</a>
        </div>
    @endif
</div>
@endsection