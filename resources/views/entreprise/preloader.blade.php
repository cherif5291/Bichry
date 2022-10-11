@extends('layouts.admin.admin')

@section('styles')
@include('layouts.admin.required.extensions.styles.datatable')
@endsection

@section('content')

@include('layouts.admin.required.includes.pageName')
@if (getPreloader()->where('preloader', "yes")->first())
@php
    header('Refresh: 3; URL=/entreprise/session/redirect/');
@endphp
@endif
<div class="row g-3 mb-3">
    <div class="col-xxl-12 col-lg-12">
      <div class="card ">
        <div class="bg-holder bg-card" style="background-image:url(../assets/img/icons/spot-illustrations/corner-3.png);">
        </div>
        <!--/.bg-holder-->

        @if (Auth::user()->role == "entreprise" OR Auth::user()->role == "admin" OR Auth::user()->role == "cabinet" OR Auth::user()->role == "cabinet")
        @php
        $PackageEntreprise = $Abonnement->where('entreprise_id', Auth::user()->entreprise_id)->first()->package_id;
        // $PackageEntreprise = $Packages::where('package_id', $AbonnementEntreprise->package_id)->first();
        $ModuleEntreprise = $ModulePack->where('package_id', $PackageEntreprise);
        @endphp
        @endif


        <div class="card" style="height: 80vh !important">
            <div class="card-body p-lg-6">
              <div class="row d-flex justify-content-center">

                <div class="col-md-6 text-center">
                  <img src="{{asset('assets/preloader.jpg')}}" style="height: 10% !important" alt="">
                  <h3  style="margin-bottom: 0px !important; padding-bottom:Opx !important"  class="text-primary">Ouverture de session comptable en cours</h3>

                  <p class="lead" style="margin-bottom: 0px !important; padding-bottom:Opx !important" >Chargement en cours, veuillez patienter...
                    <br>                  <img class="img-fluid" src="{{asset('progress-bar.gif')}}" width="400px" alt="">

                    </p>

                </div>
              </div>
            </div>
          </div>

      </div>
    </div>

  </div>


@endsection

