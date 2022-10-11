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
@include('layouts.admin.required.includes.messages')

  <div class="row g-0">
    <div class="col-lg-4 pe-lg-2">
      <div class="card mb-3">
        <div class="card-header " style="background-color: #232e3c">
          <h5 class="mb-0 text-light">{{__('messages.contract_add_form')}}</h5>
        </div>

        <div class="card-body">
           <form action="{{route('entreprise.type-contrat.store')}}" class="row g-3 needs-validation" novalidate="" method="POST"> @csrf
            <div class="col-md-4-12">
                <label class="form-label" for="nom">{{__('messages.contract_type_name')}}</label>
                <input class="form-control" name="nom" id="nom" type="text"  required="" />
            </div>

            <div class="col-md-4-12">
                <label class="form-label" for="nom">{{__('messages.description')}}</label>
                <textarea  class="form-control" name="description" id="" cols="30" rows="6"></textarea>
            </div>

            <div class="col-12">
                <button class="btn btn-primary" type="submit">{{__('messages.save')}}</button>
            </div>
            </form>
        </div>
      </div>


    </div>
    <div class="col-lg-8 ps-lg-2">
      <div class="">
        <div class="card mb-3">
          <div class="card-header"  style="background-color: #232e3c">
            <h5 class="mb-0 text-light">{{__('messages.contract_types_list')}}</h5>
          </div>
          <div class="card-body bg-light">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>{{__('messages.name')}}</th>
                        <th style="width: 30%">{{__('messages.description')}}</th>
                        <th style="width: 30%">{{__('messages.action')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($TypesContrats as $typesContrats)
                    <tr>

                        <td>{{$typesContrats->nom}}</td>
                        <td>{{$typesContrats->description}}</td>
                        <td>
                            <small><a class="btn btn-success" href="{{route('entreprise.type-contrat.edit', $typesContrats->id)}}">Modifier</a></small>
                            <small><a class="btn btn-danger" href="{{route('entreprise.type-contrat.delete', $typesContrats->id)}}">Supprimer</a></small>
                        </td>

                    </tr>
                    @endforeach


                </tbody>
                <tfoot>
                    <tr>
                        <th>{{__('messages.name')}}</th>
                        <th style="width: 30%">{{__('messages.description')}}</th>
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

