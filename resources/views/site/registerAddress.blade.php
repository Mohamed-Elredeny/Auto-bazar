@extends('layouts.app_martina')
@section('content')
    <div class="w-50 m-auto pt-5">
        <div class="text-center mb-5">
            <div class="navbar-brand logo">
                <img src="{{asset('assets/site/images/site/logo.png')}}" width="45" height="45" class="d-inline-block align-top" alt="">
                <br>
                AutoBazar
            </div>
        </div>
        <form class="signform m-5">
            <h5 class="text-center font-weight-bold mb-4">
                Address
            </h5>

            <div class="form-group">
                <label for="exampleInputEmail1">Choose City and Area</label>
                <input type="text" class="form-control inputform" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Mobile Number</label>
                <input type="text" class="form-control inputform" id="exampleInputPassword1">
            </div>

            <div class="form-group">
                <p class=""><a href="text-decoration-none"> Skip for Now > </a></p>
            </div>
            <a type="submit" class="btn btn-primary w-100 font-weight-bold" href="{{route('register.social')}}">Next</a><br><br>
        </form>
    </div>

@stop
