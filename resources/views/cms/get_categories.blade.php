@extends('cms.cmsmaster')

@section('content')
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
                            <li class="breadcrumb-item"><a href="{{url('cms/dashboard')}}" class="breadcrumb-link">CMS</a></li>
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
                        @isset($categories)
                            @foreach($categories as $item)
                                <tr>
                                    <td class="bg-secondary">{{$item['id']}}</td>
                                    @if($item['id'] == @$id)
                                    <!-- EDIT CATEGORY -->
                                    <form action="{{url('cms/categories').'/'.$item['id']}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <td>
                                        <div class="custom-file mb-3">
                                            <input type="file" name="image" class="custom-file-input" id="customFile" value="{{$item['image']}}" autofocus>
                                            <label class="custom-file-label" for="customFile"><img src="{{url('images/categories').'/'.$item['image']}}" alt="user" class="rounded" width="45"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="text" name="name" class="form-control" value="{{$item['name']}}" required>
                                    </td>
                                    <td>
                                        <input type="text" name="url" class="form-control" value="{{$item['url_name']}}" required>
                                    </td>
                                    @else
                                    <!-- SHOW CATEGORY -->
                                    <td>
                                        <div class="m-r-10">
                                            <img src="{{url('images/categories').'/'.$item['image']}}" alt="user" class="rounded" width="45">
                                        </div>
                                    </td>
                                    <td><a href="{{url('cms/products').'/'.$item['id']}}">{{$item['name']}}</a></td>
                                    
                                    <td>{{$item['url_name']}}</td>
                                    
                                    @endif
                                    
                                    <td>{{$item['created_at']}}</td>
                                    <td>{{$item['updated_at']}}</td>
                                    <td>
                                    @if($item['id'] == @$id)
                                        <button class="btn btn-success" type="submit" name="submit">SAVE</button>
                                        <a class="d-inline-block mt-1" href="{{url('cms/categories')}}">CANCEL</a>
                                    </form>
                                    @else
                                        <a href="{{url('cms/categories').'/'.$item['id'].'/'.'edit'}}">
                                            <button class="btn btn-dark" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </a>
                                        <form class="del-data" action="{{url('cms/categories').'/'.$item['id']}}" method="POST" data-type="Category and all it's products">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" title="Delete">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                            
                                        </form>
                                        
                                    @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                                <tr>
                                    <td colspan="9"><i class="fas fa-exclamation-circle text-danger"></i> There are no categories to show</td>
                                </tr>
                        @endisset
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
                    <form action="{{url('cms/categories')}}" method="POST" enctype="multipart/form-data">
                    @csrf
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

@endsection('content')