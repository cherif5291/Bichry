@extends('layouts.admin.admin')

@section('styles')
@include('layouts.admin.required.extensions.styles.datatable')
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
  <div class="row g-0">

    <div class="col-lg-12 ps-lg-2">
    <form action="{{route('entreprise.contrat.updateContent', $Contrat->id)}}" class="row g-3 needs-validation" novalidate="" method="POST" > @csrf

      <div class="sticky-sidebar">
        <div class="card mb-3">
            <div class="card-body">
              <div class="row justify-content-between align-items-center">
                <div class="col-md">
                  <h5 class="mb-2 mb-md-0">Contenu du modèle de contrat</h5>
                </div>
                <div class="col-auto">
                    <button class="btn btn-primary" type="submit">Mettre à jour</button>
                </div>
              </div>
            </div>
        </div>
        <div class="card mb-3">

            <div class="card-footer bg-light">

                    <div class="col-md-4-12">
                        <textarea name="contenu" id="summary-ckeditor" class="form-control" id="" cols="30" rows="10">{!! $Contrat->contenu !!}</textarea>
                    </div>

                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Mettre à jour</button>
                    </div>

            </div>
          </div>

      </div>
    </form>
    </div>

  </div>

@endsection

@section('scripts')

    @include('layouts.admin.required.extensions.js.ckedito')
@endsection
