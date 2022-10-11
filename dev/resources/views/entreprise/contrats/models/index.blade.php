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
@include('layouts.admin.required.includes.pageName')

  <div class="row g-0">

    <div class="col-lg-12 ps-lg-2">
      <div class="sticky-sidebar">
        <div class="card mb-3">
          <div class="card-header bg-light d-flex justify-content-between">
            <h5 class="mb-0">Liste des modèles de contrat</h5>
            <a class="btn btn-success" href="{{route('entreprise.models-contrat.add')}}">Ajouter un modèle</a>
          </div>
          <div class="card-body bg-light">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th style="width: 50%">Nom du modèle de contrat</th>
                        <th>Type de contrats</th>
                        <th >Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ModelsContrats as $modelsContrat)
                    <tr>
                        <td>{{$modelsContrat->nom}}</td>
                        <td>{{$modelsContrat->contratsType->nom}}</td>
                        {{-- $Categories->find( --}}
                        <td>
                            <small><a class="btn btn-success" href="{{route('entreprise.models-contrat.edit', $modelsContrat->id)}}">Modifier</a></small>
                            <small><a class="btn btn-danger" href="{{route('entreprise.model-contrat.delete', $modelsContrat->id)}}">Supprimer</a></small>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th style="width: 50%">Nom du modèle de contrat</th>
                        <th>Type de contrats</th>
                        <th >Action</th>
                    </tr>
                </tfoot>
            </table>

        </div>
        </div>

      </div>
    </div>
  </div>

@endsection

