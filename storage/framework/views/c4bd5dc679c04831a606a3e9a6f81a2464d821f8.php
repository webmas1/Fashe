<?php $__env->startSection('content'); ?>

<!-- Title Page -->
<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m">
    <h2 class="l-text2 t-center text-dark">
        <?php echo e($cat_name); ?> 
    </h2>
</section>


<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
    <div class="container">
        <div class="row">

            <div class="col-sm-12 col-md-12 col-lg-12 p-b-50">

                <!-- SORTING PRODUCTS -->

                <h5>Order by:</h5>

                <div class="flex-sb-m flex-w p-b-35 p-t-10">
                    <div class="flex-w">
                        
                        <?php switch($orderby):
                            case ('newest'): ?>
                                <span class="btn btn-secondary s-text3 m-r-10 m-b-5" style="cursor: default; color: white;">Newest</span>
                                <a class="btn btn-outline-secondary s-text3 m-r-10 m-b-5" href="<?php echo e(url('categories').'/'.$cat_url.'?orderby=price_low'); ?>">
                                    Price- Low to High
                                </a>
                                <a class="btn btn-outline-secondary s-text3 m-r-10 m-b-5" href="<?php echo e(url('categories').'/'.$cat_url.'?orderby=price_high'); ?>">
                                    Price- High to Low
                                </a>
                                <?php break; ?>
                            <?php case ('price_low'): ?>
                                <a class="btn btn-outline-secondary s-text3 m-r-10 m-b-5" href="<?php echo e(url('categories').'/'.$cat_url.'?orderby=newest'); ?>">
                                    Newest
                                </a>
                                <span class="btn btn-secondary s-text3 m-r-10 m-b-5" style="cursor: default; color: white;">
                                    Price- Low to High
                                </span>
                                <a class="btn btn-outline-secondary s-text3 m-r-10 m-b-5" href="<?php echo e(url('categories').'/'.$cat_url.'?orderby=price_high'); ?>">
                                    Price- High to Low
                                </a>
                                <?php break; ?>
                            <?php case ('price_high'): ?>
                                <a class="btn btn-outline-secondary s-text3 m-r-10 m-b-5" href="<?php echo e(url('categories').'/'.$cat_url.'?orderby=newest'); ?>">
                                    Newest
                                </a>
                                <a class="btn btn-outline-secondary s-text3 m-r-10 m-b-5" href="<?php echo e(url('categories').'/'.$cat_url.'?orderby=price_low'); ?>">
                                    Price- Low to High
                                </a>
                                <span class="btn btn-secondary s-text3 m-r-10 m-b-5" style="cursor: default; color: white;">
                                    Price- High to Low
                                </span>
                                <?php break; ?>
                            <?php default: ?>
                                <a class="btn btn-outline-secondary s-text3 m-r-10 m-b-5" href="<?php echo e(url('categories').'/'.$cat_url.'?orderby=newest'); ?>">
                                    Newest
                                </a>
                                <a class="btn btn-outline-secondary s-text3 m-r-10 m-b-5" href="<?php echo e(url('categories').'/'.$cat_url.'?orderby=price_low'); ?>">
                                    Price- Low to High
                                </a>
                                <a class="btn btn-outline-secondary s-text3 m-r-10 m-b-5" href="<?php echo e(url('categories').'/'.$cat_url.'?orderby=price_high'); ?>">
                                    Price- High to Low
                                </a>
                        <?php endswitch; ?>
                        
                    </div>
                </div>

                <!-- PRODUCTS -->

                <div class="row">
                <?php if($products): ?>

                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-sm-12 col-md-6 col-lg-3 p-b-150">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-img wrap-pic-w of-hidden pos-relative">
                                    <img src="<?php echo e(url('images/categories').'/'.$data['image']); ?>" alt="IMG-PRODUCT">
                                <div class="block2-overlay trans-0-4">
                                    <a href="<?php echo e(url('#')); ?>" class="block2-btn-addwishlist hov-pointer trans-0-4">
                                        <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                                        <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                                    </a>

                                    <div class="block2-btn-addcart w-size1 trans-0-4">
                                        <!-- Button -->
                                        <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4 add-to-cart" data-id="<?php echo e($data['id']); ?>">
                                            Add to Cart
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="block2-txt p-t-20">
                                <a href="<?php echo e(url('categories').'/'.$cat_url.'/'.$data['url_name']); ?>" class="block2-name dis-block s-text3 p-b-5">
                                    <?php echo e($data['name']); ?>

                                </a>

                                <span class="block2-price m-text6 p-r-5">
                                    $<?php echo e($data['price']); ?>

                                </span>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <p><i class="fas fa-exclamation-circle text-danger"></i> There are no products in that category...</p> 
                <?php endif; ?>
                <!-- Pagination -->
                
                <!-- <div class="pagination flex-m flex-w p-t-50">
                    <a href="<?php echo e(url('#')); ?>" class="item-pagination flex-c-m trans-0-4 active-pagination">1</a>
                    <a href="<?php echo e(url('#')); ?>" class="item-pagination flex-c-m trans-0-4">2</a>
                </div> -->
            </div>
        </div>
    </div>
    <?php echo e($products->appends(Request::only('orderby'))->links()); ?>

</section>





<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>