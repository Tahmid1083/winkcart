

<?php $__env->startSection('title', 'Shopping Cart - WinkCart'); ?>

<?php $__env->startSection('content'); ?>
<div class="container my-4">
    <h2>Your Shopping Cart</h2>

    <?php if($cartItems->count() > 0): ?>
        <div class="row">
            <!-- Cart Items -->
            <div class="col-lg-8">
                <?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="cart-item">
                    <div class="d-flex align-items-center">
                        <?php if($item->product->image): ?>
                            <img src="<?php echo e($item->product->image); ?>" alt="<?php echo e($item->product->name); ?>" width="80" height="80" class="me-3">
                        <?php else: ?>
                            <div class="bg-light d-flex align-items-center justify-content-center me-3" style="width:80px;height:80px;">
                                <i class="fas fa-image text-muted"></i>
                            </div>
                        <?php endif; ?>
                        
                        <div class="flex-grow-1">
                            <h6><?php echo e($item->product->name); ?></h6>
                            <p class="text-muted small"><?php echo e($item->product->category); ?></p>
                            <p class="fw-bold">$<?php echo e(number_format($item->product->getFinalPrice(), 2)); ?> each</p>
                        </div>
                        
                        <div class="text-center mx-3">
                            <form method="POST" action="<?php echo e(route('cart.update', $item->id)); ?>" class="d-inline">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PATCH'); ?>
                                <input type="number" name="quantity" value="<?php echo e($item->quantity); ?>" min="1" max="10" class="form-control" style="width:80px;" onchange="this.form.submit()">
                            </form>
                        </div>
                        
                        <div class="text-center mx-3">
                            <div class="fw-bold">$<?php echo e(number_format($item->product->getFinalPrice() * $item->quantity, 2)); ?></div>
                        </div>
                        
                        <form method="POST" action="<?php echo e(route('cart.remove', $item->id)); ?>">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Remove this item?')">
                                Remove
                            </button>
                        </form>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                <div class="mt-4">
                    <a href="<?php echo e(route('search')); ?>" class="btn btn-outline-primary">Continue Shopping</a>
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
                            <span class="fw-bold">$<?php echo e(number_format($total, 2)); ?></span>
                        </div>
                        
                        <div class="d-flex justify-content-between mb-3">
                            <span>Shipping:</span>
                            <span class="text-success">FREE</span>
                        </div>
                        
                        <hr>
                        
                        <div class="d-flex justify-content-between mb-4">
                            <h5>Total:</h5>
                            <h5 class="text-primary">$<?php echo e(number_format($total, 2)); ?></h5>
                        </div>
                        
                        <?php if(auth()->guard()->check()): ?>
                            <a href="<?php echo e(route('cart.checkout')); ?>" class="btn btn-primary w-100">Proceed to Checkout</a>
                        <?php else: ?>
                            <a href="<?php echo e(route('login')); ?>" class="btn btn-primary w-100">Login to Checkout</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
        <!-- Empty Cart -->
        <div class="text-center py-5">
            <h3>Your cart is empty</h3>
            <p class="text-muted">Add some products to your cart to get started.</p>
            <a href="<?php echo e(route('search')); ?>" class="btn btn-primary">Start Shopping</a>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xampp\htdocs\ecommerce-platform\resources\views/cart/index.blade.php ENDPATH**/ ?>