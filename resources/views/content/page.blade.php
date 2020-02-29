@extends('master')

@section('content')

<!-- Product Detail -->
<div class="container bgwhite p-t-35 p-b-80">
    <div class="flex-w flex-sb">
    @if($page['image'])
        <div class="w-size13 p-t-30 respon5 product-img">
            <img src="{{url('/images/pages').'/'.$page['image']}}" alt="IMG-PAGE">
        </div>
        <div class="w-size14 p-t-30 respon5">
    @else
        <div class="p-t-30 respon5">
    @endif
            <h2 class="product-detail-name p-b-13 text-capitalize">
                {{$page['name']}}
            </h2>

            <h4 class="product-detail-name m-text16 p-b-13 text-capitalize">
                {{$page['headline']}}
            </h4>

            <p class="p-t-10">
                {!!$page['content']!!}
            </p>
            
        </div>
    

        
    </div>
</div>

@endsection('content')