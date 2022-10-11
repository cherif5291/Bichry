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
<div class="card mb-3">
    <div class="card-header position-relative  mb-7">


      <div class="avatar avatar-5xl avatar-profile"><img class="rounded-circle img-thumbnail shadow-sm" src="{{asset($User->avatar?? 'assets/no-image.jpg')}}" width="200" alt="" /></div>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-lg-8">
          <h4 class="mb-1">{{$User->prenom}} {{$User->nom??""}}<span data-bs-toggle="tooltip" data-bs-placement="right" title="Verified"><small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small></span>
          </h4>
          <h5 class="fs-0 fw-normal">{{__('messages.represented_by')}}: {{$User->prenom}} {{$User->nom}} | {{$User->role}}</h5>
          <p class="text-500">{{$User->adresse??""}}, {{$User->ville}}, {{$User->pays}}</p>
          <a  class="btn btn-danger btn-sm px-3 ms-2" href="{{ route('logout') }}"
          onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
           Se déconnecter
       </a>

       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
           @csrf
       </form>
          <a class="btn btn-dark btn-sm px-3" type="button">{{__('messages.disable')}}</a>

          <div class="border-dashed-bottom my-4 d-lg-none"></div>
        </div>
        <div class="col ps-2 ps-lg-3">

            <div class="flex-1">
              <h6 class="mb-0"> <i class="fa fa-phone"></i> {{$User->telephone}}</h6>
            </div>
            <div class="flex-1">
              <h6 class="mb-0"><i class="fas fa-enveloppe"></i> {{$User->portable}}</h6>
            </div>
            <div class="flex-1">
              <h6 class="mb-0"><i class="fa fa-web"></i> {{$User->email}}</h6>
            </div>
          </div>
      </div>
    </div>
  </div>
  <div class="row g-0">
    <div class="col-lg-8 pe-lg-2">
      <div class="card mb-3">
        <div class="card-header bg-light">
          <h5 class="mb-0">{{__('messages.change_my_user_account')}}</h5>
        </div>
        <div class="card-body">
            <form action="{{route('entreprise.monCompte.infos.change')}}" class="row g-3 m-1 needs-validation" novalidate="" method="POST" enctype="multipart/form-data"> @csrf
                <div class="col-md-4">
                    <label class="form-label" for="prenom">{{__('messages.first_name')}}</label>
                    <input class="form-control" name="prenom" id="prenom" value="{{$User->prenom}}" type="text"required="" />
                </div>

                <div class="col-md-4">
                    <label class="form-label" for="nom">{{__('messages.last_name')}}</label>
                    <input class="form-control" name="nom" id="nom" value="{{$User->nom}}" type="text"  required="" />
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="nom_pro">{{__('messages.email')}}</label>
                    <input readonly class="form-control " value="{{$User->email}}" id="email" name="email" type="text"  required="" />
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="nom_pro">{{__('messages.role')}}</label>
                    <input readonly class="form-control " value="{{$User->role}}" id="text" name="role" type="text"  required="" />
                </div>

                <div class="col-md-4">
                    <label class="form-label" for="telephone">{{__('messages.telephone')}}</label>
                    <input class="form-control" name="telephone" value="{{$User->telephone}}" id="telephone" type="text" required="" />
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="portable">{{__('messages.portable')}}</label>
                    <input class="form-control" name="portable" value="{{$User->portable}}" id="portable" type="text"  required="" />
                </div>



                <div class="col-md-4">
                    <label class="form-label" for="langue_id">{{__('messages.default_language')}}</label>
                    <select class="form-select" name="langue_id" id="langue_id" required="">
                        <option disabled="" value="">{{__('messages.chose')}}</option>

                    @foreach ($Langues as $langue)
                        <option   value="{{$langue->id}}" @if ($langue->id === $User->langue_id) selected @endif>{{$langue->nom}}</option>
                    @endforeach
                    </select>
                    <div class="invalid-feedback">Vous devez choisir un mode de paiement</div>
                </div>
                <div class="col-md-8">
                    <label class="form-label" for="adresse">{{__('messages.address')}}</label>
                    <input class="form-control" name="adresse" value="{{$User->adresse}}" id="adresse" type="text" />
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="ville">{{__('messages.Town')}}</label>
                    <input class="form-control" id="ville" value="{{$User->ville}}" name="ville" type="text" />
                </div>

                <div class="col-md-3">
                    <label class="form-label" for="province">{{__('messages.province')}}</label>
                    <input class="form-control" name="province" value="{{$User->province}}" id="province" type="text"/>
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="code_postale">{{__('messages.postal_code')}}</label>
                    <input class="form-control" name="code_postale" value="{{$User->code_postale}}" id="code_postale" type="text" />
                </div>


                <div class="col-md-3">
                    <label class="form-label" for="pays">{{__('messages.country')}}</label>
                    <select class="form-select" name="pays" id="pays" required="">
                        <option value="Sénégal">Sénégal</option>
                        <option value="Canada">Canada</option>

                    </select>
                    <div class="invalid-feedback">Vous devez choisir un pays</div>
                </div>




                <div class="col-12">
                    <button class="btn btn-primary" type="submit">{{__('messages.update_user_account')}}</button>
                </div>
            </form>
        </div>
      </div>


    </div>
    <div class="col-lg-4 ps-lg-2">
      <div class="sticky-sidebar">
        <div class="card mb-3">
          <div class="card-header bg-light">
            <h5 class="mb-0">{{__('messages.change_password')}}</h5>
          </div>

          <div class="card-body">
            <form action="{{route('entreprise.monCompte.password.change')}}" class="row g-3 m-1 needs-validation" novalidate="" method="POST" enctype="multipart/form-data"> @csrf
                <div class="col-md-12">
                    <label class="form-label" for="newpass">{{__('messages.new_password')}}</label>
                    <input class="form-control" name="newpass" id="newpass" type="text"required="" />
                </div>

                <div class="col-md-12">
                    <label class="form-label" for="confirmpass">{{__('messages.confirm')}}</label>
                    <input class="form-control" name="confirmpass" id="confirmpass"  type="text"  required="" />
                </div>

                <div class="col-12">
                    <button class="btn btn-primary" type="submit">{{__('messages.update_user_infos')}}</button>
                </div>
            </form>
        </div>
        </div>

      </div>
    </div>
  </div>

@endsection

