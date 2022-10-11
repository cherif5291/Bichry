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
          <h5 class="mb-0">{{__('messages.add_taxe')}}:</h5>
        </div>

        <div class="card-body">
           <form action="{{route('entreprise.taxe.store')}}" class="row g-3 needs-validation" novalidate="" method="POST"> @csrf
            <div class="col-md-4-12">
                <label class="form-label" for="nom">{{__('messages.taxe_name')}}</label>
                <input class="form-control" name="nom" value="" id="nom" type="text"  required="" />
            </div>

            <div class="col-md-4-12">
                <label class="form-label" for="taux">{{__('messages.taxe_rate')}}</label>
                <input class="form-control" name="taux" value="" id="taux" type="taux"  required="" />
            </div>


            <div class="col-12">
                <button class="btn btn-primary" type="submit">{{__('messages.save')}}</button>
            </div>
            </form>
        </div>
      </div>


    </div>
    <div class="col-lg-8 ps-lg-2">
      <div class="sticky-sidebar">
        <div class="card mb-3">
          <div class="card-header bg-light">
            <h5 class="mb-0">{{__('messages.taxe_list')}}</h5>
          </div>
          <div class="card-body bg-light">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>{{__('messages.name')}}</th>
                        <th style="width: 30%">{{__('messages.rate')}}</th>
                        <th style="width: 30%">{{__('messages.action')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Taxes as $taxe)
                    <tr>

                        <td>{{$taxe->nom}}</td>
                        <td>{{$taxe->taux}}</td>
                        <td>
                            <small><a class="btn btn-success" href="{{route('entreprise.taxe.edit', $taxe->id)}}"><i class="fas fa-pencil-ruler"></i></a></small>
                            <small><a class="btn btn-danger" href="{{route('entreprise.taxe.delete', $taxe->id)}}"><i class="fas fa-trash-alt"></i></a></small>
                        </td>

                    </tr>
                    @endforeach


                </tbody>
                <tfoot>
                    <tr>
                        <th>{{__('messages.name')}}</th>
                        <th style="width: 30%">{{__('messages.rate')}}</th>
                        <th style="width: 30%">{{__('messages.action')}}</th>
                    </tr>
                </tfoot>
            </table>


        </div>
        </div>

      </div>
    </div>
  </div>

@endsection

