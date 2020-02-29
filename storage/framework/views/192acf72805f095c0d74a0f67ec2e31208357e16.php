<?php $__env->startSection('content'); ?>

<!-- Banner -->
<section class="banner bgwhite p-t-40 p-b-40">
    <div class="container">
        <div class="row">
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-sm-10 col-md-4 col-lg-4 m-l-r-auto">
                <div class="block1 hov-img-zoom pos-relative m-b-30">
                    <img class="cat-img" src="<?php echo e(url('images/categories').'/'.$data['image']); ?>" alt="image of category">

                    <div class="block1-wrapbtn w-size2">
                        <!-- Button -->
                        <a href="<?php echo e(url('/categories').'/'.$data['url_name']); ?>" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                            <?php echo e($data['name']); ?>

                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>