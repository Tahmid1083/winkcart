@extends('layouts.app')
@section('title', 'Admin Dashboard')
@section('content')
<div class="container my-4">
    <h2>Admin Dashboard</h2>
    
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5>{{ $stats['total_users'] }}</h5>
                    <p>Total Users</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5>{{ $stats['total_products'] }}</h5>
                    <p>Total Products</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5>{{ $stats['total_orders'] }}</h5>
                    <p>Total Orders</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5>${{ number_format($stats['total_revenue'], 0) }}</h5>
                    <p>Total Revenue</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <h4>Recent Orders</h4>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr><th>Order #</th><th>Customer</th><th>Total</th></tr>
                    </thead>
                    <tbody>
                        @if($recentOrders->count() > 0)
                            @foreach($recentOrders as $order)
                            <tr>
                                <td>{{ $order->order_number }}</td>
                                <td>{{ $order->customer_name }}</td>
                                <td>${{ number_format($order->total, 2) }}</td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="3" class="text-center">No orders yet</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-6">
            <h4>Recent Products</h4>
            @if($topProducts->count() > 0)
                @foreach($topProducts as $product)
                <div class="d-flex mb-2">
                    <img src="{{ $product->image }}" width="50" height="50" class="me-2">
                    <div>
                        <h6>{{ $product->name }}</h6>
                        <small>${{ number_format($product->price, 2) }}</small>
                    </div>
                </div>
                @endforeach
            @else
                <p class="text-muted">No products yet</p>
            @endif
        </div>
    </div>
</div>
@endsection