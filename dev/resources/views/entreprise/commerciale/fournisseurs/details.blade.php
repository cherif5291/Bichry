@extends('layouts.admin.admin')

@section('styles')
@include('layouts.admin.required.extensions.styles.datatable')
@endsection

@section('content')

@include('layouts.admin.required.includes.pageName')
<div class="card mb-3">
    <div class="card-header position-relative  mb-7">


      <div class="avatar avatar-5xl avatar-profile"><img class="rounded-circle img-thumbnail shadow-sm" src="{{asset($Fournisseur->logo?? 'assets/no-image.jpg')}}" width="200" alt="" /></div>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-lg-8">
          <h4 class="mb-1">{{$Fournisseur->entreprise}}<span data-bs-toggle="tooltip" data-bs-placement="right" title="Verified"><small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small></span>
          </h4>
          <h5 class="fs-0 fw-normal">Représenté par: {{$Fournisseur->prenom}} {{$Fournisseur->nom}} | {{$Fournisseur->titre}}</h5>
          <p class="text-500">{{$Fournisseur->adresse}}, {{$Fournisseur->ville}}, {{$Fournisseur->pays}}</p>
          <a class="btn btn-success btn-sm px-3 ms-2" type="button">Ajouter Dépenses</a>

          <a class="btn btn-info btn-sm px-3 ms-2" href="{{route('entreprise.fournisseur.edit', $Fournisseur->id)}}">Modifier</a>
          <a class="btn btn-dark btn-sm px-3" type="button">Désactiver</a>

            <a class="btn btn-danger btn-sm px-3" type="button">Supprimer</a>
          <div class="border-dashed-bottom my-4 d-lg-none"></div>
        </div>
        <div class="col ps-2 ps-lg-3">

            <div class="flex-1">
              <h6 class="mb-0"> <i class="fa fa-phone"></i> {{$Fournisseur->telephone}}</h6>
            </div>
            <div class="flex-1">
              <h6 class="mb-0"><i class="fas fa-enveloppe"></i> {{$Fournisseur->email}}</h6>
            </div>
            <div class="flex-1">
              <h6 class="mb-0"><i class="fa fa-web"></i> {{$Fournisseur->website}}</h6>
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

