<?php $__env->startSection('content'); ?>
<div class="dashboard-content">
    <!-- ============================================================== -->
    <!-- pageheader  -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Orders</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(url('cms/dashboard')); ?>" class="breadcrumb-link">CMS</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Orders</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end pageheader  -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">All Orders</h5>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="cms-table table">
                            <thead class="bg-light">
                                <tr class="border-0">
                                    <th class="border-0">ID</th>
                                    <th class="border-0">User ID</th>
                                    <th class="border-0">The order</th>
                                    <th class="border-0">Total</th>
                                    <th class="border-0">Created At</th>
                                    <th class="border-0">Updated At</th>
                                    <th class="border-0">Payment</th>
                                    <th class="border-0">Sent</th>
                                    <th class="border-0">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            <!-- SHOW ORDERS -->
                            <?php if(isset($data)): ?>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="bg-secondary"><?php echo e($order['id']); ?></td>
                                    <td><?php echo e($order['user_id']); ?></td>
                                    <td>
                                    <?php $__currentLoopData = (unserialize($order['data'])); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <p><span class="text-primary">Item: </span><?php echo e($item['name']); ?><br>
                                        <span class="text-primary">Quantity: </span><?php echo e($item['quantity']); ?><br>
                                        <span class="text-primary">Price: </span>$<?php echo e($item['price']); ?></p>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </td>
                                    <td>$<?php echo e($order['total']); ?></td>
                                    <td><?php echo e($order['created_at']); ?></td>
                                    <td><?php echo e($order['updated_at']); ?></td>
                                    <td>
                                    <?php if($order['payment'] == 2): ?>
                                        <span class="text-danger">Not paid</span>
                                    <?php elseif($order['payment'] == 1): ?>
                                        <span class="text-success">Paid up</span>
                                    <?php endif; ?>
                                    </td>
                                    <td>
                                    <?php if($order['sent'] == 2): ?>
                                        <form action="<?php echo e(url('cms/orders').'/'.$order['id']); ?>" method="POST" enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('PATCH'); ?>
                                            <button class="btn btn-dark" type="submit" name="mark_as_sent">Mark as sent</button>
                                        </form>
                                    <?php elseif($order['sent'] == 1): ?>
                                        <span class="text-success">Sent</span>
                                    <?php endif; ?>
                                    </td>
                                    <td>
                                        <form class="del-cat" action="<?php echo e(url('cms/orders').'/'.$order['id']); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-danger" title="Delete">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="9"><i class="fas fa-exclamation-circle text-danger"></i> There are no orders to show</td>
                                </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('cms.cmsmaster', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>