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
<div class="card mb-3">
    <div class="card-header position-relative  mb-7" style="height: 120px !important">
        <div class="bg-holder rounded-3 rounded-bottom-0" style="background-image:url('{{asset('assets/admin/img/generic/bg-2.jpg')}}');">
        </div>
        <!--/.bg-holder-->

        <div class="avatar avatar-5xl avatar-profile"><img class="rounded-circle img-thumbnail shadow-sm" src="{{asset($Fournisseur->logo?? 'assets/no-image.jpg')}}" width="200" alt="" /></div>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-lg-9">
          <h4 class="mb-1">{{$Fournisseur->entreprise}}<span data-bs-toggle="tooltip" data-bs-placement="right" title="Verified"><small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small></span>
          </h4>
          <h5 class="fs-0 fw-normal">{{__('messages.represented_by')}}: {{$Fournisseur->prenom}} {{$Fournisseur->nom}} | {{$Fournisseur->titre}}</h5>
          <p class="text-500">{{$Fournisseur->adresse}}, {{$Fournisseur->ville}}, {{$Fournisseur->pays}}</p>
          <div class="d-flex justify-content-between" style="margin-right: 30%">

          <a class="btn btn-info btn-sm px-3 ml-2" href="{{route('entreprise.fournisseur.edit', $Fournisseur->id)}}">{{__('messages.edit')}}</a>
          <a class="btn btn-dark btn-sm px-3 ml-2" type="button">{{__('messages.disable')}}</a>
          <form action="{{ route('entreprise.fournisseur.delete', $Fournisseur->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm" type="submit">{{__('messages.delete')}}</button>
          </form>
          <a href="{{route('entreprise.fournisseurs.list')}}" class="btn btn-dark btn-sm px-3 ml-2" type="button">{{__('messages.back')}}</a>

          </div>
          <div class="border-dashed-bottom my-4 d-lg-none"></div>
        </div>
        <div class="col ps-2 ps-lg-3">

            <div class="flex-1 m-3">
              <h6 class="mb-0">
                  <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M15.05 5A5 5 0 0 1 19 8.95M15.05 1A9 9 0 0 1 23 8.94m-1 7.98v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                  {{$Fournisseur->telephone}}
                </h6>
            </div>
            <div class="flex-1 m-3">
              <h6 class="mb-0">
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                  {{$Fournisseur->email}}
                </h6>
            </div>
            <div class="flex-1 m-3">
              <h6 class="mb-0">
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
                  {{$Fournisseur->website}}
                </h6>
            </div>
          </div>
      </div>
    </div>
  </div>
  <div class="row g-0">
    <div class="col-lg-8 pe-lg-2">
      <div class="card mb-3">
        <div class="card-header bg-light">
          <h5 class="mb-0">{{__('messages.recents_expenses')}}</h5>
        </div>

      </div>


    </div>
    <div class="col-lg-4 ps-lg-2">
      <div class="sticky-sidebar">
        <div class="card mb-3">
          <div class="card-header bg-light">
            <h5 class="mb-0">{{__('messages.activity')}}</h5>
          </div>

        </div>

      </div>
    </div>
  </div>

@endsection

