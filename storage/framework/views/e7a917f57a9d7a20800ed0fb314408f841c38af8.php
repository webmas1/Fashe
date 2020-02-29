<?php $__env->startSection('content'); ?>
<div class="dashboard-content">
    <!-- ============================================================== -->
    <!-- pageheader  -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Pages</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(url('cms/dashboard')); ?>" class="breadcrumb-link">CMS</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(url('cms/pages')); ?>" class="breadcrumb-link">Pages</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo e($data['name']); ?></li>
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
        <!-- ADD NEW PAGE -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Edit Page</h4>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(url('cms/pages').'/'.$data['id']); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PATCH'); ?>
                        <div class="mb-3">
                            <label for="page-name">Page Name:</label>
                            <input id="page-name" type="text" name="name" class="form-control" value="<?php echo e($data['name']); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="page-url">Page URL:</label>
                            <input id="page-url" type="text" name="url" class="form-control" value="<?php echo e($data['url_name']); ?>" required>
                        </div>
                        <hr class="mb-4">
                        <div class="mb-3">
                            <label for="page-headline">Headline:</label>
                            <input id="page-headline" type="text" name="headline" class="form-control" value="<?php echo e($data['headline']); ?>" required>
                        </div>
                        <div class="row">
                            <div id="page-img" class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 custom-file mb-3 mt-4">
                            <?php if($data['image']): ?>
                                <img src="<?php echo e(url('images/pages').'/'.$data['image']); ?>" alt="page image" class="rounded edit-page-image w-100">
                            <?php else: ?>
                                <img src="<?php echo e(url('images/pages/page-default.jpg')); ?>" alt="page image" class="rounded edit-page-image w-100">
                            <?php endif; ?>
                            <br><br>
                            <?php if($data['image']): ?>
                            <span id="remove-image-msg"></span>
                                <a id="remove-image" class="btn btn-dark btn-block">Remove Image</a>
                                <br>
                            <?php else: ?>
                            <p><i class="fas fa-exclamation-circle text-danger"></i> Page has no image</p><br>
                            <?php endif; ?>
                                <label class="custom-file-label position-relative w-100 text-center" for="customFile">Upload Page Image</label>
                                <input type="file" name="image" class="custom-file-input" id="customFile" value="<?php echo e($data['image']); ?>">
                            </div>
                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 mb-3">
                                <label for="summernote">Content:</label>
                                <textarea id="summernote" name="content" class="form-control" required><?php echo e($data['content']); ?></textarea>
                            </div>
                        </div>
                        <hr class="mb-4">
                        <div class="row justify-content-between">
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 mb-3 ml-3">
                            <button class="btn btn-primary btn-lg btn-block" type="submit">Save</button>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 mb-3 mr-3">
                            <a href="<?php echo e(url('cms/pages')); ?>" class="btn btn-dark btn-lg btn-block">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('cms.cmsmaster', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>