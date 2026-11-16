@extends('layouts.app')

@section('title', 'Manage Products - WinkCart Admin')

@section('content')
<div class="container-fluid my-4">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3">
            <div class="admin-sidebar">
                <h5 class="text-light mb-4">
                    <i class="fas fa-cogs me-2"></i>Admin Panel
                </h5>
                <nav class="nav flex-column">
                    <a class="nav-link" href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                    </a>
                    <a class="nav-link active" href="{{ route('admin.products.index') }}">
                        <i class="fas fa-box me-2"></i>Products
                    </a>
                    <a class="nav-link" href="{{ route('admin.orders.index') }}">
                        <i class="fas fa-shopping-cart me-2"></i>Orders
                    </a>
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="fas fa-eye me-2"></i>View Store
                    </a>
                </nav>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-9">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bold">Manage Products</h2>
                <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Add New Product
                </a>
            </div>

            <!-- Products Table -->
            <div class="card shadow-modern">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">
                        <i class="fas fa-list me-2"></i>All Products ({{ $products->count() }})
                    </h5>
                </div>
                <div class="card-body">
                    @if($products->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Price</th>
                                        <th>Stock</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                    <tr>
                                        <td>
                                            @if($product->image)
                                                <img src="{{ $product->image }}" alt="{{ $product->name }}" 
                                                     class="rounded" style="width: 50px; height: 50px; object-fit: cover;">
                                            @else
                                                <div class="bg-light rounded d-flex align-items-center justify-content-center" 
                                                     style="width: 50px; height: 50px;">
                                                    <i class="fas fa-image text-muted"></i>
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <h6 class="mb-0">{{ $product->name }}</h6>
                                            <small class="text-muted">ID: {{ $product->id }}</small>
                                        </td>
                                        <td>
                                            <span class="badge bg-secondary">{{ $product->category }}</span>
                                        </td>
                                        <td>
                                            @if($product->sale_price)
                                                <span class="text-danger fw-bold">${{ number_format($product->sale_price, 2) }}</span><br>
                                                <small class="text-muted text-decoration-line-through">${{ number_format($product->price, 2) }}</small>
                                            @else
                                                <span class="fw-bold">${{ number_format($product->price, 2) }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($product->stock_quantity > 10)
                                                <span class="badge bg-success">{{ $product->stock_quantity }}</span>
                                            @elseif($product->stock_quantity > 0)
                                                <span class="badge bg-warning">{{ $product->stock_quantity }}</span>
                                            @else
                                                <span class="badge bg-danger">Out of Stock</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('product.show', $product->id) }}" 
                                                   class="btn btn-sm btn-outline-primary" target="_blank">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.products.edit', $product->id) }}" 
                                                   class="btn btn-sm btn-outline-secondary">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form method="POST" action="{{ route('admin.products.delete', $product->id) }}" 
                                                      class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger" 
                                                            onclick="return confirm('Delete this product?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-box-open fa-4x text-muted mb-3"></i>
                            <h4>No Products Found</h4>
                            <p class="text-muted">Start by adding your first product to the store.</p>
                            <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus me-2"></i>Add Your First Product
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection