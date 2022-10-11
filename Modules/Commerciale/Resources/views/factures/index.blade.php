@extends('layouts.admin.admin')
@section('styles')

{{-- @include('layouts.admin.required.extensions.styles.datatable') --}}
<link href="{{asset('assets/admin/vendors/flatpickr/flatpickr.min.css')}}" rel="stylesheet" />
@include('layouts.admin.required.extensions.styles.FullScreenPopup')
<style>
    .modal-backdrop {
        position: top;
        top: initial !important;
        left: 0;
        z-index: 1050;
        width: 100vw !important;
        height: 100vh !important;
        background-color: #000;
    }
</style>
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


<div id="factureComPopup" class="cd-popup ex3 bg-light fixed-top" role="alert">
    @include('entreprise.commerciale.factures.facture.facturepopup')
</div>

<div id="PaiementfacturePopup" class="cd-popup ex3 bg-light fixed-top" role="alert">
    @include('entreprise.commerciale.factures.facture.paiementfacture')
</div>

<div id="recuPopup" class="cd-popup ex3 bg-light fixed-top" role="alert">
    @include('entreprise.commerciale.factures.recu.recupopup')
</div>

<div id="PaiementRecuPopup" class="cd-popup ex3 bg-light fixed-top" role="alert">
    @include('entreprise.commerciale.factures.recu.paiementrecu')
</div>
<div id="recu" class="cd-popup ex3 bg-light fixed-top" role="alert">
    @include('entreprise.commerciale.factures.recu.form')
</div>

<div class="card mb-3" >
    <div class="card-header">
        <div class="row flex-between-end">
            <div class="col-auto align-self-center">
                <h4>
                    {{$PageName ?? "no page name (Déclarer la variable PageName sur le controlleur de cette view avec le
                    nom de la page.)"}}
                </h4>
            </div>
            <div class="col-auto ms-auto">
                <div class="nav nav-pills nav-pills-falcon flex-grow-1" role="tablist">


                    @if (Auth::user()->habilitation->fonctionnalites->where('module_id', 1)->first()->voir == "yes")
                    <a href="{{route('entreprise.fournisseurs.list')}}" class="btn btn-dark text-light mr-2"
                        style="margin-right: 1em ">{{__('messages.vendors')}}</a>

                    @endif

                    @if (Auth::user()->habilitation->fonctionnalites->where('module_id', 4)->first()->ajouter == "yes")
                    <div class="btn-group" role="group">
                        <button class="btn bg-line-chart-gradient text-light dropdown-toggle" id="btnGroupVerticalDrop1"
                            type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{__('messages.add_invoice')}}</button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">
                            <a class="dropdown-item" href="#0" id="pop1btn" class="cd-popup-trigger"
                                onclick="openpopup('facture')">{{__('messages.invoice')}}</a>
                            <a class="dropdown-item" href="#0" id="pop1btn" class="cd-popup-trigger"
                                onclick="openpopup('recu')">{{__('messages.receipt')}}</a>


                        </div>
                    </div>
                    @else
                    @include('layouts.admin.required.includes.controle.accessDeniedBtnAdd')
                    @endif


                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center ">

        <div class="card-body pb-0">
            <div class=" col-md-12 d-flex justify-content-center">

                <div class="col-md-3 p-3 m-1  card h-100 bg-line-chart-gradient" style="width: 24.4% !important">
                    <div>
                        <h6 class="text-700 text-white" style="color: white">{{__('messages.invoices')}}
                            ({{getFactures()->where('type', "facture")->count()}})</h6>
                        <h3 class="fw-normal text-700" style="color: white !important"> {!!
                            formatpriceth(getFactures()->where('type', "facture")->sum('total'), getCurrency()) !!}</h3>
                    </div>
                </div>

                <div class="col-md-3 p-3 m-1 card h-100 bg-line-chart-gradient" style="width: 24.4% !important">
                    <div>
                        <h6 class="text-700 text-white" style="color: white">{{__('messages.receipts')}}
                            ({{getFactures()->where('type', "recu")->count()}})</h6>
                        <h3 class="fw-normal text-700" style="color: white !important">{!!
                            formatpriceth(getFactures()->where('type', "recu")->sum('total'), getCurrency()) !!} </h3>
                    </div>
                </div>

                <div class="col-md-3 p-3 m-1 card h-100 bg-success" style="width: 24.4% !important">
                    <div>
                        <h6 class="text-700 text-white" style="color: white">{{__('messages.payments')}}</h6>
                        <h3 class="fw-normal text-700" style="color: white !important"> {!!
                            formatpriceth(getReglements()->sum('montant_recu'), getCurrency()) !!}</h3>
                    </div>
                </div>

                <div class="col-md-3 p-3 m-1 card h-100 bg-danger" style="width: 24.4% !important">
                    <div>
                        <h6 class="text-700 text-white" style="color: white">{{__('messages.amount_due')}}</h6>
                        <h3 class="fw-normal text-700" style="color: white !important"> {!!
                            formatpriceth((getFactures()->sum('total') - getReglements()->sum('montant_recu')), getCurrency()) !!}</h3>
                    </div>
                </div>


            </div>

        </div>

    </div>
    <div class="card-body bg-light table-responsive scrollbar" style="min-height: 69vh ">
        @if (Auth::user()->habilitation->fonctionnalites->where('module_id', 4)->first()->voir == "yes")
        <table id="example" class="table table-hover table-striped " style="width:100%">
            <thead class="text-light" style="background-color: #232e3c">
                <tr>
                    <th>{{__('messages.no')}}</th>

                    <th>{{__('messages.type')}}</th>
                    <th>{{__('messages.beneficiary')}}</th>


                    <th>{{__('messages.note')}}</th>
                    <th>{{__('messages.sub_total')}}</th>
                    <th>{{__('messages.taxe')}}</th>
                    <th>{{__('messages.total')}}</th>
                    <th>{{__('messages.date')}}</th>
                    <th style="width: 5%">{{__('messages.action')}}</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($Factures->where('type', '!=', 'depense') as $facture)
                <tr>

                    <td>
                        @if ($facture->numero_facture)
                        {{$facture->numero_facture}}
                        @elseif ($facture->reference)
                        {{$facture->reference}}
                        @endif</td>

                    <td>{{$facture->type}}</td>

                    <td>
                        @if ($facture->clients_entreprise_id)
                        {{Clients()->find($facture->clients_entreprise_id)->entreprise}}
                        @elseif ($facture->fournisseur_id)
                        {{Fournisseurs()->find($facture->fournisseur_id)->entreprise}}
                        @endif
                    </td>




                    <td>{{$facture->message}}</td>

                    <td>{!! formatpriceth($facture->total_sans_taxe, getCurrency()) !!}</td>
                    <td>{!! formatpriceth($facture->taxe, getCurrency()) !!}</td>
                    <td>{!! formatpriceth($facture->total, getCurrency()) !!}</td>
                    <td>{{$facture->created_at->format('d M Y')}}</td>
                    <td>
                        <small>
                            <div class="btn-group">
                                <button class="btn btn-dark btn-sm dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown" data-display="static" aria-haspopup="true"
                                    aria-expanded="false"><i class="fas fa-grip-vertical"></i> Option</button>
                                <div class="dropdown-menu dropdown-menu-end fixed-top">

                                    @if (Auth::user()->habilitation->fonctionnalites->where('module_id',
                                    4)->first()->supprimer == "yes")
                                    @if ($facture->type == "facture")
                                    <a href="" class="dropdown-item btn-paid-facture"
                                        onclick="openpopup('PaiementfacturePopup')"
                                        facture-id="{{ $facture->id ?? '' }}">
                                        <i class="fab fa-cc-visa"></i> Effectuer paiement facture</a>
                                    @elseif ($facture->type == "recu")
                                    <a class="dropdown-item btn-paid-recu" onclick="openpopup('PaiementRecuPopup')"
                                        recu-id="{{ $facture->id ?? '' }}" href="#"><i class="fab fa-cc-visa"></i>
                                        {{__('messages.make_payment')}}</a>
                                    @endif
                                    <a class="dropdown-item"
                                        href="{{route('entreprise.factures.facture', $facture->id)}}"><i
                                            class="far fa-file-pdf"></i> {{__('messages.see_invoice')}}</a>
                                    @else
                                    @include('layouts.admin.required.includes.controle.accessDeniedBtnDelete')
                                    @endif
                                    @if (Auth::user()->habilitation->fonctionnalites->where('module_id',
                                    4)->first()->modifier == "yes")
                                    <div class="dropdown-divider"></div>
                                    @if ($facture->type == "facture")
                                    <a class="dropdown-item btn-edit-facture" facture-id="{{ $facture->id ?? '' }}"
                                        href="#0" class="cd-popup-trigger btn btn-info"
                                        onclick="openpopup('factureComPopup')">
                                        <i class="fa fa-edit"></i> {{__('messages.edit')}}
                                    </a>
                                    @elseif ($facture->type == "recu")
                                    <a class="dropdown-item btn-edit-recu" recu-id="{{ $facture->id ?? '' }}" href="#0"
                                        class="cd-popup-trigger btn btn-success" onclick="openpopup('recuPopup')">
                                        <i class="fa fa-edit"></i> {{__('messages.edit')}}
                                    </a>
                                    @endif
                                    @else
                                    @include('layouts.admin.required.includes.controle.accessDeniedBtnEdit')
                                    @endif

                                </div>
                            </div>
                        </small>
                    </td>
                </tr>
                @endforeach


            </tbody>
            {{-- <tfoot>
                <tr>
                    <th>N°</th>

                    <th>Type</th>
                    <th>Bénéficiaire</th>


                    <th>Note</th>
                    <th>Sous_total</th>
                    <th>Taxe</th>
                    <th>Total</th>
                    <th>Date</th>
                    <th style="width: 5%">Action</th>
                </tr>
            </tfoot> --}}
        </table>
        @else
        @include('layouts.admin.required.includes.controle.accessDeniedShow')
        @endif


    </div>
</div>

<div id="facture" class="cd-popup ex3 bg-light fixed-top" role="alert">
    @include('entreprise.commerciale.factures.facture.form')
</div>





@endsection

@section('scripts')
{{-- @include('layouts.admin.required.extensions.js.datatable') --}}
<script src="{{asset('assets/admin/js/flatpickr.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>

@include('layouts.admin.required.extensions.js.FullScreenPopup')
@include('entreprise.commerciale.factures.facture.ajax')
@include('entreprise.commerciale.factures.recu.ajax')



@endsection
