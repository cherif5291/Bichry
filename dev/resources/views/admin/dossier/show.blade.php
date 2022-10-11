@extends('layouts.admin.admin')

@section('styles')
@include('layouts.admin.required.extensions.styles.datatable')
@endsection

@section('content')


@include('layouts.admin.required.includes.pageName')
<div class="card mb-3">
    <div class="card-header position-relative  mb-7">


      <div class="avatar avatar-5xl avatar-profile"><img class="rounded-circle img-thumbnail shadow-sm" src="{{asset($Client->logo?? 'assets/no-image.jpg')}}" width="200" alt="" /></div>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-lg-8">
          <h4 class="mb-1">{{$Client->entreprise}}<span data-bs-toggle="tooltip" data-bs-placement="right" title="Verified"><small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small></span>
          </h4>
          <h5 class="fs-0 fw-normal">Représenté par: {{$Client->prenom}} {{$Client->nom}} | {{$Client->titre}}</h5>
          <p class="text-500">{{$Client->adresse}}, {{$Client->ville}}, {{$Client->pays}}</p>

          @if (Auth::user()->habilitation->fonctionnalites->where('module_id', 1)->first()->modifier == "yes")
          <a class="btn btn-info btn-sm px-3 ms-2" href="{{route('entreprise.client.edit', $Client->id)}}">Modifier</a>
          @else
              @include('layouts.admin.required.includes.controle.accessDeniedBtnEdit')
          @endif
          @if (Auth::user()->habilitation->fonctionnalites->where('module_id', 1)->first()->supprimer == "yes")
          <a class="btn btn-dark btn-sm px-3" type="button">Désactiver</a>

          <a class="btn btn-danger btn-sm px-3" type="button">Supprimer</a>
          @else
              @include('layouts.admin.required.includes.controle.accessDeniedBtnEdit')
          @endif

          <div class="border-dashed-bottom my-4 d-lg-none"></div>
        </div>
        <div class="col ps-2 ps-lg-3">

            <div class="flex-1">
              <h6 class="mb-0"> <i class="fa fa-phone"></i> {{$Client->telephone}}</h6>
            </div>
            <div class="flex-1">
              <h6 class="mb-0"><i class="fas fa-enveloppe"></i> {{$Client->email}}</h6>
            </div>
            <div class="flex-1">
              <h6 class="mb-0"><i class="fa fa-web"></i> {{$Client->website}}</h6>
            </div>
          </div>
      </div>
    </div>
  </div>
  <div class="row g-0">
    <div class="col-lg-8 pe-lg-2">
      <div class="card mb-3">
        <div class="card-header bg-light">
          <h5 class="mb-0">Dépenses Récente</h5>
        </div>

      </div>


    </div>
    <div class="col-lg-4 ps-lg-2">
      <div class="sticky-sidebar">
        <div class="card mb-3">
          <div class="card-header bg-light">
            <h5 class="mb-0">Activités</h5>
          </div>

        </div>

      </div>
    </div>
  </div>

@endsection

