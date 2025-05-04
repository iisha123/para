<?php $__env->startSection('title', 'Shop - Para4You'); ?>

<?php $__env->startSection('page_styles'); ?>
<style>
    .product-card {
        border-radius: 12px;
        overflow: hidden;
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    
    .product-card .card-img-container {
        height: 250px;
        overflow: hidden;
        position: relative;
    }
    
    .product-card .card-img-top {
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }
    
    .product-card:hover .card-img-top {
        transform: scale(1.05);
    }
    
    .product-card .card-body {
        flex: 1;
        display: flex;
        flex-direction: column;
    }
    
    .product-card .card-title {
        font-weight: 600;
        margin-bottom: 10px;
        font-size: 1.2rem;
    }
    
    .product-card .card-text {
        color: #6c757d;
        margin-bottom: 15px;
        flex-grow: 1;
    }
    
    .product-card .price {
        font-weight: 700;
        color: var(--primary);
        font-size: 1.25rem;
        margin-bottom: 15px;
        display: block;
    }
    
    .product-card .card-footer {
        border-top: none;
        background: none;
        padding-top: 0;
    }
    
    .category-filter {
        margin-bottom: 40px;
    }
    
    .btn-category {
        padding: 8px 20px;
        margin: 0 5px 10px;
        border-radius: 25px;
        font-weight: 500;
        background-color: #f8f9fa;
        border: 1px solid #dee2e6;
        color: #212529;
        transition: all 0.3s ease;
    }
    
    .btn-category:hover, .btn-category.active {
        background-color: var(--primary);
        border-color: var(--primary);
        color: white;
    }
    
    .shop-header {
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('/img/shop-banner.jpg');
        background-size: cover;
        background-position: center;
        padding: 80px 0;
        margin-bottom: 50px;
        position: relative;
    }
    
    .shop-header h1 {
        color: white;
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 20px;
    }
    
    .shop-header p {
        color: rgba(255, 255, 255, 0.9);
        font-size: 1.2rem;
        max-width: 600px;
        margin: 0 auto;
    }
    
    .product-badge {
        position: absolute;
        top: 10px;
        left: 10px;
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        z-index: 2;
    }
    
    .badge-new {
        background-color: var(--primary);
        color: white;
    }
    
    .badge-sale {
        background-color: #dc3545;
        color: white;
    }
    
    .original-price {
        text-decoration: line-through;
        color: #6c757d;
        font-size: 0.9rem;
        margin-right: 8px;
    }

    /* Cart Form Styles */
    .add-to-cart-form {
        flex: 1;
        margin-right: 10px;
    }

    .input-group {
        max-width: 150px;
    }

    .quantity-input {
        text-align: center;
        border-left: none;
        border-right: none;
        height: 38px;
    }

    .quantity-btn {
        width: 38px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .details-btn {
        align-self: flex-end;
    }

    @media (max-width: 576px) {
        .card-footer {
            flex-direction: column;
        }
        
        .add-to-cart-form {
            margin-right: 0;
            margin-bottom: 10px;
            width: 100%;
        }
        
        .input-group {
            max-width: 100%;
        }
        
        .details-btn {
            width: 100%;
        }
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- Shop Header Section -->
<section class="shop-header text-center">
    <div class="container">
        <h1 data-aos="fade-up">Our Products</h1>
        <p data-aos="fade-up" data-aos-delay="100">Discover our curated collection of premium beauty and personal care products designed to enhance your natural beauty.</p>
    </div>
</section>

<!-- Products Section -->
<section class="products-section py-5">
    <div class="container">
        <!-- Category Filters -->
        <div class="category-filter text-center" data-aos="fade-up">
            <form action="<?php echo e(route('produits.index')); ?>" method="GET" class="d-inline-block">
                <button type="submit" name="category" value="*" class="btn btn-category <?php echo e(request('category') == '*' || !request('category') ? 'active' : ''); ?>">
                    All Products
                </button>
                
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <button type="submit" name="category" value="<?php echo e($category); ?>" class="btn btn-category <?php echo e(request('category') == $category ? 'active' : ''); ?>">
                        <?php echo e(ucfirst($category)); ?>

                    </button>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </form>
        </div>
        
        <!-- Products Grid -->
        <div class="row g-4">
            <?php if($products->count() > 0): ?>
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="<?php echo e($loop->iteration * 50); ?>">
                        <div class="card product-card h-100">
                            <div class="card-img-container">
                                <?php if($loop->iteration % 5 == 0): ?>
                                    <span class="product-badge badge-sale">Sale</span>
                                <?php elseif($loop->iteration % 4 == 0): ?>
                                    <span class="product-badge badge-new">New</span>
                                <?php endif; ?>
                                
                                <img src="<?php echo e(asset('storage/' . $product->image)); ?>" class="card-img-top" alt="<?php echo e($product->name); ?>">
                            </div>
                            
                            <div class="card-body">
                                <h5 class="card-title"><?php echo e($product->name); ?></h5>
                                <p class="card-text"><?php echo e(\Illuminate\Support\Str::limit($product->description, 100)); ?></p>
                                
                                <?php if($loop->iteration % 5 == 0): ?>
                                    <span class="price">
                                        <span class="original-price">$<?php echo e(number_format($product->price * 1.2, 2)); ?></span>
                                        $<?php echo e(number_format($product->price, 2)); ?>

                                    </span>
                                <?php else: ?>
                                    <span class="price">$<?php echo e(number_format($product->price, 2)); ?></span>
                                <?php endif; ?>
                            </div>
                            
                            <div class="card-footer d-flex justify-content-between">
                                <form action="<?php echo e(route('cart.add')); ?>" method="POST" class="add-to-cart-form">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button type="button" class="btn btn-outline-secondary quantity-btn decrease">-</button>
                                        </div>
                                        <input type="number" name="quantity" value="1" min="1" class="form-control quantity-input">
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-outline-secondary quantity-btn increase">+</button>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-outline-primary mt-2 w-100">
                                        <i class="bi bi-cart-plus"></i> Add to Cart
                                    </button>
                                </form>
                                <button class="btn btn-outline-dark details-btn">
                                    <i class="bi bi-eye"></i> Details
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <div class="col-12 text-center py-5">
                    <h3>No products found</h3>
                    <p>We couldn't find any products matching your criteria. Please try another category.</p>
                </div>
            <?php endif; ?>
        </div>
        
        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-5">
            <?php echo e($products->links()); ?>

        </div>
    </div>
</section>

<?php echo $__env->make('avis', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_scripts'); ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Quantity increment/decrement buttons
        document.querySelectorAll('.quantity-btn').forEach(button => {
            button.addEventListener('click', function() {
                const input = this.closest('.input-group').querySelector('.quantity-input');
                const currentValue = parseInt(input.value);
                
                if (this.classList.contains('increase')) {
                    input.value = currentValue + 1;
                } else if (this.classList.contains('decrease') && currentValue > 1) {
                    input.value = currentValue - 1;
                }
            });
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\para\resources\views/produits.blade.php ENDPATH**/ ?>