<?php $__env->startSection('content'); ?>

<!-- Cart -->
<section class="cart bgwhite p-t-70 p-b-100">
    <?php if(!Cart::isEmpty()): ?>

    <div class="container">
        <!-- Cart item -->
        <?php $__currentLoopData = Cart::getContent()->sort(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 

        <div class="flex-w flex-sb-m p-t-25 p-b-25 bo1 p-l-35 p-r-60 p-lr-15-sm">
            <div class="flex-w flex-m mr-3">
                <div class="">
                    <div class="cart-img-product b-rad-4 o-f-hidden">
                        <img src="<?php echo e(url('/images/categories').'/'.$item['attributes']['image']); ?>" alt="IMG-PRODUCT">
                    </div>
                </div>
            </div>

            <div class="w-50 m-t-10 m-b-10 mr-3">
                <p class="column-2"><?php echo e($item['name']); ?></p>
                <p class="column-3">$<?php echo e($item['price']); ?></p>
            </div>

            <div class="m-t-15 m-b-10 mr-3">
                <div class="flex-w bo5 of-hidden w-size17">
                    <button class="update-item-quantity btn-num-product-down color1 flex-c-m size7 bg8 eff2" data-id="<?php echo e($item['id']); ?>" data-op="minus">
                        <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                    </button>

                    <span class="size8 m-text18 t-center num-product"><?php echo e($item['quantity']); ?></span>

                    <button class="update-item-quantity btn-num-product-up color1 flex-c-m size7 bg8 eff2" data-id="<?php echo e($item['id']); ?>" data-op="plus">
                        <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                    </button>
                </div>
            </div>

            <div class="m-t-15 m-b-10 mr-3">
                <p class="font-weight-bold">$<?php echo e($item['quantity']*$item['price']); ?></p>
            </div>

            <div class="m-t-15 m-b-10">
                <button class="update-item-quantity" data-id="<?php echo e($item['id']); ?>" data-op="del"><i class="del-item fas fa-trash text-danger"></i></button>
            </div>
        </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



        <div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
            <div class="flex-w flex-m w-full-sm">
                <div class="size12 trans-0-4 m-t-10 m-b-10 m-r-10">
                    <!-- Button -->
                    <a href="<?php echo e(url('/categories')); ?>">
                        <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                            Continue shopping
                        </button>
                    </a>
                </div>
            </div>

            <div class="size10 trans-0-4 m-t-10 m-b-10">
                <!-- Button -->
                <!-- <a href="<?php echo e(url('/delete_cart')); ?>"> -->
                    <button class="flex-c-m sizefull bg-danger bo-rad-23 hov1 s-text1 trans-0-4 empty-cart">
                        Empty cart
                    </button>
                <!-- </a> -->
            </div>
        </div>

        <!-- Total -->
        <div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
            <h5 class="m-text20 p-b-24">
                Cart Totals
            </h5>

            <!--  -->
            <div class="flex-w flex-sb-m p-b-12">
                <span class="s-text18 w-size19 w-full-sm">
                    Subtotal:
                </span>

                <span class="m-text21 w-size20 w-full-sm">
                    $<?php echo e(Cart::getSubTotal()); ?>

                </span>
            </div>

            <!--  -->
            <!-- <div class="flex-w flex-sb bo10 p-t-15 p-b-20">
                <span class="s-text18 w-size19 w-full-sm">
                    Shipping:
                </span>

                <div class="w-size20 w-full-sm">
                    <p class="s-text8 p-b-23">
                        There are no shipping methods available. Please double check your address, or contact us if you need any help.
                    </p>

                    <span class="s-text19">
                        Calculate Shipping
                    </span>

                    <div class="rs2-select2 rs3-select2 rs4-select2 bo4 of-hidden w-size21 m-t-8 m-b-12">
                        <select class="selection-2" name="country">
                            <option>Select a country...</option>
                            <option>US</option>
                            <option>UK</option>
                            <option>Japan</option>
                        </select>
                    </div>

                    <div class="size13 bo4 m-b-12">
                        <input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="state" placeholder="State /  country">
                    </div>

                    <div class="size13 bo4 m-b-22">
                        <input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="postcode" placeholder="Postcode / Zip">
                    </div>

                    <div class="size14 trans-0-4 m-b-10"> -->
                        <!-- Button -->
                        <!-- <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                            Update Totals
                        </button>
                    </div>
                </div>
            </div> -->

            <!--  -->
            <div class="flex-w flex-sb-m p-t-26 p-b-30">
                <span class="m-text22 w-size19 w-full-sm">
                    Total:
                </span>

                <span class="m-text21 w-size20 w-full-sm">
                    $<?php echo e(Cart::getTotal()); ?>

                </span>
            </div>

            <div class="size15 trans-0-4">
                <!-- Button -->
                <a href="<?php echo e(url('/save_order')); ?>">
                    <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                        Buy now
                    </button>
                </a>
            </div>
        </div>
    </div>

    <?php else: ?>

    <h5 class="m-text20 p-b-24 text-center">
        Your shopping cart is empty <i class="fas fa-frown"></i>
    </h5>
    <h5 class="m-text20 p-b-24 text-center">
        <a href="<?php echo e(url('/categories')); ?>">Start shopping now!</a>
    </h5>

    <?php endif; ?>

</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>