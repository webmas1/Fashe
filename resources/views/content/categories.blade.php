@extends('master')

@section('content')

<!-- Banner -->
<section class="banner bgwhite p-t-40 p-b-40">
    <div class="container">
        <div class="row">
            @foreach ($categories as $data)
            <div class="col-sm-10 col-md-4 col-lg-4 m-l-r-auto">
                <div class="block1 hov-img-zoom pos-relative m-b-30">
                    <img class="cat-img" src="{{url('images/categories').'/'.$data['image']}}" alt="image of category">

                    <div class="block1-wrapbtn w-size2">
                        <!-- Button -->
                        <a href="{{url('/categories').'/'.$data['url_name']}}" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                            {{$data['name']}}
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


@endsection('content')