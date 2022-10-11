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
@include('layouts.admin.required.includes.messages')


<div class="card mb-3" id="customersTable" data-list="{&quot;valueNames&quot;:[&quot;name&quot;,&quot;email&quot;,&quot;phone&quot;,&quot;address&quot;,&quot;joined&quot;],&quot;page&quot;:10,&quot;pagination&quot;:true}">
    <div class="card-header">
      <div class="row flex-between-center">
        <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
          <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">{{$PageName}}</h5>
        </div>
        <div class="col-8 col-sm-auto text-end ps-2">

          <div id="table-customers-replace-element">
            <a class="btn btn-falcon-default btn-sm" href="{{route('entreprise.comptable')}}">
                <span class="d-none d-sm-inline-block ms-1">Mon comptable</span></a>

          </div>
        </div>
      </div>
    </div>
    <div class="card-body p-0">
        <div class="card-body text-center py-5" style="height: 84vh !important">
            <div class="row justify-content-center">
              <div class="col-7 col-md-5"><img class="img-fluid" src="{{asset('assets/admin/img/invitations.png')}}" alt="" style="width:58%;"></div>
            </div>
            <h3 class="mt-3 fw-normal fs-2 mt-md-4 fs-md-3">Besoin d'aide d'un expert pour gérer votre comptabilité ?</h3>
            <p class="lead mb-5">Renseignez l'addresse mail du cabinet comptable pour invité ce dernier a travailler sur la comptabilité de votre entreprise.
            </p>
            <div class="row justify-content-center">
              <div class="col-md-7">
                <form action="{{route('sendInvitation')}}" method="post" class="row gx-2"> @csrf
                  <div class="col-sm mb-2 mb-sm-0">
                    <input class="form-control" type="email" name="email" placeholder="Adresse email du comptable à inviter" aria-label="Recipient's username">
                  </div>
                  <div class="col-sm-auto">
                    <button class="btn btn-primary d-block w-100" type="submit">Envoyer l'invitation</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
    </div>

  </div>

@endsection

@section('scripts')

@endsection
