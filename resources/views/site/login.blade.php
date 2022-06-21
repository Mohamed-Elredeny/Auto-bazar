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
        <form class="signform m-5" method="get" action="{{route('home')}}">
            <h5 class="text-center font-weight-bold mb-4" >
                Login
            </h5>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control inputform" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control inputform" id="exampleInputPassword1">
            </div>
            <div class="form-group">
                <p class="">Forgot Your Password?<a href="text-decoration-none"> Click here</a></p>
            </div>
            <button type="submit" class="btn btn-primary w-100 font-weight-bold">LogIn</button><br><br>
            <a class=" font-weight-bold" href="text-decoration-none">Doesn’t Have an Account? Sign up Here</a><br><br>
        </form>
    </div>

@stop
