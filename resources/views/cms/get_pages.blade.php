@extends('cms.cmsmaster')

@section('content')
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
                            <li class="breadcrumb-item"><a href="{{url('cms/dashboard')}}" class="breadcrumb-link">CMS</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Pages</li>
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
        <div class="col-xl-8 col-lg-8 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">New Page</h4>
                </div>
                <div class="card-body">
                    <form action="{{url('cms/pages')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="mb-3">
                            <input type="text" name="name" class="form-control" placeholder="Page Name" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" name="url" class="form-control" placeholder="Page URL" required>
                        </div>
                        <hr class="mb-4">
                        <div class="mb-3">
                            <input type="text" name="headline" class="form-control" placeholder="Headline" required>
                        </div>
                        <div class="mb-3">
                            <textarea id="summernote" name="content" class="form-control" required></textarea>
                        </div>
                        <div class="custom-file mb-3">
                            <input type="file" name="image" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Upload Page Image (optional)</label>
                        </div>
                        
                        <hr class="mb-4">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Create New Page</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- ALL PAGES -->
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
            @isset($pages)
            <div class="card">
                <h5 class="card-header">All Pages</h5>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="cms-table table">
                            <thead class="bg-light">
                                <tr class="border-0">
                                    <th class="border-0">Name</th>
                                    <th class="border-0">Created At</th>
                                    <th class="border-0">Updated At</th>
                                    <th class="border-0">Edit/Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                        @isset($pages)
                            @foreach($pages as $item)
                                <tr>
                                    <!-- SHOW PAGE -->
                                    <td>{{$item['name']}}</td>                                 
                                    <td>{{$item['created_at']}}</td>
                                    <td>{{$item['updated_at']}}</td>
                                    <td>
                                        <a href="{{url('cms/pages').'/'.$item['id'].'/'.'edit'}}">
                                            <button class="btn btn-dark" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </a>
                                        <form class="del-data" action="{{url('cms/pages').'/'.$item['id']}}" method="POST" data-type="Page">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" title="Delete">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                                <tr>
                                    <td colspan="9"><i class="fas fa-exclamation-circle text-danger"></i> There are no pages to show</td>
                                </tr>
                        @endisset
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @else
            <h4><i class="fas fa-exclamation-circle text-danger"></i> No pages has been created</h4>
            @endisset
        </div>
    </div>
</div>

@endsection('content')