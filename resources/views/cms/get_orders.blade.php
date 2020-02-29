@extends('cms.cmsmaster')

@section('content')
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
                            <li class="breadcrumb-item"><a href="{{url('cms/dashboard')}}" class="breadcrumb-link">CMS</a></li>
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
                            @isset($data)
                                @foreach($data as $order)
                                <tr>
                                    <td class="bg-secondary">{{$order['id']}}</td>
                                    <td>{{$order['user_id']}}</td>
                                    <td>
                                    @foreach((unserialize($order['data'])) as $item)
                                        <p><span class="text-primary">Item: </span>{{$item['name']}}<br>
                                        <span class="text-primary">Quantity: </span>{{$item['quantity']}}<br>
                                        <span class="text-primary">Price: </span>${{$item['price']}}</p>
                                    @endforeach
                                    </td>
                                    <td>${{$order['total']}}</td>
                                    <td>{{$order['created_at']}}</td>
                                    <td>{{$order['updated_at']}}</td>
                                    <td>
                                    @if($order['payment'] == 2)
                                        <span class="text-danger">Not paid</span>
                                    @elseif($order['payment'] == 1)
                                        <span class="text-success">Paid up</span>
                                    @endif
                                    </td>
                                    <td>
                                    @if($order['sent'] == 2)
                                        <form action="{{url('cms/orders').'/'.$order['id']}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PATCH')
                                            <button class="btn btn-dark" type="submit" name="mark_as_sent">Mark as sent</button>
                                        </form>
                                    @elseif($order['sent'] == 1)
                                        <span class="text-success">Sent</span>
                                    @endif
                                    </td>
                                    <td>
                                        <form class="del-cat" action="{{url('cms/orders').'/'.$order['id']}}" method="POST">
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
                                    <td colspan="9"><i class="fas fa-exclamation-circle text-danger"></i> There are no orders to show</td>
                                </tr>
                            @endisset
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection('content')