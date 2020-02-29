@extends('cms.cmsmaster')

@section('content')
<div class="dashboard-content">
    <!-- ============================================================== -->
    <!-- pageheader  -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Products</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('cms/dashboard')}}" class="breadcrumb-link">CMS</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Products</li>
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
                <!-- BUTTON IF CATEGORY IS CHOSEN -->
                <div class="input-group-append be-addon mb-3 w-20 mt-2 ml-2">
                @isset($chosen_category)
                    <button type="button" data-toggle="dropdown" class="btn btn-dark dropdown-toggle">{{$chosen_category['name']}}</button>
                @else
                    <button type="button" data-toggle="dropdown" class="btn btn-dark dropdown-toggle">Choose Category</button>
                @endisset
                    <div class="dropdown-menu">
                        @foreach($categories as $category)
                        <a class="dropdown-item cat-prod" href="{{url('cms/products').'/'.$category['id']}}">{{$category['name']}}</a>
                        @endforeach
                    </div>
                </div>

                @isset($chosen_category)

                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="cms-table table">
                            <thead class="bg-light">
                                <tr class="border-0">
                                    <th class="border-0">Id</th>
                                    <th class="border-0">Image</th>
                                    <th class="border-0">Name</th>
                                    <th class="border-0">Description</th>
                                    <th class="border-0">Price</th>
                                    <th class="border-0">Created At</th>
                                    <th class="border-0">Updated At</th>
                                    <th class="border-0">Edit/Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                        @if($data)
                            @foreach($data as $item)
                                <tr>
                                    <td class="bg-secondary">{{$item['id']}}</td>
                                @if($item['id'] == @$id)
                                    <!-- EDIT PRODUCT -->
                                    <form action="{{url('cms/products').'/'.$item['id']}}" method="POST" enctype="multipart/form-data">
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
                                        <input type="text" name="desc" class="form-control w-100" value="{{$item['description']}}" required>
                                    </td>
                                    <td>
                                        <input type="number" name="price" class="form-control" value="{{$item['price']}}" required>
                                    </td>
                                    @else
                                    <!-- SHOW PRODUCT -->
                                    <td>
                                        <div class="m-r-10">
                                            <img src="{{url('images/categories').'/'.$item['image']}}" alt="user" class="rounded" width="45">
                                        </div>
                                    </td>

                                    <td>{{$item['name']}}</td>
                                    <td>{{$item['description']}}</td>
                                    <td>{{$item['price']}}</td>

                                    @endif
                                    
                                    <td>{{$item['created_at']}}</td>
                                    <td>{{$item['updated_at']}}</td>
                                    <td>
                                    @if($item['id'] == @$id)
                                        <button class="btn btn-success" type="submit" name="submit">SAVE</button>
                                        <a class="d-inline-block mt-1" href="{{url('cms/products').'/'.$chosen_category['id']}}">CANCEL</a>
                                    </form>
                                    @else
                                        <a href="{{url('cms/products').'/'.$item['id'].'/'.'edit'}}">
                                            <button class="btn btn-dark" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </a>
                                        <form class="del-data" action="{{url('cms/products').'/'.$item['id']}}" method="POST" data-type="Product">
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
                                    <td colspan="9">There are no products to show</td>
                                </tr>
                        @endif
                            </tbody>
                        </table>
                    </div>
                </div>

                @else
        
                <h4 class="ml-3"><i class="fas fa-exclamation-circle text-danger"></i> No category has been chosen, please pick a category to show it's products</h4>
               
                @endisset

            </div>
        </div>


        <!-- ADD NEW PRODUCT -->
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">New Product</h4>
                </div>
                
                <div class="card-body">
                    <form action="{{url('cms/products')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <select class="form-control" name="cat_id" required>
                                <option value="" selected disabled hidden>Choose Category</option>
                            @foreach($categories as $category)
                                @isset($chosen_category)
                                <option value="{{$category['id']}}" {{ $chosen_category['id'] == $category['id'] ? 'selected' : '' }}>{{$category['name']}}</option>
                                @else
                                <option value="{{$category['id']}}">{{$category['name']}}</option>
                                @endisset
                            @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <input class="form-control" type="text" name="name" placeholder="Product Name" required>
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" name="desc" placeholder="Description" required></textarea>
                        </div>
                        <div class="mb-3">
                            <input class="form-control" type="number" name="price" placeholder="Price" required>
                        </div>
                        <div class="custom-file mb-3">
                            <input type="file" name="image" class="custom-file-input" id="customFile" required>
                            <label class="custom-file-label" for="customFile">Upload Product Image</label>
                        </div>
                        <hr class="mb-4">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Create New Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection('content')