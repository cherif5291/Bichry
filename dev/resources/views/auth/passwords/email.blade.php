

@extends('layouts.admin.auth')
@section('form')
<div class="text-center text-md-start">
    <h4 class="mb-0"> Mot de passe oublié ?</h4>
    <p class="mb-4"><small>Saisir votre email pour recevoir un lien de changement de mot de passe.</small></p>
  </div>
  <div class="row justify-content-center">
    <div class="col-sm-8 col-md">
      <form class="mb-3" method="POST" action="{{ route('password.email') }}">
          @csrf
        <input class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus type="email" placeholder="exemple@domain.com" />
        @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        <div class="mb-3"></div>
        <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">Recevoir lien de reinitialisation</button>
      </form><a class="fs--1 text-600" href="{{ route('login') }}">Se connecter à mon compte<span class="d-inline-block ms-1">&rarr;</span></a>
    </div>
  </div>
@endsection


