@extends('layouts.admin.auth')
@section('form')
<div class="row flex-between-center">
    <div class="col-auto">
        <h3>Connexiodddn</h3>
        @include('layouts.admin.required.includes.messages')
    </div>
</div>
<form  action="{{route('verication.doublefactorauth')}}" method="POST"> @csrf
    <input class="form-control" type="email">
    <button class="btn btn-primary d-block w-100 mt-3" type="submit" >Connexion</button>
</form>
<form method="POST" action="{{route('verication.doublefactorauth')}}">
    @csrf
    <div class="mb-3">
        <label class="form-label" for="card-email">Votre adresse email</label>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
         required autocomplete="email" autofocus>

    </div>


        <div class="mb-3">
            <button class="btn btn-primary d-block w-100 mt-3" type="submit" >Connexion</button>
        </div>
</form>
@endsection


{{-- @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

<div class="card-body">
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6 offset-md-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                </button>

                @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
                @endif
            </div>
        </div>
    </form>
</div>
</div>
</div>
</div>
</div>
@endsection --}}
