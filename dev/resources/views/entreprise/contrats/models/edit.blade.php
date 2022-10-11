@extends('layouts.admin.admin')

@section('styles')
@endsection

@section('content')
@section('content')
@if (Auth::user()->role == "entreprise" OR Auth::user()->role == "admin" OR Auth::user()->role == "cabinet")
@php
$PackageEntreprise = $Abonnement->where('entreprise_id', Auth::user()->entreprise_id)->first()->package_id;
// $PackageEntreprise = $Packages::where('package_id', $AbonnementEntreprise->package_id)->first();
$ModuleEntreprise = $ModulePack->where('package_id', $PackageEntreprise);
@endphp
@endif
@include('layouts.admin.required.includes.pageName')

  <div class="row g-0">
    <div class="col-lg-12 pe-lg-2">
      <div class="card mb-3">
        <div class="card-header bg-light">
          <h5 class="mb-0">Modifier le modèle de contrat: {{$ModelsContrat->nom}}</h5>
        </div>

        <div class="card-body">

           <form action="{{route('entreprise.models-contrat.update', $ModelsContrat->id)}}" class="row g-3 needs-validation" novalidate="" method="POST" > @csrf
            <div class="col-md-4-12">
                <label class="form-label" for="nom">Nom du modèle de contrat</label>
                <input class="form-control" value="{{$ModelsContrat->nom}}" name="nom" id="nom" type="text"  required="" />
            </div>
            <div class="col-md-12">
                <label class="form-label" for="contrats_type_id">Type de contrat </label>
                <select class="form-select" name="contrats_type_id" id="contrats_type_id" >
                    <option selected="" disabled="" value="">Choisir</option>
                   @foreach ($TypesContrats as $typesContrat)
                   <option value="{{$typesContrat->id}}"   @if($ModelsContrat->contrats_type_id == $typesContrat->id) selected @endif>{{$typesContrat->nom}}</option>
                   @endforeach
                </select>
            </div>
            <div class="col-md-4-12">
                <label class="form-label" for="nom">Contenu du modèle de contrat</label>
                <textarea name="contenu" id="summary-ckeditor" class="form-control" id="" cols="30" rows="10">{!! $ModelsContrat->contenu !!}</textarea>
            </div>

            <div class="col-12">
                <button class="btn btn-primary" type="submit">Mettre à jour</button>
            </div>
        </form>

        </div>
      </div>


    </div>

  </div>

@endsection

@section('scripts')
    @include('layouts.admin.required.extensions.js.ckedito')
@endsection
