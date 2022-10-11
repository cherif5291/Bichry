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
    <div class="card-header">
        <div class="row flex-between-end">
            <div class="col-auto align-self-center">
                <h5 class="mb-0" data-anchor="data-anchor">{{__('messages.change_vendor')}} <strong>{{$Fournisseur->entreprise}}</strong></h5>
            </div>
            <div class="col-auto ms-auto">
                <div class="nav nav-pills nav-pills-falcon flex-grow-1" role="tablist">
                    <a href="{{route('entreprise.fournisseur.details', $Fournisseur->id)}}" class="btn btn-sm btn-danger text-light" >{{__('messages.cancel')}}</a>

                </div>
            </div>
        </div>
    </div>
    <div class="card-body bg-light">
        <div class="tab-content">
            <div class="tab-pane preview-tab-pane active" role="tabpanel"
                aria-labelledby="tab-dom-f6012467-4a1f-4b44-baf9-8005e8007fac"
                id="dom-f6012467-4a1f-4b44-baf9-8005e8007fac">
                <form action="{{route('entreprise.fournisseurs.update', $Fournisseur->id)}}" class="row g-3 needs-validation" novalidate="" method="POST" enctype="multipart/form-data"> @csrf
                    <div class="col-md-4">
                        <label class="form-label" for="entreprise">{{__('messages.vendor_name')}}</label>
                        <input class="form-control" name="entreprise" id="entreprise" type="text" value="{{$Fournisseur->entreprise}}" required="" />
                        <div class="invalid-feedback">{{__('messages.you_must_field_this_case')}}</div>

                    </div>


                    <div class="col-md-3">
                        <label class="form-label" for="prenom">{{__('messages.vendor_user_first_name')}}</label>
                        <input class="form-control" name="prenom" id="prenom" type="text" value="{{$Fournisseur->prenom}}" />
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="nom">{{__('messages.vendor_user_last_name')}}</label>
                        <input class="form-control" name="nom" id="nom" type="text" value="{{$Fournisseur->nom}}"  />
                    </div>
                    <div class="col-md-2">
                        <label class="form-label" for="titre">{{__('messages.vendor_user_position')}}</label>
                        <input class="form-control" name="titre" id="titre" type="text" value="{{$Fournisseur->titre}}" />
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="telephone">{{__('messages.telephone')}}</label>
                        <input class="form-control" name="telephone" id="telephone" type="text" value="{{$Fournisseur->telephone}}"  required=""/>
                    </div>


                    <div class="col-md-4">
                        <label class="form-label" for="email">{{__('messages.email')}}</label>
                        <input class="form-control" name="email" id="email" type="text" value="{{$Fournisseur->email}}" required=""/>
                        <div class="invalid-feedback">{{__('messages.you_must_field_this_case')}}</div>

                    </div>

                    <div class="col-md-4">
                        <label class="form-label" for="numero_compte">{{__('messages.bank_account_no')}}</label>
                        <input class="form-control" name="numero_compte" id="numero_compte" type="text" value="{{$Fournisseur->numero_compte}}"/>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="adresse">{{__('messages.address')}}</label>
                        <input class="form-control" name="adresse" id="adresse" type="text" value="{{$Fournisseur->adresse}}"/>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="ville">{{__('messages.town')}}</label>
                        <input class="form-control" id="ville" name="ville" type="text" value="{{$Fournisseur->ville}}"/>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label" for="province">{{__('messages.province')}}</label>
                        <input class="form-control" name="province" id="province" type="text" value="{{$Fournisseur->province}}"/>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="code_postal">{{__('messages.postal_code')}}</label>
                        <input class="form-control" name="code_postal" id="code_postal" type="text" value="{{$Fournisseur->code_postal}}"/>
                    </div>


                    <div class="col-md-3">
                        <label class="form-label" for="pays">{{__('messages.country')}}</label>
                        <select class="form-select" name="pays" id="pays" required="">
                            <option selected="" disabled="" value="">{{__('messages.chose')}}</option>
                            @foreach (getPays() as $pays)
                            <option value="{{$pays->nom}}">{{$pays->nom}}</option>
                            @endforeach

                        </select>
                        <div class="invalid-feedback">{{__('messages.you_must_field_this_case')}}</div>
                    </div>
{{--
                    <div class="col-md-3">
                        <label class="form-label" for="devises_monetaire_id">{{__('messages.currency')}}</label>
                        <select class="form-select" name="devises_monetaire_id" id="devises_monetaire_id" required="">
                            <option selected="" disabled="" value="">{{__('messages.chose')}}</option>
                            @foreach ($DevisesMonetaires as $devise)
                            <option  @if ($Fournisseur->comptescomptable_id === $devise->id) selected  @endif value="{{$devise->id}}">{{$devise->nom}} {{$devise->sigle}}</option>
                        @endforeach

                        </select>
                        <div class="invalid-feedback">{{__('messages.you_must_field_this_case')}}</div>
                    </div> --}}

                    <div class="col-md-3">
                        <label class="form-label" for="comptescomptable_id">{{__('messages.accounting_account')}}</label>
                        <select class="form-select" name="comptescomptable_id" id="comptescomptable_id" required="">
                            <option disabled="" value="">{{__('messages.chose')}}</option>

                        @foreach ($ComptesComptables as $ccomptable)
                            <option  @if ($Fournisseur->comptescomptable_id === $ccomptable->id) selected  @endif value="{{$ccomptable->id}}">{{$ccomptable->nom}}</option>
                        @endforeach
                        </select>
                        <div class="invalid-feedback">{{__('messages.you_must_field_this_case')}}</div>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="paiements_modalite_id">{{__('messages.payment_mode')}} {{__('messages.wishes')}}</label>
                        <select class="form-select" name="paiements_modalite_id" id="paiements_modalite_id" required="">
                            <option disabled="" value="">{{__('messages.chose')}}</option>

                        @foreach ($ModesPaiements as $pmode)
                            <option  @if ($Fournisseur->paiements_modalite_id === $pmode->id) selected  @endif value="{{$pmode->id}}">{{$pmode->nom}}</option>
                        @endforeach
                        </select>
                        <div class="invalid-feedback">{{__('messages.you_must_field_this_case')}}</div>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label" for="validationCustom05">{{__('messages.note')}}</label>
                        <textarea  class="form-control" name="" id="" cols="30" rows="10">{{$Fournisseur->note}}</textarea>
                    </div>

                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">{{__('messages.update')}}</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection

