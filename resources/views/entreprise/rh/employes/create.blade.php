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
<div class="card mb-3">

    <div class="card-header">
        <div class="row flex-between-center">
            <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
                <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">{{$PageName}}</h5>
            </div>

        </div>
    </div>
    <div class="card-body bg-light">
        <div class="tab-content">
            <div class="tab-pane preview-tab-pane active" role="tabpanel"
                aria-labelledby="tab-dom-f6012467-4a1f-4b44-baf9-8005e8007fac"
                id="dom-f6012467-4a1f-4b44-baf9-8005e8007fac">
                <form action="{{route('entreprise.employe.store')}}" class="row g-3 col-md-12 needs-validation" novalidate="" method="POST" enctype="multipart/form-data"> @csrf
                    <div class="col-md-6">
                        <label class="form-label" for="prenom">{{__('messages.first_name')}}</label>
                        <input class="form-control" name="prenom" id="prenom" type="text" required="" />
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="nom">{{__('messages.last_name')}}</label>
                        <input class="form-control" name="nom" id="nom" type="text" required="" />
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="email">{{__('messages.email')}}</label>
                        <input class="form-control" id="email" name="email" type="text" required="" />
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="telephone">{{__('messages.telephone')}}</label>
                        <input class="form-control" name="telephone" id="telephone" type="text" required="" />
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="genre">{{__('messages.gender')}}</label>
                        <select class="form-select" name="genre" id="genre" required="">
                            <option disabled="" value="">{{__('messages.chose')}}</option>
                            <option value="Sénégal">{{__('messages.male')}}</option>
                            <option value="Canada">{{__('messages.female')}}</option>

                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="date_naissance">{{__('messages.date_of_birth')}}</label>
                        <input class="form-control" name="date_naissance" id="date_naissance" type="text" required="" />
                    </div>

                    <div class="col-md-12">
                        <label class="form-label" for="adresse">{{__('messages.address')}}</label>
                        <input class="form-control" name="adresse" id="adresse" type="text" />
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="ville">{{__('messages.town')}}</label>
                        <input class="form-control" id="ville" name="ville" type="text" />
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="province">{{__('messages.province')}}</label>
                        <input class="form-control" name="province" id="province" type="text" />
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="code_postale">{{__('messages.postal_code')}}</label>
                        <input class="form-control" name="code_postale" id="code_postale" type="text" />
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="pays">{{__('messages.country')}}</label>
                        <select class="form-select" name="pays" id="pays" required="">
                            <option selected="" disabled="" value="">{{__('messages.chose')}}</option>
                            @foreach (getPays() as $pays)
                            <option value="{{$pays->nom}}">{{$pays->nom}}</option>
                            @endforeach

                        </select>
                        <div class="invalid-feedback">{{__('messages.you_must_field_this_case')}}</div>
                    </div>
                    <hr class="mt-3">
                    <div class="col-md-6">
                        <label class="form-label" for="poste">{{__('messages.position_on_company')}}</label>
                        <input class="form-control" name="poste" id="poste" type="text" required="" />
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="date_embauche">{{__('messages.hiring_date')}}</label>
                        <input class="form-control" name="date_embauche" id="date_embauche" type="date" required="" />
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="remuneration">{{__('messages.remuneration')}}</label>
                        <input class="form-control" name="remuneration" id="remuneration" type="number" required="" />
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="interval_paiement">{{__('messages.employer_payment_interval')}}</label>
                        <select class="form-select" name="interval_paiement" id="interval_paiement" required="">
                            <option value="1">{{__('messages.day')}}</option>
                            <option value="7">{{__('messages.week')}}</option>
                            <option selected="" value="30">{{__('messages.month')}}</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="paiements_mode_id">{{__('messages.payment_mode_wishes')}}</label>
                        <select class="form-select" name="paiements_mode_id" id="paiements_mode_id" required="">
                            <option disabled="" value="">{{__('messages.chose')}}</option>

                            @foreach ($ModesPaiements as $pmode)
                            <option value="{{$pmode->id}}">{{$pmode->nom}}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">{{__('messages.you_must_field_this_case')}}</div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="devises_monetaire_id">{{__('messages.curency')}}</label>
                        <select class="form-select" name="devises_monetaire_id" id="devises_monetaire_id" required="">
                            <option selected="" disabled="" value="">{{__('messages.chose')}}</option>
                            @foreach ($DevisesMonetaires as $devise)
                            <option value="{{$devise->id}}">{{$devise->nom}} {{$devise->sigle}}</option>
                            @endforeach

                        </select>
                        <div class="invalid-feedback">{{__('messages.you_must_field_this_case')}}</div>
                    </div>

                    <div class="col-12">
                        <button class="btn btn-success w-100" type="submit">{{__('messages.add_employer')}}</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>




@endsection
