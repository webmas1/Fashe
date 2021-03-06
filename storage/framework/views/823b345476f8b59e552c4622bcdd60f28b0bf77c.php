<?php $__env->startSection('content'); ?>
<div class="dashboard-content">
    <!-- ============================================================== -->
    <!-- pageheader  -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Categories</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(url('cms/dashboard')); ?>" class="breadcrumb-link">CMS</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Categories</li>
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
        <div class="col-xl-9 col-lg-9 col-md-6 col-sm-12 col-12 order-last order-md-first">
            <div class="card">
                <h5 class="card-header">All Categories</h5>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="cms-table table">
                            <thead class="bg-light">
                                <tr class="border-0">
                                    <th class="border-0">Id</th>
                                    <th class="border-0">Image</th>
                                    <th class="border-0">Name</th>
                                    <th class="border-0">URL</th>
                                    <th class="border-0">Created At</th>
                                    <th class="border-0">Updated At</th>
                                    <th class="border-0">Edit/Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                        <?php if(isset($categories)): ?>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="bg-secondary"><?php echo e($item['id']); ?></td>
                                    <?php if($item['id'] == @$id): ?>
                                    <!-- EDIT CATEGORY -->
                                    <form action="<?php echo e(url('cms/categories').'/'.$item['id']); ?>" method="POST" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PATCH'); ?>
                                    <td>
                                        <div class="custom-file mb-3">
                                            <input type="file" name="image" class="custom-file-input" id="customFile" value="<?php echo e($item['image']); ?>" autofocus>
                                            <label class="custom-file-label" for="customFile"><img src="<?php echo e(url('images/categories').'/'.$item['image']); ?>" alt="user" class="rounded" width="45"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="text" name="name" class="form-control" value="<?php echo e($item['name']); ?>" required>
                                    </td>
                                    <td>
                                        <input type="text" name="url" class="form-control" value="<?php echo e($item['url_name']); ?>" required>
                                    </td>
                                    <?php else: ?>
                                    <!-- SHOW CATEGORY -->
                                    <td>
                                        <div class="m-r-10">
                                            <img src="<?php echo e(url('images/categories').'/'.$item['image']); ?>" alt="user" class="rounded" width="45">
                                        </div>
                                    </td>
                                    <td><a href="<?php echo e(url('cms/products').'/'.$item['id']); ?>"><?php echo e($item['name']); ?></a></td>
                                    
                                    <td><?php echo e($item['url_name']); ?></td>
                                    
                                    <?php endif; ?>
                                    
                                    <td><?php echo e($item['created_at']); ?></td>
                                    <td><?php echo e($item['updated_at']); ?></td>
                                    <td>
                                    <?php if($item['id'] == @$id): ?>
                                        <button class="btn btn-success" type="submit" name="submit">SAVE</button>
                                        <a class="d-inline-block mt-1" href="<?php echo e(url('cms/categories')); ?>">CANCEL</a>
                                    </form>
                                    <?php else: ?>
                                        <a href="<?php echo e(url('cms/categories').'/'.$item['id'].'/'.'edit'); ?>">
                                            <button class="btn btn-dark" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </a>
                                        <form class="del-data" action="<?php echo e(url('cms/categories').'/'.$item['id']); ?>" method="POST" data-type="Category and all it's products">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-danger" title="Delete">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                            
                                        </form>
                                        
                                    <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                                <tr>
                                    <td colspan="9"><i class="fas fa-exclamation-circle text-danger"></i> There are no categories to show</td>
                                </tr>
                        <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- ADD NEW CATEGORY -->
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 order-first order-md-last">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">New Category</h4>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(url('cms/categories')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                        <div class="mb-3">
                            <input type="text" name="name" class="form-control" placeholder="Category Name" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" name="url" class="form-control" placeholder="Category URL" required>
                        </div>
                        <div class="custom-file mb-3">
                            <input type="file" name="image" class="custom-file-input" id="customFile" required>
                            <label class="custom-file-label" for="customFile">Upload Category Image</label>
                        </div>
                        
                        <hr class="mb-4">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Create New Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('cms.cmsmaster', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>