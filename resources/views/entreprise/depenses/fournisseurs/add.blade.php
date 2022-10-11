@extends('layouts.admin.admin')

@section('styles')
@include('layouts.admin.required.extensions.styles.datatable')
@endsection

@section('content')

{{-- @include('layouts.admin.required.includes.pageName') --}}
@section('content')
@if (Auth::user()->role == "entreprise" OR Auth::user()->role == "admin" OR Auth::user()->role == "cabinet")
@php
$PackageEntreprise = $Abonnement->where('entreprise_id', Auth::user()->entreprise_id)->first()->package_id;
// $PackageEntreprise = $Packages::where('package_id', $AbonnementEntreprise->package_id)->first();
$ModuleEntreprise = $ModulePack->where('package_id', $PackageEntreprise);
@endphp
@endif
<div class="card mb-3">
    <div class="card-header">
        <div class="row flex-between-end">
            <div class="col-auto align-self-center">
                <h5 class="mb-0" data-anchor="data-anchor">{{__('messages.vendor_add_form')}}</h5>
            </div>
            <div class="col-auto ms-auto">
                <div class="nav nav-pills nav-pills-falcon flex-grow-1" role="tablist">
                    <a href="{{route('entreprise.fournisseurs.list')}}" class="btn btn-sm btn-danger text-light" >{{__('messages.cancel')}}</a>

                </div>
            </div>
        </div>

    </div>
    <div class="card-body bg-light">
        <div class="tab-content">
            <div class="tab-pane preview-tab-pane active" role="tabpanel"
                aria-labelledby="tab-dom-f6012467-4a1f-4b44-baf9-8005e8007fac"
                id="dom-f6012467-4a1f-4b44-baf9-8005e8007fac">
                <form action="{{route('entreprise.fournisseurs.new.store')}}" class="row g-3 needs-validation" novalidate="" method="POST" enctype="multipart/form-data"> @csrf
                    <div class="col-md-3">
                        <label class="form-label" for="entreprise">{{__('messages.vendor_name')}} <abbr class="text-danger">*</abbr></label>
                        <input class="form-control" name="entreprise" id="entreprise" type="text"  required="" />
                        <div class="invalid-feedback">{{__('messages.you_must_field_this_case')}}</div>

                    </div>


                    {{-- <div class="col-md-3">
                        <label class="form-label" for="prenom">{{__('messages.vendor_user_first_name')}}</label>
                        <input class="form-control" name="prenom" id="prenom" type="text"   />
                    </div> --}}
                    <div class="col-md-3">
                        <label class="form-label" for="nom">{{__('messages.vendor_user_last_name')}} <abbr class="text-danger">*</abbr></label>
                        <input class="form-control" name="nom" id="nom" type="text"   />
                    </div>
                    {{-- <div class="col-md-2">
                        <label class="form-label" for="titre">{{__('messages.vendor_user_position')}}</label>
                        <input class="form-control" name="titre" id="titre" type="text"   />
                    </div> --}}
                    <div class="col-md-3">
                        <label class="form-label" for="telephone">{{__('messages.telephone')}} <abbr class="text-danger">*</abbr></label>
                        <input class="form-control" name="telephone" id="telephone" type="text"  required="" />
                        <div class="invalid-feedback">{{__('messages.you_must_field_this_case')}}</div>

                    </div>

                    <div class="col-md-3">
                        <label class="form-label" for="email">{{__('messages.email')}} <abbr class="text-danger">*</abbr></label>
                        <input class="form-control" name="email" id="email" type="text" required=""/>
                        <div class="invalid-feedback">{{__('messages.you_must_field_this_case')}}</div>

                    </div>

                    {{-- <div class="col-md-4">
                        <label class="form-label" for="numero_compte">{{__('messages.bank_account_no')}}</label>
                        <input class="form-control" name="numero_compte" id="numero_compte" type="text"  />
                    </div> --}}
                    <div class="col-md-3">
                        <label class="form-label" for="adresse">{{__('messages.address')}} <abbr class="text-danger">*</abbr></label>
                        <input class="form-control" name="adresse" id="adresse" type="text"  >
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="ville">{{__('messages.town')}} <abbr class="text-danger">*</abbr></label>
                        <input class="form-control" id="ville" name="ville" type="text" />
                    </div>

                    <div class="col-md-3">
                        <label class="form-label" for="province">{{__('messages.province')}} <abbr class="text-danger">*</abbr></label>
                        <input class="form-control" name="province" id="province" type="text" />
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="code_postal">{{__('messages.postal_code')}} <abbr class="text-danger">*</abbr></label>
                        <input class="form-control" name="code_postal" id="code_postal" type="text"  />
                    </div>


                    <div class="col-md-3">
                        <label class="form-label" for="pays">{{__('messages.country')}} <abbr class="text-danger">*</abbr></label>
                        <select class="form-select" name="pays" id="pays" required="">
                            <option selected="" disabled="" value="">{{__('messages.chose')}} <abbr class="text-danger">*</abbr></option>
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
                            <option   value="{{$devise->id}}">{{$devise->nom}} {{$devise->sigle}}</option>
                        @endforeach

                        </select>
                        <div class="invalid-feedback">{{__('messages.you_must_field_this_case')}}</div>
                    </div> --}}

                    {{-- <div class="col-md-3">
                        <label class="form-label" for="comptescomptable_id">{{__('messages.accounting_account')}}</label>
                        <select class="form-select" name="comptescomptable_id" id="comptescomptable_id" required="">
                            <option disabled="" value="">{{__('messages.chose')}}</option>

                        @foreach ($ComptesComptables as $ccomptable)
                            <option   value="{{$ccomptable->id}}">{{$ccomptable->nom}}</option>
                        @endforeach
                        </select>
                        <div class="invalid-feedback">{{__('messages.you_must_field_this_case')}}</div>
                    </div> --}}
                    <div class="col-md-3">
                        <label class="form-label" for="paiements_modalite_id">{{__('messages.payment_mode')}} {{__('messages.wishes')}}</label>
                        <select class="form-select" name="paiements_modalite_id" id="paiements_modalite_id" required="">
                            <option disabled="" value="">{{__('messages.chose')}}</option>

                        @foreach ($ModesPaiements as $pmode)
                            <option   value="{{$pmode->id}}">{{$pmode->nom}}</option>
                        @endforeach
                        </select>
                        <div class="invalid-feedback">{{__('messages.you_must_field_this_case')}}</div>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label" for="validationCustom05">{{__('messages.note')}}</label>
                        <textarea  class="form-control" name="" id="" cols="30" rows="5"></textarea>
                    </div>

                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">{{__('messages.save')}}</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection

