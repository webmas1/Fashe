<?php $__env->startSection('content'); ?>

<!-- Product Detail -->
<div class="container bgwhite p-t-35 p-b-80">
    <div class="flex-w flex-sb">
    <?php if($page['image']): ?>
        <div class="w-size13 p-t-30 respon5 product-img">
            <img src="<?php echo e(url('/images/pages').'/'.$page['image']); ?>" alt="IMG-PAGE">
        </div>
        <div class="w-size14 p-t-30 respon5">
    <?php else: ?>
        <div class="p-t-30 respon5">
    <?php endif; ?>
            <h2 class="product-detail-name p-b-13 text-capitalize">
                <?php echo e($page['name']); ?>

            </h2>

            <h4 class="product-detail-name m-text16 p-b-13 text-capitalize">
                <?php echo e($page['headline']); ?>

            </h4>

            <p class="p-t-10">
                <?php echo $page['content']; ?>

            </p>
            
        </div>
    

        
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>