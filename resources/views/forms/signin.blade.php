@extends('master')

@section('content')

<!-- content page -->
<section class="bgwhite p-t-66 p-b-60">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-4 p-b-30">
                <form action="{{url('user/signin')}}" method="POST">
                    @csrf
                    <h4 class="m-text26 p-b-36 p-t-15 text-center">
                        Sign In 
                    </h4>

                    <div class="bo4 of-hidden size15 m-b-20">
                        <input class="sizefull s-text7 p-l-22 p-r-22" type="email" name="email" placeholder="Email Address" required>
                    </div>

                    <div class="bo4 of-hidden size15 m-b-20">
                        <input class="sizefull s-text7 p-l-22 p-r-22" type="password" name="password" placeholder="Password" required>
                    </div>

                    <div class="w-size19 float-right mt-2">
                        <!-- Button -->
                        <input class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4" type="submit" name="submit" value="Sign In">
                    </div>
                </form> 

                <p class="s-text7 w-size27 mt-4">Don't have an account? <a href="{{url('user/signup')}}">Sign Up</a></p>
            </div>
        </div>
    </div>
</section>

@endsection('content')