<!DOCTYPE html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('cms/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link href="{{asset('cms/vendor/fonts/circular-std/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('cms/libs/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('cms/vendor/fonts/fontawesome/css/fontawesome-all.css')}}">
    <!-- <link rel="stylesheet" href="{{asset('cms/vendor/charts/chartist-bundle/chartist.css')}}"> -->
    <!-- <link rel="stylesheet" href="{{asset('cms/vendor/charts/morris-bundle/morris.css')}}"> -->
    <link rel="stylesheet" href="{{asset('cms/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('cms/vendor/charts/c3charts/c3.css')}}">
    <link rel="stylesheet" href="{{asset('cms/vendor/fonts/flag-icon-css/flag-icon.min.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.css" rel="stylesheet">
    
    <link rel="stylesheet" href="{{asset('cms/libs/css/my_styles.css')}}">

    <script>
        var BASE_URL = "{{url('')}}";
    </script>

    <title>{{$title}}</title> 
</head>
 
<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <!-- headline -->
                <a class="navbar-brand" href="{{url('cms/dashboard')}}">Fashe. CMS</a>
                <!-- navbar hamburger -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- <div class="collapse navbar-collapse " id="navbarSupportedContent"> -->
                    <!-- <ul class="navbar-nav ml-auto navbar-right-top"> -->
                        <!-- user menu -->
                        <!-- <li class="nav-item dropdown nav-user">
                            
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{url('cms/images/avatar-1.jpg')}}" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name">{{Session::get('user_name')}}</h5>
                                    <span class="status"></span><span class="ml-2">Available</span>
                                </div>
                                <a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Account</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Setting</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li> -->
                    <!-- </ul> -->
                <!-- </div> -->
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="{{url('cms/dashboard')}}">Dashboard</a>
                    <!-- sidebar hamburger -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <!-- sidebar menu -->
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Info
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link active" href="{{url('cms/dashboard')}}" aria-expanded="false"><i class="fas fa-fw fa-chart-pie"></i>Dashboard <span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-divider">
                                Edit
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{url('cms/pages')}}" aria-expanded="false"><i class="fas fa-fw fa-file"></i>Pages <span class="badge badge-success">6</span></a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link active" href="{{url('cms/categories')}}" aria-expanded="false"><i class="fas fa-sitemap"></i>Categories <span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{url('cms/products')}}" aria-expanded="false"><i class="fas fa-shopping-basket"></i>Products <span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-divider">
                                Users & Orders
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{url('cms/users')}}" aria-expanded="false"><i class="fas fa-user-circle"></i>Users <span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{url('cms/orders')}}" aria-expanded="false"><i class="fas fa-clipboard-list"></i>Orders <span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-divider"></li>
                            <li class="nav-divider"></li>
                            <li class="nav-divider"></li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{url('')}}" aria-expanded="false"><i class="fas fa-home"></i>Fashe Homepage <span class="badge badge-success">6</span></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            




            @yield('content')






            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                             Copyright © 2018 Concept. All rights reserved. Dashboard by <a href="https://colorlib.com/wp/">Colorlib</a>.
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="text-md-right footer-links d-none d-sm-block">
                                <a href="javascript: void(0);">About</a>
                                <a href="javascript: void(0);">Support</a>
                                <a href="javascript: void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="{{asset('cms/vendor/jquery/jquery-3.3.1.min.js')}}"></script>
    <!-- bootstap bundle js -->
    <script src="{{asset('cms/vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>
    <!-- slimscroll js -->
    <script src="{{asset('cms/vendor/slimscroll/jquery.slimscroll.js')}}"></script>
    <!-- main js -->
    <script src="{{asset('cms/libs/js/main-js.js')}}"></script>
    <!-- chart chartist js -->
    <!-- <script src="{{asset('cms/vendor/charts/chartist-bundle/chartist.min.js')}}"></script> -->
    <!-- sparkline js -->
    <script src="{{asset('cms/vendor/charts/sparkline/jquery.sparkline.js')}}"></script>
    <!-- morris js -->
    <script src="{{asset('cms/vendor/charts/morris-bundle/raphael.min.js')}}"></script>
    <!-- <script src="{{asset('cms/vendor/charts/morris-bundle/morris.js')}}"></script> -->
    <!-- chart c3 js -->
    <script src="{{asset('cms/vendor/charts/c3charts/c3.min.js')}}"></script>
    <script src="{{asset('cms/vendor/charts/c3charts/d3-5.4.0.min.js')}}"></script>
    <script src="{{asset('cms/vendor/charts/c3charts/C3chartjs.js')}}"></script>
    <!-- <script src="{{asset('cms/libs/js/dashboard-ecommerce.js')}}"></script> -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.js"></script>


    <script type="text/javascript">
@if(Session::has('msg') && Session::has('product_name_msg'))
        var nameProduct = '{{Session::get('product_name_msg')}}';
        var msg = '{{Session::get('msg')}}';
        
        swal(nameProduct, msg, "success");
@endif

@if(Session::has('success_msg'))
        var msg = '{{Session::get('success_msg')}}';
        
        swal(msg, '', "success");
@endif

@if(Session::has('warning_msg'))
        var msg = '{{Session::get('warning_msg')}}';
        
        swal(msg, '', "warning");
@endif

@foreach ($errors->all() as $message)
        swal('{{$message}}', 'Try again', "error");
@endforeach
        
        $(".del-data").submit(function(event){
            var type = $(this).data('type');
            event.preventDefault();
            swal({
                title: "Are you sure?",
                text: type+" will be deleted",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                    $(".del-data").unbind('submit').submit();
                }
            });
        });

        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'Place your content here',
                tabsize: 1,
                height: 200
            });
        });

        $("#remove-image").click(function(){
            $("#customFile").remove();
            $("<input>").attr({
                type: 'file',
                id: "customFile",
                name: "image",
                class:"custom-file-input",
                value: ""
            })
            .appendTo($("div[id='page-img']"));

            $("#remove-image").remove();
            $("<p><i class='fas fa-exclamation-circle text-danger'></i> Changes will be saved by pressing save at the bottom</p>")
            .appendTo("#remove-image-msg");
        });
    </script>
</body>
 
</html>