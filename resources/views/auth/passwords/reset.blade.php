<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    @include('layouts.admin.required.meta')
    @include('layouts.admin.required.styles')
</head>


<body>
    <main class="main" id="top">
        <div class="container-fluid" style="background-image: url('{{asset('assets/admin/img/login_lg.jpeg')}}'); background-size:cover; background-position:center">
            <div class="row min-vh-100 flex-center g-0">

                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                <div class="col-lg-8 col-xxl-5 py-3 position-relative"><img class="bg-auth-circle-shape"
                        src="../../../assets/img/icons/spot-illustrations/bg-shape.png" alt="" width="250"><img
                        class="bg-auth-circle-shape-2" src="../../../assets/img/icons/spot-illustrations/shape-1.png"
                        alt="" width="150">
                    <div class="card overflow-hidden z-index-1">
                        
                        <div class="card-body p-0">
                            
                            <div class="row g-0 h-100">
                                <div class="col-md-5 text-center" style="background-image: url('{{asset('assets/admin/img/login_sm.jpeg')}}'); background-size:cover; background-position:center">
                                    <div class="position-relative p-4 pt-md-5 pb-md-7 light">
                                        <div class="bg-holder bg-auth-card-shape"
                                            style="background-image:url(../../../assets/img/icons/spot-illustrations/half-circle.png);">
                                        </div>
                                        <!--/.bg-holder-->

                                        <div class="z-index-1 position-relative"><a
                                                class="link-light mb-4 font-sans-serif fs-4 d-inline-block fw-bolder"
                                                href="../../../index.html">Bilan Pro</a>
                                           
                                        </div>
                                    </div>
                                    <div class="mt-3 mb-4 mt-md-4 mb-md-5 light">
                                        <p class="mb-0 mt-4 mt-md-5 fs--1 fw-semi-bold text-white opacity-75">Read our
                                            <a class="text-decoration-underline text-white" href="#!">terms</a> and <a
                                                class="text-decoration-underline text-white" href="#!">conditions </a>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-7 d-flex flex-center">
                                    <div class="p-4 p-md-5 flex-grow-1">
                                        <div class="text-center text-md-start">
                                            <h4 class="mb-0"> Mot de passe oublié ?</h4>
                                            <p class="mb-4"><small>Saisir votre email pour recevoir un lien de
                                                    changement de mot de passe.</small></p>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-sm-8 col-md">
                                                <form class="mb-3" method="POST" action="{{ route('password.update') }}">
                                                    @csrf
                                                    <input type="hidden" name="token" value="{{ $token }}">

                                                    <label for="email"
                                                        class="form-label text-md-right">{{ __('Email') }}</label>
                                                    <input class="form-control @error('email') is-invalid @enderror"
                                                        id="email" name="email" value="{{ old('email') }}" required
                                                        autocomplete="email" autofocus type="email"
                                                        placeholder="exemple@domain.com" />
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                    <div class="mb-3"></div>
                                                    <label for="password"
                                                        class="form-label text-md-right">{{ __('Mot de passe') }}</label>
                                                    <input id="password" type="password"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        name="password" required autocomplete="new-password">

                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                    <div class="mb-3"></div>
                                                    <label for="password-confirm"
                                                        class="form-label text-md-right">{{ __('Confirmer
                                                        mot de passe') }}</label>

                                                    <input id="password-confirm" type="password" class="form-control"
                                                        name="password_confirmation" required
                                                        autocomplete="new-password">

                                                    <button class="btn btn-primary d-block w-100 mt-3" type="submit"
                                                        name="submit">Reinitialisé mot de passe</button>
                                                </form><a class="fs--1 text-600" href="{{ route('login') }}">Se
                                                    connecter à mon compte<span
                                                        class="d-inline-block ms-1">&rarr;</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include('layouts.admin.required.scripts')

</body>

</html>






{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password 2') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address')
                                }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ $email ?? old('email') }}" required autocomplete="email"
                                    autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password')
                                }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm
                                Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
--}}
