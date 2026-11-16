

<?php $__env->startSection('title', 'Checkout - WinkCart'); ?>

<?php $__env->startSection('content'); ?>
<div class="container my-4">
    <div class="row">
        <div class="col-12">
            <h2 class="fw-bold mb-4">
                <i class="fas fa-credit-card me-2"></i>Checkout
            </h2>
        </div>
    </div>

    <div class="row">
        <!-- Checkout Form -->
        <div class="col-lg-8">
            <form method="POST" action="<?php echo e(route('cart.place-order')); ?>">
                <?php echo csrf_field(); ?>
                
                <!-- Customer Information -->
                <div class="card shadow-modern mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">
                            <i class="fas fa-user me-2"></i>Customer Information
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Full Name *</label>
                                <input type="text" name="customer_name" class="form-control" 
                                       value="<?php echo e(auth()->user()->name); ?>" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email Address *</label>
                                <input type="email" name="customer_email" class="form-control" 
                                       value="<?php echo e(auth()->user()->email); ?>" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Phone Number *</label>
                                <input type="tel" name="customer_phone" class="form-control" 
                                       value="<?php echo e(auth()->user()->phone); ?>" required>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Shipping Address -->
                <div class="card shadow-modern mb-4">
                    <div class="card-header bg-secondary text-white">
                        <h5 class="mb-0">
                            <i class="fas fa-map-marker-alt me-2"></i>Shipping Address
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Complete Address *</label>
                            <textarea name="address" class="form-control" rows="3" 
                                      placeholder="Enter your complete shipping address" required><?php echo e(auth()->user()->address); ?></textarea>
                        </div>
                    </div>
                </div>

                <!-- Payment Method -->
                <div class="card shadow-modern mb-4">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0">
                            <i class="fas fa-credit-card me-2"></i>Payment Method
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment_method" 
                                           id="cash_on_delivery" value="cash_on_delivery" checked>
                                    <label class="form-check-label" for="cash_on_delivery">
                                        <i class="fas fa-money-bill-wave me-2"></i>Cash on Delivery
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment_method" 
                                           id="credit_card" value="credit_card" disabled>
                                    <label class="form-check-label text-muted" for="credit_card">
                                        <i class="fas fa-credit-card me-2"></i>Credit Card (Coming Soon)
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment_method" 
                                           id="paypal" value="paypal" disabled>
                                    <label class="form-check-label text-muted" for="paypal">
                                        <i class="fab fa-paypal me-2"></i>PayPal (Coming Soon)
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Notes -->
                <div class="card shadow-modern mb-4">
                    <div class="card-header bg-info text-white">
                        <h5 class="mb-0">
                            <i class="fas fa-sticky-note me-2"></i>Order Notes (Optional)
                        </h5>
                    </div>
                    <div class="card-body">
                        <textarea name="notes" class="form-control" rows="3" 
                                  placeholder="Any special instructions for your order..."></textarea>
                    </div>
                </div>

                <!-- Place Order Button -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="fas fa-shopping-cart me-2"></i>Place Order
                    </button>
                </div>
            </form>
        </div>

        <!-- Order Summary -->
        <div class="col-lg-4">
            <div class="card shadow-modern">
                <div class="card-header bg-warning text-dark">
                    <h5 class="mb-0">
                        <i class="fas fa-receipt me-2"></i>Order Summary
                    </h5>
                </div>
                <div class="card-body">
                    <?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom">
                        <div class="d-flex align-items-center">
                            <?php if($item->product->image): ?>
                                <img src="<?php echo e($item->product->image); ?>" alt="<?php echo e($item->product->name); ?>" 
                                     class="rounded" style="width: 50px; height: 50px; object-fit: cover;">
                            <?php else: ?>
                                <div class="bg-light rounded d-flex align-items-center justify-content-center" 
                                     style="width: 50px; height: 50px;">
                                    <i class="fas fa-image text-muted"></i>
                                </div>
                            <?php endif; ?>
                            <div class="ms-3">
                                <h6 class="mb-0"><?php echo e(Str::limit($item->product->name, 30)); ?></h6>
                                <small class="text-muted">Qty: <?php echo e($item->quantity); ?></small>
                            </div>
                        </div>
                        <span class="fw-bold">$<?php echo e(number_format($item->total, 2)); ?></span>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <div class="d-flex justify-content-between mb-2">
                        <span>Subtotal:</span>
                        <span class="fw-bold">$<?php echo e(number_format($total, 2)); ?></span>
                    </div>
                    
                    <div class="d-flex justify-content-between mb-2">
                        <span>Shipping:</span>
                        <span class="text-success">FREE</span>
                    </div>
                    
                    <div class="d-flex justify-content-between mb-2">
                        <span>Tax (8%):</span>
                        <span>$<?php echo e(number_format($total * 0.08, 2)); ?></span>
                    </div>
                    
                    <hr>
                    
                    <div class="d-flex justify-content-between mb-3">
                        <h5 class="fw-bold">Total:</h5>
                        <h5 class="fw-bold text-primary">$<?php echo e(number_format($total + ($total * 0.08), 2)); ?></h5>
                    </div>

                    <!-- Security Features -->
                    <div class="mt-4">
                        <h6 class="fw-bold mb-3">Why Shop With Us?</h6>
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <i class="fas fa-shield-alt text-success me-2"></i>
                                Secure Checkout
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-truck text-primary me-2"></i>
                                Free Shipping
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-undo text-warning me-2"></i>
                                30-Day Returns
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-headset text-info me-2"></i>
                                24/7 Support
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\ecommerce-platform\resources\views/cart/checkout.blade.php ENDPATH**/ ?>