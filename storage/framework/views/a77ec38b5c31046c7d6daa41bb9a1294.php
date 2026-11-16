

<?php $__env->startSection('title', $product->name . ' - WinkCart'); ?>

<?php $__env->startSection('content'); ?>
<div class="container my-4">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(route('search')); ?>?category=<?php echo e($product->category); ?>"><?php echo e($product->category); ?></a></li>
            <li class="breadcrumb-item active"><?php echo e($product->name); ?></li>
        </ol>
    </nav>

    <div class="row">
        <!-- Product Image -->
        <div class="col-lg-6 mb-4">
            <div class="card border-0 shadow-modern">
                <?php if($product->image): ?>
                    <img src="<?php echo e($product->image); ?>" class="card-img-top rounded-modern" alt="<?php echo e($product->name); ?>" style="height: 500px; object-fit: cover;">
                <?php else: ?>
                    <div class="card-img-top bg-light d-flex align-items-center justify-content-center rounded-modern" style="height: 500px;">
                        <i class="fas fa-image fa-5x text-muted"></i>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Product Details -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-modern p-4">
                <h1 class="fw-bold mb-3"><?php echo e($product->name); ?></h1>
                
                <!-- Category -->
                <p class="text-muted mb-3">
                    <i class="fas fa-tag me-2"></i><?php echo e($product->category); ?>

                </p>

                <!-- Rating -->
                <div class="mb-3">
                    <div class="rating d-inline-block">
                        <?php for($i = 1; $i <= 5; $i++): ?>
                            <?php if($i <= $product->rating): ?>
                                <i class="fas fa-star"></i>
                            <?php else: ?>
                                <i class="far fa-star"></i>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </div>
                    <span class="ms-2 text-muted">(<?php echo e($product->rating); ?> / 5.0)</span>
                </div>

                <!-- Price -->
                <div class="price-section mb-4">
                    <?php if($product->sale_price): ?>
                        <h2 class="price-sale mb-0">$<?php echo e(number_format($product->sale_price, 2)); ?></h2>
                        <p class="price-original mb-0">$<?php echo e(number_format($product->price, 2)); ?></p>
                        <small class="text-success fw-bold">You save $<?php echo e(number_format($product->price - $product->sale_price, 2)); ?> (<?php echo e($product->discount_percentage); ?>%)</small>
                    <?php else: ?>
                        <h2 class="fw-bold text-primary mb-0">$<?php echo e(number_format($product->price, 2)); ?></h2>
                    <?php endif; ?>
                </div>

                <!-- Stock Status -->
                <div class="mb-4">
                    <?php if($product->stock_quantity > 0): ?>
                        <span class="badge bg-success fs-6">
                            <i class="fas fa-check me-2"></i>In Stock (<?php echo e($product->stock_quantity); ?> available)
                        </span>
                    <?php else: ?>
                        <span class="badge bg-danger fs-6">
                            <i class="fas fa-times me-2"></i>Out of Stock
                        </span>
                    <?php endif; ?>
                </div>

                <!-- Description -->
                <div class="mb-4">
                    <h5 class="fw-bold">Description</h5>
                    <p class="text-muted"><?php echo e($product->description); ?></p>
                </div>

                <!-- Add to Cart Form -->
                <?php if($product->stock_quantity > 0): ?>
                <form method="POST" action="<?php echo e(route('cart.add')); ?>" class="mb-4">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                    
                    <div class="row g-3 align-items-end">
                        <div class="col-4">
                            <label class="form-label fw-bold">Quantity</label>
                            <select name="quantity" class="form-select">
                                <?php for($i = 1; $i <= min(10, $product->stock_quantity); $i++): ?>
                                    <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="col-8">
                            <button type="submit" class="btn btn-primary btn-lg w-100">
                                <i class="fas fa-shopping-cart me-2"></i>Add to Cart
                            </button>
                        </div>
                    </div>
                </form>
                <?php endif; ?>

                <!-- Action Buttons -->
                <div class="d-grid gap-2 d-md-flex">
                    <button class="btn btn-outline-danger" onclick="addToWishlist(<?php echo e($product->id); ?>)">
                        <i class="fas fa-heart me-2"></i>Add to Wishlist
                    </button>
                    <button class="btn btn-outline-secondary" onclick="shareProduct()">
                        <i class="fas fa-share me-2"></i>Share
                    </button>
                </div>

                <!-- Product Features -->
                <div class="mt-4">
                    <h6 class="fw-bold">Why Choose This Product?</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-truck text-success me-2"></i>Free shipping on orders over $50</li>
                        <li class="mb-2"><i class="fas fa-undo text-primary me-2"></i>30-day return policy</li>
                        <li class="mb-2"><i class="fas fa-shield-alt text-warning me-2"></i>1 year warranty included</li>
                        <li class="mb-2"><i class="fas fa-headset text-info me-2"></i>24/7 customer support</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Related Products -->
    <?php if($relatedProducts->count() > 0): ?>
    <div class="mt-5">
        <h3 class="fw-bold mb-4">Related Products</h3>
        <div class="row">
            <?php $__currentLoopData = $relatedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relatedProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card product-card hover-shadow">
                    <div class="position-relative">
                        <?php if($relatedProduct->image): ?>
                            <img src="<?php echo e($relatedProduct->image); ?>" class="card-img-top" alt="<?php echo e($relatedProduct->name); ?>" style="height: 200px; object-fit: cover;">
                        <?php else: ?>
                            <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                                <i class="fas fa-image fa-2x text-muted"></i>
                            </div>
                        <?php endif; ?>
                        
                        <?php if($relatedProduct->discount_percentage > 0): ?>
                            <span class="discount-badge">-<?php echo e($relatedProduct->discount_percentage); ?>%</span>
                        <?php endif; ?>
                    </div>
                    
                    <div class="card-body">
                        <h6 class="card-title"><?php echo e(Str::limit($relatedProduct->name, 40)); ?></h6>
                        
                        <div class="price-section mb-3">
                            <?php if($relatedProduct->sale_price): ?>
                                <span class="price-sale">$<?php echo e(number_format($relatedProduct->sale_price, 2)); ?></span>
                                <small class="price-original ms-2">$<?php echo e(number_format($relatedProduct->price, 2)); ?></small>
                            <?php else: ?>
                                <span class="fw-bold">$<?php echo e(number_format($relatedProduct->price, 2)); ?></span>
                            <?php endif; ?>
                        </div>
                        
                        <div class="d-grid">
                            <a href="<?php echo e(route('product.show', $relatedProduct->id)); ?>" class="btn btn-outline-primary btn-sm">
                                View Product
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <?php endif; ?>
</div>

<?php $__env->startPush('scripts'); ?>
<script>
function addToWishlist(productId) {
    // Placeholder for wishlist functionality
    alert('Wishlist feature coming soon!');
}

function shareProduct() {
    if (navigator.share) {
        navigator.share({
            title: '<?php echo e($product->name); ?>',
            text: 'Check out this amazing product on WinkCart!',
            url: window.location.href
        });
    } else {
        // Fallback to copying URL
        navigator.clipboard.writeText(window.location.href).then(function() {
            alert('Product URL copied to clipboard!');
        });
    }
}
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\ecommerce-platform\resources\views/products/show.blade.php ENDPATH**/ ?>