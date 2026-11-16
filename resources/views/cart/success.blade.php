@extends('layouts.app')

@section('title', 'Order Placed Successfully - WinkCart')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Success Message -->
            <div class="card shadow-modern border-0">
                <div class="card-body text-center p-5">
                    <div class="mb-4">
                        <i class="fas fa-check-circle fa-5x text-success"></i>
                    </div>
                    
                    <h1 class="fw-bold mb-3 text-success">Order Placed Successfully!</h1>
                    <p class="lead mb-4">Thank you for your order. We've received your request and will process it soon.</p>
                    
                    <!-- Order Details -->
                    <div class="card bg-light border-0 mb-4">
                        <div class="card-body">
                            <div class="row text-start">
                                <div class="col-md-6">
                                    <h6 class="fw-bold">Order Number:</h6>
                                    <p class="mb-2">{{ $order->order_number }}</p>
                                    
                                    <h6 class="fw-bold">Customer Name:</h6>
                                    <p class="mb-2">{{ $order->customer_name }}</p>
                                    
                                    <h6 class="fw-bold">Email:</h6>
                                    <p class="mb-0">{{ $order->customer_email }}</p>
                                </div>
                                <div class="col-md-6">
                                    <h6 class="fw-bold">Order Total:</h6>
                                    <p class="mb-2 text-primary fs-5 fw-bold">${{ number_format($order->total, 2) }}</p>
                                    
                                    <h6 class="fw-bold">Status:</h6>
                                    <span class="badge bg-warning fs-6">{{ ucfirst($order->status) }}</span>
                                    
                                    <h6 class="fw-bold mt-3">Order Date:</h6>
                                    <p class="mb-0">{{ $order->created_at->format('M d, Y h:i A') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Order Items -->
                    <div class="card border-0 mb-4">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">
                                <i class="fas fa-box me-2"></i>Items Ordered
                            </h5>
                        </div>
                        <div class="card-body">
                            @if(is_array($order->items))\n                                @foreach($order->items as $item)\n                                <div class="d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom">\n                                    <div class="d-flex align-items-center">\n                                        @if(isset($item['product']['image']))\n                                            <img src="{{ $item['product']['image'] }}" alt="{{ $item['product']['name'] }}" \n                                                 class="rounded" style="width: 60px; height: 60px; object-fit: cover;">\n                                        @else\n                                            <div class="bg-light rounded d-flex align-items-center justify-content-center" \n                                                 style="width: 60px; height: 60px;">\n                                                <i class="fas fa-image text-muted"></i>\n                                            </div>\n                                        @endif\n                                        <div class="ms-3 text-start">\n                                            <h6 class="mb-1">{{ $item['product']['name'] ?? 'Product' }}</h6>\n                                            <small class="text-muted">Quantity: {{ $item['quantity'] ?? 1 }}</small>\n                                        </div>\n                                    </div>\n                                    <span class="fw-bold">${{ number_format($item['total'] ?? 0, 2) }}</span>\n                                </div>\n                                @endforeach\n                            @endif
                        </div>
                    </div>
                    
                    <!-- What's Next -->
                    <div class="card bg-info text-white border-0 mb-4">
                        <div class="card-body">
                            <h5 class="fw-bold mb-3">
                                <i class="fas fa-info-circle me-2"></i>What Happens Next?
                            </h5>
                            <div class="row text-start">
                                <div class="col-md-4 mb-3">
                                    <div class="text-center">
                                        <i class="fas fa-envelope fa-2x mb-2"></i>
                                        <h6>Email Confirmation</h6>
                                        <small>You'll receive an order confirmation email shortly</small>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="text-center">
                                        <i class="fas fa-box-open fa-2x mb-2"></i>
                                        <h6>Processing</h6>
                                        <small>We'll prepare your items for shipment</small>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="text-center">
                                        <i class="fas fa-shipping-fast fa-2x mb-2"></i>
                                        <h6>Delivery</h6>
                                        <small>Your order will be delivered within 3-5 business days</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="d-flex flex-column flex-md-row gap-3 justify-content-center">
                        <a href="{{ route('home') }}" class="btn btn-primary btn-lg">
                            <i class="fas fa-home me-2"></i>Continue Shopping
                        </a>
                        <button class="btn btn-outline-primary btn-lg" onclick="window.print()">
                            <i class="fas fa-print me-2"></i>Print Order
                        </button>
                        <button class="btn btn-outline-secondary btn-lg" onclick="shareOrder()">
                            <i class="fas fa-share me-2"></i>Share Order
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
function shareOrder() {
    const orderData = {
        title: 'My Order from WinkCart',
        text: 'I just placed an order on WinkCart! Order #{{ $order->order_number }}',
        url: window.location.href
    };
    
    if (navigator.share) {
        navigator.share(orderData);
    } else {
        // Fallback to copying URL
        navigator.clipboard.writeText(window.location.href).then(function() {
            alert('Order URL copied to clipboard!');
        });
    }
}
</script>
@endpush
@endsection