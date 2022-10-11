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
          <h5 class="mb-0 text-light" >{{__('messages.add_contract')}}</h5>
        </div>

        <div class="card-body">
           <form action="{{route('entreprise.contrat.store')}}" class="row g-3 needs-validation" novalidate="" method="POST"> @csrf
            <div class="col-md-4-12">
                <label class="form-label" for="nom">{{__('messages.contract_name')}}</label>
                <input class="form-control" name="nom" id="nom" type="text"  required="" />
            </div>

            <div class="col-md-12">
                <label class="form-label" for="contrats_model_id">{{__('messages.contract_model_choice')}}</label>
                <select class="form-select" name="contrats_model_id" id="contrats_model_id" >
                    <option selected="" disabled="" value="">{{__('messages.chose')}}</option>
                   @foreach ($ModelsContrats as $modelscontrat)
                   <option value="{{$modelscontrat->id}}">{{$modelscontrat->nom}} ({{$modelscontrat->contratsType->nom}})</option>
                   @endforeach
                </select>
            </div>

            <div class="col-md-12">
                <label class="form-label" for="interesse">{{__('messages.contract_linked_to')}}?</label>
                <select class="form-select" name="interesse" id="interesse" >
                    <option selected="" disabled="" value="">{{__('messages.chose')}}</option>

                   @foreach ($Clients as $client)
                    @php
                        $value2 = "C".$client->id;
                    @endphp
                   <option value="{{$value2}}" >{{$client->nom}} ({{__('messages.clients')}})</option>
                   @endforeach


                   @foreach ($Employes as $employe)
                    @php
                        $value3 = "F".$employe->id;
                    @endphp
                   <option value="{{$value3}}">{{$employe->nom}} ({{__('messages.employers')}})</option>
                   @endforeach


                   @foreach ($Fournisseurs as $fournisseur)
                   @php
                   $value = "F".$fournisseur->id;
                   @endphp
                   <option value="{{$value}}">{{$fournisseur->nom}} ({{__('messages.vendors')}})</option>
                   @endforeach


                </select>
            </div>

            <div class="col-md-4-12">
                <label class="form-label" for="montant">{{__('messages.contract_amount')}}</label>
                <input class="form-control" name="montant" id="montant" type="text"  required="" />
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
          <div class="card-header "  style="background-color: #232e3c">
            <h5 class="mb-0 text-light">{{__('messages.contract_list')}}</h5>
          </div>
          <div class="card-body bg-light">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>{{__('messages.contract_name')}}</th>
                        <th>{{__('messages.type')}}</th>
                        <th>{{__('messages.concerned')}}</th>
                        <th>{{__('messages.linked_invoice')}}</th>
                        <th style="width: 30%">{{__('messages.action')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Contrats as $contrat)
                    <tr>

                        <td>{{$contrat->nom}}</td>
                        <td>{{$contrat->type}}</td>
                        @if ($contrat->clientsEntreprise)
                        <td>{{$contrat->clientsEntreprise->entreprise}}</td>
                        @elseif ($contrat->employesEntreprise)
                        <td>{{$contrat->clientsEntreprise->prenom}} {{$contrat->clientsEntreprise->nom}}</td>
                        @elseif ($contrat->fournisseur)
                        <td>{{$contrat->fournisseur->entreprise}}</td>
                        @endif
                        <td>{{$contrat->montant}}</td>
                        {{-- @if ($contrat->facture)
                        <td>{{$contrat->facture->numero_facture ?? $contrat->facture->numero_recu}}</td>
                        @else
                        <td> -- </td>
                        @endif --}}

                        <td>
                            <small><a class="btn btn-success" href="{{route('entreprise.contrat.show', $contrat->id)}}">{{__('messages.edit')}}</a></small>
                            <small><a class="btn btn-danger" href="{{route('entreprise.contrat.delete', $contrat->id)}}">{{__('messages.delete')}}</a></small>
                        </td>

                    </tr>
                    @endforeach


                </tbody>
                <tfoot>
                    <tr>
                        <th>{{__('messages.contract_name')}}</th>
                        <th>{{__('messages.type')}}</th>
                        <th>{{__('messages.concerned')}}</th>
                        <th>{{__('messages.linked_invoice')}}</th>
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

