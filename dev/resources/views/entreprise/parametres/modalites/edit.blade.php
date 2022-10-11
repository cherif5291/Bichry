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
    <div class="col-lg-4 pe-lg-2">
      <div class="card mb-3">
        <div class="card-header bg-light">
          <h5 class="mb-0">Modification du modalité de paiement: {{$Modalite->nom}}</h5>
        </div>

        <div class="card-body">
           <form action="{{route('entreprise.modalite-paiement.update',$Modalite->id)}}" class="row g-3 needs-validation" novalidate="" method="POST"> @csrf
            <div class="col-md-4-12">
                <label class="form-label" for="nom">Nom de la modalité</label>
                <input class="form-control" name="nom" value="{{$Modalite->nom}}" id="nom" type="text"  required="" />
            </div>

            <div class="col-md-4-12">
                <label class="form-label" for="duree">Durée en jours</label>
                <input class="form-control" name="duree" value="{{$Modalite->duree}}" id="duree" type="text"  required="" />
            </div>


            <div class="col-12">
                <button class="btn btn-primary" type="submit">Mettre à jour</button>
            </div>
            </form>
        </div>
      </div>


    </div>
    <div class="col-lg-8 ps-lg-2">
      <div class="sticky-sidebar">
        <div class="card mb-3">
          <div class="card-header bg-light">
            <h5 class="mb-0">Liste des modalités</h5>
          </div>
          <div class="card-body bg-light">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th style="width: 30%">Durée</th>
                        <th style="width: 30%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Modalites as $modalite)
                    <tr>

                        <td>{{$modalite->nom}}</td>
                        <td>{{$modalite->duree}} jours</td>
                        <td>
                            <small><a class="btn btn-success" href="{{route('entreprise.modalite-paiement.edit', $modalite->id)}}"><i class="fas fa-pencil-ruler"></i></a></small>
                            <small><a class="btn btn-danger" href="{{route('entreprise.modalite-paiement.delete', $modalite->id)}}"><i class="fas fa-trash-alt"></i></a></small>
                        </td>

                    </tr>
                    @endforeach


                </tbody>
                <tfoot>
                    <tr>
                        <th>Nom</th>
                        <th style="width: 30%">Durée</th>
                        <th style="width: 30%">Action</th>
                    </tr>
                </tfoot>
            </table>


        </div>
        </div>

      </div>
    </div>
  </div>

@endsection

