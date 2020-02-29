<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo e($title); ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--===============================================================================================-->
        <link rel="icon" type="image/png" href="<?php echo e(asset('images/icons/favicon.png')); ?>"/>
        <!--===============================================================================================-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <!--===============================================================================================-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('fonts/themify/themify-icons.css')); ?>">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('fonts/Linearicons-Free-v1.0.0/icon-font.min.css')); ?>">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('fonts/elegant-font/html-css/style.css')); ?>">
        <!--===============================================================================================-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/css-hamburgers/hamburgers.min.css')); ?>">
        <!--===============================================================================================-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animsition/4.0.2/css/animsition.min.css">
        <!--===============================================================================================-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
        <!--===============================================================================================-->
        <!-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" /> -->
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
        <!--===============================================================================================-->
        <!--<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/13.1.1/nouislider.min.css"/>-->
        <!--===============================================================================================-->
        <!-- <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/lightbox2/lightbox.min.css')); ?>"> -->
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/util.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/main.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/my_styles.css')); ?>">
        <!--===============================================================================================-->

        <script>
            var BASE_URL = "<?php echo e(url('')); ?>";
        </script>
    </head>
    <body class="animsition">

        <!-- Header -->
        <header class="header1">
            <!-- Header desktop -->
            <div class="container-menu-header">
                <div class="topbar">
                    <div class="topbar-social">
                        <a href="#" class="topbar-social-item fab fa-facebook"></a>
                        <a href="#" class="topbar-social-item fab fa-instagram"></a>
                        <a href="#" class="topbar-social-item fab fa-pinterest-p"></a>
                        <a href="#" class="topbar-social-item fab fa-snapchat-ghost"></a>
                        <a href="#" class="topbar-social-item fab fa-youtube-play"></a>
                    </div>

                    <span class="topbar-child1">
                        Free shipping for standard order over $100
                    </span>

                </div>

                <div class="wrap_header">
                    <!-- Logo -->
                    <a href="<?php echo e(url('/')); ?>" class="logo">
                        <img src="<?php echo e(url('images/icons/logo.png')); ?>" alt="Fashe.">
                    </a>

                    <!-- Menu -->
                    <div class="wrap_menu">
                        <nav class="menu">
                            <ul class="main_menu text-capitalize">

                                <li> 
                                    <a href="<?php echo e(url('/categories')); ?>">Categories</a>
                                    <ul class="sub_menu">

                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <li><a href="<?php echo e(url('/categories').'/'.$data['url_name']); ?>"><?php echo e($data['name']); ?></a></li>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </ul>
                                </li>

                                <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <li>
                                    <a href="<?php echo e(url('').'/'.$page['url_name']); ?>"><?php echo e($page['name']); ?></a>
                                </li>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </ul>
                        </nav>
                    </div>
                    <!-- Header Icons -->
                    <div class="header-icons">
                        
                        <div class="header-wrapicon1 dis-block">

                            <!-- Admin panel -->
                            <?php if(Session::has('user_id') && Session::has('is_admin')): ?>

                            <a href="<?php echo e(url('user/logout')); ?>">Log out</a>
                            </div>
                            <span class="linedivide1"></span>
                            <div class="header-wrapicon1 dis-block">
                            <a href="<?php echo e(url('cms/dashboard')); ?>">CMS</a>

                            <!-- User panel -->
                            <?php elseif(Session::has('user_id')): ?>

                            <a href="<?php echo e(url('user/logout')); ?>">Log out</a>

                            <?php else: ?>

                            <!-- User icon -->
                            <a href="<?php echo e(url('user/signin')); ?>"> 
                                <img src="<?php echo e(url('images/icons/icon-header-01.png')); ?>" class="header-icon1" alt="user area">
                            </a>

                            <?php endif; ?>

                        </div>
                        
                        <span class="linedivide1"></span>

                        <!-- Cart -->
                        <div class="header-wrapicon2">

                            <!-- icon -->
                            <img src="<?php echo e(url('images/icons/icon-header-02.png')); ?>" class="header-icon1 js-show-header-dropdown" alt="shopping cart">

                            <!-- quanity icon -->
                            <span class="header-icons-noti"><?php echo e(Cart::getTotalQuantity()); ?></span>

                            <!-- Cart dropdown -->
                            <?php if(!Cart::isEmpty()): ?>

                            <div class="header-cart header-dropdown">
                                <ul class="header-cart-wrapitem">

                                    <?php $__currentLoopData = Cart::getContent()->sort(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 

                                    <li class="header-cart-item">
                                        <div class="header-cart-item-img">
                                            <img src="<?php echo e(url('/images/categories').'/'.$item['attributes']['image']); ?>" alt="IMG">
                                        </div>

                                        <div class="header-cart-item-txt">
                                            <span class="header-cart-item-name">
                                                <?php echo e($item['name']); ?>

                                            </span>

                                            <span class="header-cart-item-info">
                                                <?php echo e($item['quantity']); ?> x $<?php echo e($item['price']); ?>

                                            </span>
                                        </div>

                                        <div class="header-cart-item-del">
                                            <button class="update-item-quantity" data-id="<?php echo e($item['id']); ?>" data-op="del"><i class="del-item fas fa-trash text-danger"></i></button>
                                        </div>
                                    </li>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </ul>

                                <div class="header-cart-total">
                                    Total: $<?php echo e($item['quantity']*$item['price']); ?>

                                </div>

                                <div class="header-cart-buttons">
                                    <div class="header-cart-wrapbtn">
                                        <a href="<?php echo e(url('checkout')); ?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                            Check Out
                                        </a>
                                    </div>
                                </div>

                            </div>

                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Header MOBILE -->

            <div class="wrap_header_mobile">
                <!-- Logo moblie -->
                <a href="<?php echo e(url('/')); ?>" class="logo-mobile">
                    <img src="<?php echo e(url('images/icons/logo.png')); ?>" alt="Fashe.">
                </a>

                <!-- Button show menu -->
                <div class="btn-show-menu">
                    <!-- Header Icon mobile -->
                    <div class="header-icons-mobile">
                        <a href="<?php echo e(url('user/signin')); ?>" class="header-wrapicon1 dis-block">
                            <img src="<?php echo e(url('images/icons/icon-header-01.png')); ?>" class="header-icon1" alt="user area">
                        </a>

                        <span class="linedivide2"></span>

                        <div class="header-wrapicon2">
                            <img src="<?php echo e(url('images/icons/icon-header-02.png')); ?>" class="header-icon1 js-show-header-dropdown" alt="shopping cart">
                            <span class="header-icons-noti"><?php echo e(Cart::getTotalQuantity()); ?></span>

                            <!-- Cart dropdown --> 

                            <?php if(!Cart::isEmpty()): ?>

                            <div class="header-cart header-dropdown">
                                <ul class="header-cart-wrapitem">

                                    <?php $__currentLoopData = Cart::getContent()->sort(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 

                                    <li class="header-cart-item">
                                        <div class="header-cart-item-img">
                                            <img src="<?php echo e(url('/images/categories').'/'.$item['attributes']['image']); ?>" alt="IMG">
                                        </div>

                                        <div class="header-cart-item-txt">
                                            <span class="header-cart-item-name">
                                                <?php echo e($item['name']); ?>

                                            </span>

                                            <span class="header-cart-item-info">
                                                <?php echo e($item['quantity']); ?> x $<?php echo e($item['price']); ?>

                                            </span>
                                        </div>

                                        <div class="header-cart-item-del">
                                            <button class="update-item-quantity" data-id="<?php echo e($item['id']); ?>" data-op="del"><i class="del-item fas fa-trash text-danger"></i></button>
                                        </div>
                                    </li>
                                    
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </ul>

                                <div class="header-cart-total">
                                    Total: $<?php echo e($item['quantity']*$item['price']); ?>

                                </div>

                                <div class="header-cart-buttons">
                                    <div class="header-cart-wrapbtn">
                                        <a href="<?php echo e(url('checkout')); ?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                            Check Out
                                        </a>
                                    </div>
                                </div>

                            </div>

                            <?php endif; ?>

                        </div>
                    </div>

                    <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </div>
                </div>
            </div>

            <!-- Menu MOBILE -->
            <div class="wrap-side-menu" >
                <nav class="side-menu">
                    <ul class="main-menu">
                        <li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
                            <span class="topbar-child1">
                                Free shipping for standard order over $100
                            </span>
                        </li>

                        <li class="item-topbar-mobile p-l-10">
                            <div class="topbar-social-mobile">
                                <a href="#" class="topbar-social-item fab fa-facebook"></a>
                                <a href="#" class="topbar-social-item fab fa-instagram"></a>
                                <a href="#" class="topbar-social-item fab fa-pinterest-p"></a>
                                <a href="#" class="topbar-social-item fab fa-snapchat-ghost"></a>
                                <a href="#" class="topbar-social-item fab fa-youtube-play"></a>
                            </div>
                        </li>

                        <li class="item-menu-mobile text-capitalize">
                            <a href="<?php echo e(url('/categories')); ?>">Categories</a>
                            <ul class="sub-menu">

                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <li><a href="<?php echo e(url('/categories').'/'.$data['url_name']); ?>"><?php echo e($data['name']); ?></a></li>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </ul>

                            <i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
                            
                        </li>

                        <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                        <li class="item-menu-mobile text-capitalize">
                            <a href="<?php echo e(url('').'/'.$page['url_name']); ?>"><?php echo e($page['name']); ?></a>
                        </li>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    </ul>
                </nav>
            </div>
        </header>



        <!-- CONTENT OF VIEW -->

        <main><?php echo $__env->yieldContent('content'); ?></main>

        <!-- END OF CONTENT -->



        <!-- Footer -->
        <footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
            <div class="flex-w p-b-90">
                <div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
                    <h4 class="s-text12 p-b-30">
                        GET IN TOUCH
                    </h4>

                    <div>
                        <p class="s-text7 w-size27">
                            Any questions? Let us know in office at 1st David Ben-Gurion St, Bnei-Brak, or call us on <a href='tel:03-9671668'>03-9671668</a>
                        </p>

                        <div class="flex-m p-t-30">
                            <a href="#" class="fs-18 color1 p-r-20 fab fa-facebook"></a>
                            <a href="#" class="fs-18 color1 p-r-20 fab fa-instagram"></a>
                            <a href="#" class="fs-18 color1 p-r-20 fab fa-pinterest-p"></a>
                            <a href="#" class="fs-18 color1 p-r-20 fab fa-snapchat-ghost"></a>
                            <a href="#" class="fs-18 color1 p-r-20 fab fa-youtube-play"></a>
                        </div>
                    </div>
                </div>

                <div class="w-size8 p-t-30 p-r-15 respon4 links-footer">
                    <h4 class="s-text12 p-b-30">
                        Links
                    </h4>

                    <ul class="text-capitalize">

                        <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <li class="p-b-9">
                            <a href="<?php echo e(url('').'/'.$page['url_name']); ?>" class="s-text7">
                                <?php echo e($page['name']); ?>

                            </a>
                        </li>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </ul>

                </div>

                <?php if(Session::has('subscribe')): ?>

                <div class="w-size8 p-t-30 p-l-15 p-r-15 respon3">
                    <h4 class="s-text12 p-b-30">
                        Newsletter
                    </h4>                        

                    <div class="effect1 w-size9">
                        <p><?php echo e(Session::get('email')); ?></p>
                        <span class="effect1-line"></span>
                    </div>
                    
                    <div class="w-size2 p-t-20">
                        <button class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4 subscribe">
                            Subscribe
                        </button>
                    </div>
                </div>

                <?php elseif(!Session::has('user_id')): ?>

                <div class="w-size8 p-t-30 p-l-15 p-r-15 respon3">
                    <h4 class="s-text12 p-b-30">
                        Newsletter
                    </h4>

                    <p>If you would like to receive our newsletter, please sign in first</p>

                    <div class="w-size2 p-t-20">
                        <a href="<?php echo e(url('user/signin')); ?>" class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
                            Sign in
                        </a>
                    </div>
                </div>

                <?php else: ?>

                <div class="w-size8 p-t-30 p-l-15 p-r-15 respon3">
                    <h4 class="s-text12 p-b-30">
                        Newsletter
                    </h4>                        

                    <p>Would you like us to stop sending you our newsletter?</p>
                    
                    <div class="w-size2 p-t-20">
                        <button class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4 unsubscribe">
                            Unsubscribe
                        </button>
                    </div>
                </div>
                
                <?php endif; ?> 

            </div>

            <div class="t-center p-l-15 p-r-15">
                <a href="#">
                    <img class="h-size2" src="<?php echo e(url('images/icons/paypal.png')); ?>" alt="IMG-PAYPAL">
                </a>

                <a href="#">
                    <img class="h-size2" src="<?php echo e(url('images/icons/visa.png')); ?>" alt="IMG-VISA">
                </a>

                <a href="#">
                    <img class="h-size2" src="<?php echo e(url('images/icons/mastercard.png')); ?>" alt="IMG-MASTERCARD">
                </a>

                <a href="#">
                    <img class="h-size2" src="<?php echo e(url('images/icons/express.png')); ?>" alt="IMG-EXPRESS">
                </a>

                <a href="#">
                    <img class="h-size2" src="<?php echo e(url('images/icons/discover.png')); ?>" alt="IMG-DISCOVER">
                </a>

                <div class="t-center s-text8 p-t-20">
                    Copyright © 2018 All rights reserved. | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> | Developed by <a href="mailto:webmas1@gmail.com">Asi Kapner</a>.
                </div>
            </div>
        </footer>



        <!-- Back to top -->
        <div class="btn-back-to-top bg0-hov" id="myBtn">
            <span class="symbol-btn-back-to-top">
                <i class="fa fa-angle-double-up" aria-hidden="true"></i>
            </span>
        </div>

        <!-- Container Selection1 -->
        <div id="dropDownSelect1"></div>
        <div id="dropDownSelect2"></div>



        <!--===============================================================================================-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!--===============================================================================================-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/animsition/4.0.2/js/animsition.min.js"></script>
        <!--===============================================================================================-->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
        <!--===============================================================================================-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
        <script type="text/javascript">
            $(".selection-1").select2({
                minimumResultsForSearch: 20,
                dropdownParent: $('#dropDownSelect1')
            });

            $(".selection-2").select2({
                minimumResultsForSearch: 20,
                dropdownParent: $('#dropDownSelect2')
            });
        </script>
        <!--===============================================================================================-->
        <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script> -->
        <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script> -->
        <!--===============================================================================================-->
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
        <script type="text/javascript" src="<?php echo e(asset('js/slick-custom.js')); ?>"></script>
        <!--===============================================================================================-->
        <!-- <script type="text/javascript" src="<?php echo e(asset('js/countdowntime.js')); ?>"></script> -->
        <!--===============================================================================================-->
        <!-- <script type="text/javascript" src="<?php echo e(asset('js/lightbox2/lightbox.min.js')); ?>"></script> -->
        <!--===============================================================================================-->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
        
        <!--===============================================================================================-->
        <!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/13.1.1/nouislider.min.js"></script>-->
<!--        <script type="text/javascript">
            /*[ No ui ]
             ===========================================================*/
            var filterBar = document.getElementById('filter-bar');

            noUiSlider.create(filterBar, {
                start: [50, 200],
                connect: true,
                range: {
                    'min': 50,
                    'max': 200
                }
            });

            var skipValues = [
                document.getElementById('value-lower'),
                document.getElementById('value-upper')
            ];

            filterBar.noUiSlider.on('update', function (values, handle) {
                skipValues[handle].innerHTML = Math.round(values[handle]);
            });
        </script>-->
        <!--===============================================================================================-->
        <script src="<?php echo e(asset('js/main.js')); ?>"></script>
        <script src="<?php echo e(asset('js/my_script.js')); ?>"></script>

        <script type="text/javascript">
<?php if(Session::has('msg') && Session::has('product_name_msg')): ?>
        var nameProduct = '<?php echo e(Session::get('product_name_msg')); ?>';
        var msg = '<?php echo e(Session::get('msg')); ?>';
        
        swal(nameProduct, msg, "success");
<?php endif; ?>

<?php if(Session::has('success_msg')): ?>
        var msg = '<?php echo e(Session::get('success_msg')); ?>';
        
        swal(msg, '', "success");
<?php endif; ?>

<?php if(Session::has('warning_msg')): ?>
        var msg = '<?php echo e(Session::get('warning_msg')); ?>';
        
        swal(msg, '', "warning");
<?php endif; ?>

<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        swal('<?php echo e($message); ?>', 'Try again', "error");
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        $(".empty-cart").click(function(){
            swal({
                title: "Are you sure?",
                text: "All product in cart will removed",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = "<?php echo e(url('/delete_cart')); ?>";
                } else {
                }
            });
        });
        
        </script>
    </body>
</html>