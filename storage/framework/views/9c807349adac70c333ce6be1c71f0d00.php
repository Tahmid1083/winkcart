

<?php $__env->startSection('title', 'Search Products - WinkCart'); ?>

<?php $__env->startSection('content'); ?>
<div class="container my-4">
    <!-- Simple Search Header -->
    <div class="row mb-4">
        <div class="col-12">
            <h2>Products
                <?php if($query): ?>
                    - Search: "<?php echo e($query); ?>"
                <?php endif; ?>
            </h2>
            
            <!-- Simple Search Form -->
            <form method="GET" action="<?php echo e(route('search')); ?>" class="row g-3 mt-2">
                <div class="col-md-6">
                    <input type="text" class="form-control" name="q" value="<?php echo e(request('q')); ?>" placeholder="Search products...">
                </div>
                <div class="col-md-3">
                    <select class="form-control" name="category">
                        <option value="">All Categories</option>
                        <option value="Electronics" <?php echo e(request('category') == 'Electronics' ? 'selected' : ''); ?>>Electronics</option>
                        <option value="Fashion" <?php echo e(request('category') == 'Fashion' ? 'selected' : ''); ?>>Fashion</option>
                        <option value="Home & Garden" <?php echo e(request('category') == 'Home & Garden' ? 'selected' : ''); ?>>Home & Garden</option>
                        <option value="Sports" <?php echo e(request('category') == 'Sports' ? 'selected' : ''); ?>>Sports</option>
                        <option value="Books" <?php echo e(request('category') == 'Books' ? 'selected' : ''); ?>>Books</option>
                        <option value="Beauty" <?php echo e(request('category') == 'Beauty' ? 'selected' : ''); ?>>Beauty</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary">Search</button>
                    <a href="<?php echo e(route('search')); ?>" class="btn btn-outline-secondary ms-2">Clear</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Products -->
    <?php if($products->count() > 0): ?>
        <div class="mb-3">
            <p>Found <?php echo e($products->count()); ?> products</p>
        </div>
        
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
    <?php else: ?>
        <div class="text-center py-5">
            <h4>No products found</h4>
            <p>Try searching for something else.</p>
            <a href="<?php echo e(route('home')); ?>" class="btn btn-primary">Back to Home</a>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\ecommerce-platform\resources\views/products/search.blade.php ENDPATH**/ ?>