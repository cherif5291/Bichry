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

  <div class="card mb-3"   style="min-height: 91vh">
    <div class="card-header">
      <div class="row flex-between-end">
        <div class="col-auto align-self-center">
            <h4 >
                {{$PageName ?? "no page name (Déclarer la variable PageName sur le controlleur de cette view avec le nom de la page.)"}}
            </h4>
        </div>
        <div class="col-auto ms-auto">
          <div class="nav nav-pills nav-pills-falcon flex-grow-1" role="tablist">
            @if (Auth::user()->habilitation->fonctionnalites->where('module_id', 2)->first()->ajouter == "yes")
            <a href="{{route('entreprise.fournisseur.addnew')}}" class="btn  bg-line-chart-gradient text-light mr-2" style="margin-right: 1em ">{{__('messages.vendor_add')}}</a>
            @else
            @include('layouts.admin.required.includes.controle.accessDeniedBtnAdd')
            @endif
            @if (Auth::user()->habilitation->fonctionnalites->where('module_id', 6)->first()->voir == "yes")
            <a href="" class="btn btn-dark text-light">{{__('messages.see_expenses_list')}}</a>
            @endif
           </div>
        </div>
      </div>
    </div>
    <div class="card-body bg-light">
        @if (Auth::user()->habilitation->fonctionnalites->where('module_id', 2)->first()->voir == "yes")
        <table id="example" class="table table-hover table-striped overflow-hidden" style="width:100%">
            <thead class="text-light" style="background-color: #232e3c">
                <tr>
                    <th>{{__('messages.logo')}}</th>
                    <th>{{__('messages.company')}}</th>
                    <th>{{__('messages.responsible')}}</th>
                    <th>{{__('messages.email')}}</th>
                    <th>{{__('messages.telephone')}}</th>
                    <th>{{__('messages.date')}}</th>
                    <th>{{__('messages.total')}}</th>
                    <th style="width:3em">{{__('messages.action')}}</th>


                </tr>
            </thead>
            <tbody>
                @foreach ($Fournisseurs as $fournisseur)
                <tr>
                    <td>
                        <img src="{{asset($fournisseur->logo ?? 'assets/no-image.jpg')}}" height="40px" alt="">
                    </td>
                    <td>{{$fournisseur->entreprise}}</td>
                    <td>{{$fournisseur->prenom}} {{$fournisseur->nom}}</td>
                    <td>{{$fournisseur->email}}</td>
                    <td>{{$fournisseur->telephone}}</td>
                    <td>{{$fournisseur->created_at->format('d M Y')}}</td>
                    <td></td>

                    <td>
                        @if (Auth::user()->habilitation->fonctionnalites->where('module_id', 2)->first()->modifier == "yes")
                        <small><a class="btn  bg-line-chart-gradient text-light" href="{{route('entreprise.fournisseur.details', $fournisseur->id)}}">Détails</a></small>

                        @else
                        @include('layouts.admin.required.includes.controle.accessDeniedBtnEdit')
                        @endif
                    </td>


                </tr>
                @endforeach


            </tbody>
            <tfoot>
                <tr>
                    <th>{{__('messages.logo')}}</th>
                    <th>{{__('messages.company')}}</th>
                    <th>{{__('messages.responsible')}}</th>
                    <th>{{__('messages.email')}}</th>
                    <th>{{__('messages.telephone')}}</th>
                    <th>{{__('messages.vendor')}}</th>
                    <th style="width:3em">{{__('messages.action')}}</th>

                </tr>
            </tfoot>
        </table>
        @else
        @include('layouts.admin.required.includes.controle.accessDeniedShow')
        @endif


    </div>
  </div>

</div>

@endsection

@section('scripts')
@include('layouts.admin.required.extensions.js.datatable')
@endsection
