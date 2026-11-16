@extends('layouts.app')

@section('title', 'Shopping Cart - WinkCart')

@section('content')
<div class="container my-4">
    <h2>Your Shopping Cart</h2>

    @if($cartItems->count() > 0)
        <div class="row">
            <!-- Cart Items -->
            <div class="col-lg-8">
                @foreach($cartItems as $item)
                <div class="cart-item">
                    <div class="d-flex align-items-center">
                        @if($item->product->image)
                            <img src="{{ $item->product->image }}" alt="{{ $item->product->name }}" width="80" height="80" class="me-3">
                        @else
                            <div class="bg-light d-flex align-items-center justify-content-center me-3" style="width:80px;height:80px;">
                                <i class="fas fa-image text-muted"></i>
                            </div>
                        @endif
                        
                        <div class="flex-grow-1">
                            <h6>{{ $item->product->name }}</h6>
                            <p class="text-muted small">{{ $item->product->category }}</p>
                            <p class="fw-bold">${{ number_format($item->product->getFinalPrice(), 2) }} each</p>
                        </div>
                        
                        <div class="text-center mx-3">
                            <form method="POST" action="{{ route('cart.update', $item->id) }}" class="d-inline">
                                @csrf
                                @method('PATCH')
                                <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" max="10" class="form-control" style="width:80px;" onchange="this.form.submit()">
                            </form>
                        </div>
                        
                        <div class="text-center mx-3">
                            <div class="fw-bold">${{ number_format($item->product->getFinalPrice() * $item->quantity, 2) }}</div>
                        </div>
                        
                        <form method="POST" action="{{ route('cart.remove', $item->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Remove this item?')">
                                Remove
                            </button>
                        </form>
                    </div>
                </div>
                @endforeach
                
                <div class="mt-4">
                    <a href="{{ route('search') }}" class="btn btn-outline-primary">Continue Shopping</a>
                </div>
            </div>
            
            <!-- Cart Summary -->
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Order Summary</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <span>Subtotal:</span>
                            <span class="fw-bold">${{ number_format($total, 2) }}</span>
                        </div>
                        
                        <div class="d-flex justify-content-between mb-3">
                            <span>Shipping:</span>
                            <span class="text-success">FREE</span>
                        </div>
                        
                        <hr>
                        
                        <div class="d-flex justify-content-between mb-4">
                            <h5>Total:</h5>
                            <h5 class="text-primary">${{ number_format($total, 2) }}</h5>
                        </div>
                        
                        @auth
                            <a href="{{ route('cart.checkout') }}" class="btn btn-primary w-100">Proceed to Checkout</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary w-100">Login to Checkout</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    @else
        <!-- Empty Cart -->
        <div class="text-center py-5">
            <h3>Your cart is empty</h3>
            <p class="text-muted">Add some products to your cart to get started.</p>
            <a href="{{ route('search') }}" class="btn btn-primary">Start Shopping</a>
        </div>
    @endif
</div>
@endsection