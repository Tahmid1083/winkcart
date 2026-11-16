

<?php $__env->startSection('title', 'WinkCart - Simple Shopping'); ?>

<?php $__env->startSection('content'); ?>
<!-- Simple Hero Section -->
<div class="hero-section">
    <div class="container">
        <h1>Welcome to WinkCart!</h1>
        <p>Your simple and easy online shopping experience</p>
        <a href="<?php echo e(route('search')); ?>" class="btn btn-light btn-lg">Start Shopping</a>
    </div>
</div>

<!-- Simple Categories Section -->
<div class="container my-5">
    <h2 class="text-center mb-4">Shop by Category</h2>
    
    <div class="category-grid">
        <a href="<?php echo e(route('search')); ?>?category=Electronics" class="category-item">
            <div class="category-icon">
                <i class="fas fa-laptop"></i>
            </div>
            <h5>Electronics</h5>
            <p>Phones, Laptops & More</p>
        </a>
        
        <a href="<?php echo e(route('search')); ?>?category=Fashion" class="category-item">
            <div class="category-icon">
                <i class="fas fa-tshirt"></i>
            </div>
            <h5>Fashion</h5>
            <p>Clothes & Accessories</p>
        </a>
        
        <a href="<?php echo e(route('search')); ?>?category=Home & Garden" class="category-item">
            <div class="category-icon">
                <i class="fas fa-home"></i>
            </div>
            <h5>Home & Garden</h5>
            <p>Furniture & Decor</p>
        </a>
        
        <a href="<?php echo e(route('search')); ?>?category=Sports" class="category-item">
            <div class="category-icon">
                <i class="fas fa-dumbbell"></i>
            </div>
            <h5>Sports</h5>
            <p>Sports Equipment</p>
        </a>
        
        <a href="<?php echo e(route('search')); ?>?category=Books" class="category-item">
            <div class="category-icon">
                <i class="fas fa-book"></i>
            </div>
            <h5>Books</h5>
            <p>Books & Media</p>
        </a>
        
        <a href="<?php echo e(route('search')); ?>?category=Beauty" class="category-item">
            <div class="category-icon">
                <i class="fas fa-spa"></i>
            </div>
            <h5>Beauty</h5>
            <p>Beauty Products</p>
        </a>
    </div>
</div>

<!-- Featured Products -->
<?php if($products->count() > 0): ?>
<div class="container my-5">
    <h2 class="text-center mb-4">Our Products</h2>
    
    <div class="product-grid">
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card product-card">
            <?php if($product->image): ?>
                <img src="<?php echo e($product->image); ?>" class="card-img-top" alt="<?php echo e($product->name); ?>">
            <?php else: ?>
                <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                    <i class="fas fa-image fa-3x text-muted"></i>
                </div>
            <?php endif; ?>
            
            <div class="card-body">
                <h6 class="card-title"><?php echo e($product->name); ?></h6>
                <p class="text-muted small"><?php echo e($product->category); ?></p>
                <p class="card-text"><?php echo e(Str::limit($product->description, 80)); ?></p>
                
                <div class="mb-3">
                    <?php if($product->isOnSale()): ?>
                        <span class="price-sale">$<?php echo e(number_format($product->sale_price, 2)); ?></span>
                        <small class="price-original ms-2">$<?php echo e(number_format($product->price, 2)); ?></small>
                    <?php else: ?>
                        <span class="fw-bold">$<?php echo e(number_format($product->price, 2)); ?></span>
                    <?php endif; ?>
                </div>
                
                <div class="d-grid gap-2">
                    <a href="<?php echo e(route('product.show', $product->id)); ?>" class="btn btn-outline-primary">
                        View Details
                    </a>
                    <form method="POST" action="<?php echo e(route('cart.add')); ?>">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="btn btn-primary w-100">
                            Add to Cart
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    
    <div class="text-center mt-4">
        <a href="<?php echo e(route('search')); ?>" class="btn btn-primary btn-lg">View All Products</a>
    </div>
</div>
<?php endif; ?>

<!-- Simple Call to Action -->
<div class="bg-light py-5">
    <div class="container text-center">
        <h3>Ready to Start Shopping?</h3>
        <p class="text-muted">Find great products at amazing prices!</p>
        <?php if(auth()->guard()->guest()): ?>
            <a href="<?php echo e(route('register')); ?>" class="btn btn-primary me-2">Create Account</a>
            <a href="<?php echo e(route('search')); ?>" class="btn btn-outline-primary">Browse Products</a>
        <?php else: ?>
            <a href="<?php echo e(route('search')); ?>" class="btn btn-primary">Continue Shopping</a>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\ecommerce-platform\resources\views/home.blade.php ENDPATH**/ ?>