@extends('cms.cmsmaster')

@section('content')
<div class="dashboard-content">
    <!-- ============================================================== -->
    <!-- pageheader  -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Users</h2>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('cms/dashboard')}}" class="breadcrumb-link">CMS</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Users</li>
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
        <div class="col-xl-9 col-lg-9 col-md-6 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">All Users</h5>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="cms-table table">
                            <thead class="bg-light">
                                <tr class="border-0">
                                    <th class="border-0">ID</th>
                                    <th class="border-0">First Name</th>
                                    <th class="border-0">Last Name</th>
                                    <th class="border-0">Email</th>
                                    <th class="border-0">Password</th>
                                    <th class="border-0">Role</th>
                                    <th class="border-0">Created At</th>
                                    <th class="border-0">Updated At</th>
                                    <th class="border-0">Edit/Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                        @isset($data)
                            @foreach($data as $item)
                                <tr>
                                    <td class="bg-secondary">{{$item['id']}}</td>
                                    @if($item['id'] == @$id)
                                    <!-- EDIT CATEGORY -->
                                    <form action="{{url('cms/users').'/'.$item['id']}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <td>
                                        <input type="text" name="first_name" class="form-control" value="{{$item['first_name']}}" required>
                                    </td>
                                    <td>
                                        <input type="text" name="last_name" class="form-control" value="{{$item['last_name']}}" required>
                                    </td>
                                    <td>{{$item['email']}}</td>
                                    <td>•••••••••</td>
                                    <td>
                                        <select name="role" class="form-control" required>
                                        @if($item['role'] == 1)
                                            <option value="1" selected>User</option>
                                            <option value="6">Admin</option>
                                        @elseif($item['role'] == 6)
                                            <option value="1">User</option>
                                            <option value="6" selected>Admin</option>
                                        @endif
                                        </select>
                                    </td>
                                    @else
                                    <!-- SHOW CATEGORY -->

                                    <td><a href="{{url('cms/orders').'?user='.$item['id']}}">{{$item['first_name']}}</a></td>
                                    <td><a href="{{url('cms/orders').'?user='.$item['id']}}">{{$item['last_name']}}</a></td>
                                    <td>{{$item['email']}}</td>
                                    <td>•••••••••</td>
                                     
                                    @if($item['role'] == 1)
                                    <td>User</td>
                                    @elseif($item['role'] == 6)
                                    <td class="text-danger">Admin</td>
                                    @endif 

                                    @endif
                                    
                                    <td>{{$item['created_at']}}</td>
                                    <td>{{$item['updated_at']}}</td>
                                    <td>
                                    @if($item['id'] == @$id)
                                        <button class="btn btn-success" type="submit" name="submit">SAVE</button>
                                        <a class="d-inline-block mt-1" href="{{url('cms/users')}}">CANCEL</a>
                                    </form>
                                    @else
                                        <a href="{{url('cms/users').'/'.$item['id'].'/'.'edit'}}">
                                            <button class="btn btn-dark" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </a>
                                        <form class="del-cat" action="{{url('cms/users').'/'.$item['id']}}" method="POST">
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
                                    <td colspan="9"><i class="fas fa-exclamation-circle text-danger"></i> There are no users to show</td>
                                </tr>
                        @endisset
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- ADD NEW CATEGORY -->
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">New User</h4>
                </div>
                <div class="card-body">
                    <form action="{{url('cms/users')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="mb-3">
                            <input type="text" name="first_name" class="form-control" placeholder="First Name" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" name="last_name" class="form-control" placeholder="Last Name" required>
                        </div>
                        <hr class="mb-4">
                        <div class="mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="mb-3">
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
                        </div>
                        <hr class="mb-4">
                        <td>
                            <select name="role" class="form-control" required>
                                <option value="1" selected>User</option>
                                <option value="6">Admin</option>
                            </select>
                        </td>
                        
                        <hr class="mb-4">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Create New User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection('content')