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
                <h5 class="mb-0" data-anchor="data-anchor">{{__('messages.payExpense')}} {{__('messages.no')}}@foreach($Facture as $f){{$f->facture->numero_facture}}</h5>
            </div>
            <div class="col-auto ms-auto">
                <div class="nav nav-pills nav-pills-falcon flex-grow-1" role="tablist">
                    Montant Paye &nbsp; 
                    <div class='printchatbox' id='printchatbox'></div>{{getCurrency()->sigle}}
                </div>
            </div>
        </div>

    </div>
    <div class="card-body bg-light">
        <div class="tab-content">
            <div class="tab-pane preview-tab-pane active" role="tabpanel"
                aria-labelledby="tab-dom-f6012467-4a1f-4b44-baf9-8005e8007fac"
                id="dom-f6012467-4a1f-4b44-baf9-8005e8007fac">
                <form action="{{route('entreprise.paye.facture', $f->id)}}" class="row g-3 needs-validation" novalidate="" method="POST" enctype="multipart/form-data"> @csrf
                    <div class="col-md-3">
                        <label class="form-label" for="entreprise">Bénéficiare</label>
                        <input class="form-control" value="{{$f->fournisseur->entreprise}}" name="beneficiaire" id="beneficiaire" type="text"  required="" />
                        <div class="invalid-feedback">{{__('messages.you_must_field_this_case')}}</div>

                    </div>

                   
                    {{-- <div class="col-md-3">
                        <label class="form-label" for="prenom">{{__('messages.vendor_user_first_name')}}</label>
                        <input class="form-control" name="prenom" id="prenom" type="text"   />
                    </div> --}}
                    <div class="col-md-3">
                        <label class="form-label" for="nom">Email </label>
                        <input class="form-control" value="{{$f->fournisseur->email}}" name="email" id="email" type="text"   />
                    </div>
                   
                    {{-- <div class="col-md-2">
                        <label class="form-label" for="titre">{{__('messages.vendor_user_position')}}</label>
                        <input class="form-control" name="titre" id="titre" type="text"   />
                    </div> --}}
                    {{-- <div class="col-md-3">
                        <label class="form-label" for="telephone">Adresse</label>
                        <input class="form-control"value="{{$f->fournisseur->adresse}}" name="telephone" id="telephone" type="text"  required="" />
                        <div class="invalid-feedback">{{__('messages.you_must_field_this_case')}}</div>

                    </div> --}}
                   
                    <div class="col-md-3">
                        <label class="form-label" for="email">Date Paiement </label>
                        <input class="form-control" type='date'name="date_paiement" id="date_paiement" type="text" required=""/>
                        <div class="invalid-feedback">{{__('messages.you_must_field_this_case')}}</div>

                    </div>

                    {{-- <div class="col-md-4">
                        <label class="form-label" for="numero_compte">{{__('messages.bank_account_no')}}</label>
                        <input class="form-control" name="numero_compte" id="numero_compte" type="text"  />
                    </div> --}}
                    <div class="col-md-3">
                        <label class="form-label" for="adresse">Numéro facture </label>
                        <input class="form-control"value="{{$f->facture->numero_facture}}" name="numero_facture" id="numero_facture" type="text"  >
                    </div>
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
                    <div class="col-md-3">
                        <label class="form-label" for="adresse">Référence </label>
                        <input type='text' name='reference'  value=""class="form-control"id='reference'>                    </div>

                    <table id="example" class="table is-striped" style="width:100%">
                        <thead class="text-light" style="background-color: #006AA5">
                            <tr>
                                <th class="text-light">{{ __('messages.description') }}</th>
                                <th class="text-light">{{ __('messages.echeance') }}</th>
                                <th class="text-light text-end">{{ __('messages.amount_original') }}</th>
                                <th class="text-light text-end">{{ __('messages.payment') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <td></td>
                            <td>{{$f->facture->echeance}}</td>
                            <td class="text-end">{{formatpriceth($f->total, getCurrency()->sigle)}}</td>
                            <td class="text-end"><input type="text" class='chatinput form-control  w-25 float-end' id='chatinput' name='amount_payed'></td>
                        </tbody>
                        </table>
                    @endforeach
                  
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

                    <div class="col-6 text-start">
                        <a href="{{route('entreprise.fournisseur.details',$f->fournisseur->id)}}"  class="button btn btn-danger" >{{__('messages.cancel')}}</a>
                    </div>
                    <div class="col-6 text-end">
                        <button class="btn btn-primary" type="submit">{{__('messages.save')}}</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    var inputBox = document.getElementById('chatinput');

inputBox.onkeyup = function(){
    document.getElementById('printchatbox').innerHTML = inputBox.value;
    var input = document.getElementById("printchatbox").innerHTML;
    console.log(input);
}
</script>
@endsection

