<?php $__env->startSection('content'); ?>
<div class="container mx-auto py-8 px-4">
    <h1 class="text-3xl font-bold mb-6">Votre Panier</h1>
    <div class="bg-white rounded-lg shadow-md p-6">
        <?php if($order && $order->order_details): ?>
            <?php
                $items = json_decode($order->order_details, true);
                $subtotal = 0;
            ?>
            <table class="table-auto w-full mb-6">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Produit</th>
                        <th class="px-4 py-2">Prix</th>
                        <th class="px-4 py-2">Quantité</th>
                        <th class="px-4 py-2">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $itemTotal = $item['price'] * $item['quantity']; $subtotal += $itemTotal; ?>
                        <tr>
                            <td class="border px-4 py-2"><?php echo e($item['name']); ?></td>
                            <td class="border px-4 py-2"><?php echo e(number_format($item['price'], 2)); ?> €</td>
                            <td class="border px-4 py-2"><?php echo e($item['quantity']); ?></td>
                            <td class="border px-4 py-2"><?php echo e(number_format($itemTotal, 2)); ?> €</td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <div class="flex justify-between items-center mb-4">
                <span class="text-gray-700">Sous-total:</span>
                <span class="font-semibold"><?php echo e(number_format($subtotal, 2)); ?> €</span>
            </div>
            <div class="flex justify-between items-center mb-4">
                <span class="text-gray-700">TVA (20%):</span>
                <span class="font-semibold"><?php echo e(number_format($subtotal * 0.2, 2)); ?> €</span>
            </div>
            <div class="flex justify-between items-center mb-4 text-lg">
                <span class="font-bold">Total:</span>
                <span class="font-bold"><?php echo e(number_format($subtotal * 1.2, 2)); ?> €</span>
            </div>
            <div class="flex justify-end mt-6">
                <a href="<?php echo e(route('checkout')); ?>" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition duration-200">Process to End Order</a>
            </div>
        <?php else: ?>
            <div class="text-center py-8">
                <p class="text-gray-500 text-xl">Votre panier est vide</p>
                <a href="<?php echo e(route('produits.index')); ?>" class="mt-4 inline-block bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition duration-200">Continuer vos achats</a>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\para\resources\views/cart.blade.php ENDPATH**/ ?>