@extends('layouts.admin.admin')

@section('styles')
@include('layouts.admin.required.extensions.styles.datatable')
@endsection

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
   
    <div class="col-lg-12 ps-lg-2">
      <div class="">
        <div class="card mb-3" style="min-height: 90vh !important">
          <div class="card-header"  style="background-color: #232e3c">
            <h5 class="mb-0 text-light">{{__('messages.accounting_account_list')}} </h5>
          </div>
          <div class="card-body bg-light table-responsive scrollbar">
           
            <table id="example" class="table table-hover table-striped overflow-hidden" style="width:100%">
                <thead class="text-light" style="background-color: #232e3c">
                    <tr>
                        <th>Nom</th>
                        <th>Numéro de compte</th>
                        <th style="width: 2%">{{__('messages.action')}}</th>
    
                    </tr>
                </thead>
                <tbody>

                    @foreach ($ComptesComptables as $compte)
                  
    
                    <tr>
                        <td>{{$compte->nom}}</td>
                        <td style="width: 20%">{{$compte->numero_compte}}</td>
                        

                       
                      
                        <td>
                            @if (getComptesComptables()->where('nom', $compte->nom)->first())
                                <a href="{{route('entreprise.compte-comptable.edit', getComptesComptables()->where('nom', $compte->nom)->first()->id)}}" class="btn btn-danger">Supprimer</a>
                            @else
                                <a href="{{route('entreprise.compte-comptable.defaults.add', $compte->id)}}" class="btn btn-success">Ajouter</a>
                            @endif
                           
                        </td>
                       
    
                    </tr>
                    @endforeach
    
    
                </tbody>
                <tfoot>
                    <tr>
                        <th>Nom</th>
                        <th style="width: 20%">Numéro de compte</th>
                        <th>Status</th>
    
                    </tr>
                </tfoot>
            </table>

           


          </div>
        </div>

      </div>
    </div>
  </div>

@endsection

