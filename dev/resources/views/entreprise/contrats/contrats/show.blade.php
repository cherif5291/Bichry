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
          <h5 class="mb-0">{{__('messages.add_contract')}}</h5>
        </div>

        <div class="card-body">
           <form action="{{route('entreprise.type-contrat.store')}}" class="row g-3 needs-validation" novalidate="" method="POST"> @csrf
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
                <label class="form-label" for="contrats_type_id">{{__('messages.contract_linked_to')}}?</label>
                <select class="form-select" name="interesse" id="contrats_type_id" >
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
                   <option value="{{$value}}">{{$fournisseur->nom}}  ({{__('messages.vendors')}})</option>
                   @endforeach


                </select>
            </div>

            <div class="col-md-4-12">
                <label class="form-label" for="montant">{{__('messages.contract_amount')}}</label>
                <input class="form-control" name="montant" id="montant" type="text"  required="" />
            </div>

            <div class="col-12">
                <button class="btn btn-primary" type="submit">{{__('messages.update')}}</button>
            </div>
            </form>
        </div>
      </div>


    </div>
    <div class="col-lg-8 ps-lg-2">
      <div class="sticky-sidebar">
        <div class="card mb-3">
            <div class="card-body">
              <div class="row justify-content-between align-items-center">
                <div class="col-md">
                  <h5 class="mb-2 mb-md-0"> {{$Contrat->nom}}</h5>
                </div>
                <div class="col-auto">
                    <a href="" class="btn btn-falcon-danger btn-sm me-1 mb-2 mb-sm-0" ><!-- <span class="fas fa-arrow-down me-1"> </span> Font Awesome fontawesome.com -->{{__('messages.delete')}}</a>
                    <a href="{{route('entreprise.contrat.editContent', $Contrat->id)}}" class="btn btn-falcon-info btn-sm me-1 mb-2 mb-sm-0" ><!-- <span class="fas fa-arrow-down me-1"> </span> Font Awesome fontawesome.com -->{{__('messages.edit_content')}}</a>

{{-- {{route('entreprise.contrat.delete', $Contrat->id)}}
                  <button class="btn btn-falcon-default btn-sm me-1 mb-2 mb-sm-0" type="button"><svg class="svg-inline--fa fa-arrow-down fa-w-14 me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M413.1 222.5l22.2 22.2c9.4 9.4 9.4 24.6 0 33.9L241 473c-9.4 9.4-24.6 9.4-33.9 0L12.7 278.6c-9.4-9.4-9.4-24.6 0-33.9l22.2-22.2c9.5-9.5 25-9.3 34.3.4L184 343.4V56c0-13.3 10.7-24 24-24h32c13.3 0 24 10.7 24 24v287.4l114.8-120.5c9.3-9.8 24.8-10 34.3-.4z"></path></svg><!-- <span class="fas fa-arrow-down me-1"> </span> Font Awesome fontawesome.com -->Download (.pdf)</button>
                  <button class="btn btn-falcon-default btn-sm me-1 mb-2 mb-sm-0" type="button"><svg class="svg-inline--fa fa-print fa-w-16 me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="print" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M448 192V77.25c0-8.49-3.37-16.62-9.37-22.63L393.37 9.37c-6-6-14.14-9.37-22.63-9.37H96C78.33 0 64 14.33 64 32v160c-35.35 0-64 28.65-64 64v112c0 8.84 7.16 16 16 16h48v96c0 17.67 14.33 32 32 32h320c17.67 0 32-14.33 32-32v-96h48c8.84 0 16-7.16 16-16V256c0-35.35-28.65-64-64-64zm-64 256H128v-96h256v96zm0-224H128V64h192v48c0 8.84 7.16 16 16 16h48v96zm48 72c-13.25 0-24-10.75-24-24 0-13.26 10.75-24 24-24s24 10.74 24 24c0 13.25-10.75 24-24 24z"></path></svg><!-- <span class="fas fa-print me-1"> </span> Font Awesome fontawesome.com -->Imprimer</button>
                  <button class="btn btn-falcon-info btn-sm mb-2 mb-sm-0" type="button"><svg class="svg-inline--fa fa-dollar-sign fa-w-9 me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="dollar-sign" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 288 512" data-fa-i2svg=""><path fill="currentColor" d="M209.2 233.4l-108-31.6C88.7 198.2 80 186.5 80 173.5c0-16.3 13.2-29.5 29.5-29.5h66.3c12.2 0 24.2 3.7 34.2 10.5 6.1 4.1 14.3 3.1 19.5-2l34.8-34c7.1-6.9 6.1-18.4-1.8-24.5C238 74.8 207.4 64.1 176 64V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48h-2.5C45.8 64-5.4 118.7.5 183.6c4.2 46.1 39.4 83.6 83.8 96.6l102.5 30c12.5 3.7 21.2 15.3 21.2 28.3 0 16.3-13.2 29.5-29.5 29.5h-66.3C100 368 88 364.3 78 357.5c-6.1-4.1-14.3-3.1-19.5 2l-34.8 34c-7.1 6.9-6.1 18.4 1.8 24.5 24.5 19.2 55.1 29.9 86.5 30v48c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16v-48.2c46.6-.9 90.3-28.6 105.7-72.7 21.5-61.6-14.6-124.8-72.5-141.7z"></path></svg><!-- <span class="fas fa-dollar-sign me-1"></span> Font Awesome fontawesome.com -->Modifier le contenu</button> --}}
                </div>
              </div>
            </div>
        </div>
        <div class="card mb-3">

            <div class="card-footer bg-light">
              <p class="fs--1 mb-0">
                 {!!$Contrat->contenu!!}
                </p>
            </div>
          </div>

      </div>
    </div>
  </div>

@endsection

