<?php $__env->startSection('content'); ?>

<div class="dashboard-content">
    <!-- ============================================================== -->
    <!-- pageheader  -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Dashboard</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">CMS Dashboard</li>
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
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="">
                <h3>Last week data</h3>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- total Total Payed Orders  -->
        <!-- ============================================================== -->
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
            <div class="card border-3 border-top border-top-primary">
                <div class="card-body">
                    <h5 class="text-muted">Total Payed Orders</h5>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1 d-inline-block"><?php echo e($payed); ?></h1><span>/<?php echo e($orders); ?></span>
                    </div>
                    <div class="d-inline-block float-right text-warning font-weight-bold">
                    <i class="fas fa-credit-card h2"></i>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end total Total Payed Orders  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Total Sent Orders  -->
        <!-- ============================================================== -->
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
            <div class="card border-3 border-top border-top-primary">
                <div class="card-body">
                    <h5 class="text-muted">Total Sent Orders</h5>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1 d-inline-block"><?php echo e($sent); ?></h1><span>/<?php echo e($payed); ?></span>
                    </div>
                    <div class="d-inline-block float-right text-primary font-weight-bold">
                        <i class="fas fa-shipping-fast h2"></i>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end Total Sent Orders  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Revenue  -->
        <!-- ============================================================== -->
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
            <div class="card border-3 border-top border-top-primary">
                <div class="card-body">
                    <h5 class="text-muted">Revenue</h5>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1">$<?php echo e($revenue); ?></h1>
                    </div>
                    <div class="d-inline-block float-right text-success font-weight-bold">
                        <i class="fas fa-hand-holding-usd h2"></i>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end Revenue  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- new customer  -->
        <!-- ============================================================== -->
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
            <div class="card border-3 border-top border-top-primary">
                <div class="card-body">
                    <h5 class="text-muted">New Users</h5>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1"><?php echo e($users); ?></h1>
                    </div>
                    <div class="d-inline-block float-right text-dark font-weight-bold">
                    <i class="fas fa-users h2"></i>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end new customer  -->
        <!-- ============================================================== -->        
    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('cms.cmsmaster', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>