@extends('layouts.app_martina')

@section('content')
<div class="container">
    <br><br>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">{{ __('site.login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('site.email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('site.password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn-primary" style="padding:10px;border-radius: 10px;background:#17286E">
                                    {{ __('site.login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}" style="color:#17286E">
                                        {{ __('site.forgitPassword') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                        <br><br>
                        @if($errors->any())
                            <center>
                                <h6 class="btn btn-danger">{{$errors->first()}}</h6>
                            </center>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
