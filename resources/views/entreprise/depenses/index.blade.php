@extends('layouts.admin.admin')

@section('styles')
@include('layouts.admin.required.extensions.styles.datatable')
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

<div id="pop1" class="cd-popup ex3 bg-light fixed-top" role="alert">
    @include('entreprise.depenses.depenses.facture.form')
</div>

<div id="depenseSimple" class="cd-popup ex3 bg-light fixed-top" role="alert">
    @include('entreprise.depenses.depenses.depenseSimple.form')
</div>

<div id="cheque" class="cd-popup ex3 bg-light fixed-top" role="alert">
    @include('entreprise.depenses.depenses.cheque.form')
</div>
<div id="credit" class="cd-popup ex3 bg-light fixed-top" role="alert">
    @include('entreprise.depenses.depenses.creditFournisseurs.form')
</div>


<div id="pop2" class="cd-popup ex3 bg-light fixed-top" role="alert">
    @include('entreprise.depenses.depenses.facture.popup2')
</div>

<div id="chequepopup" class="cd-popup ex3 bg-light fixed-top" role="alert">
    @include('entreprise.depenses.depenses.cheque.chequepopup')
</div>

<div id="depensepopup" class="cd-popup ex3 bg-light fixed-top" role="alert">
    @include('entreprise.depenses.depenses.depenseSimple.depensepopup')
</div>

<div id="creditFournisseursPopup" class="cd-popup ex3 bg-light fixed-top" role="alert">
    @include('entreprise.depenses.depenses.creditFournisseurs.creditFournisseursPopup')
</div>

<input value="{{ $Fournisseurs }}" type="hidden" id="FournisseursPop2"/>
<input value="{{ $Modalites }}" type="hidden" id="ModalitesPop2"/>

  <div class="card mb-3"  style="min-height: 90vh">
    <div class="card-header">
      <div class="row flex-between-end">
        <div class="col-auto align-self-center">
          {{-- <h5 class="mb-0" data-anchor="data-anchor">Example</h5> --}}
          <h4 >
            {{$PageName ?? "no page name (Déclarer la variable PageName sur le controlleur de cette view avec le nom de la page.)"}}
        </h4>

        </div>
        <div class="col-auto ms-auto">
          <div class="nav nav-pills nav-pills-falcon flex-grow-1" role="tablist">
            @if (Auth::user()->habilitation->fonctionnalites->where('module_id', 2)->first()->voir == "yes")
            <a href="{{route('entreprise.fournisseurs.list')}}" class="btn btn-dark text-light mr-2" style="margin-right: 1em ">Fournisseurs</a>
            @endif
            @if (Auth::user()->habilitation->fonctionnalites->where('module_id', 6)->first()->ajouter == "yes")
            <div class="btn-group" role="group">
                <button class="btn btn-primary bg-line-chart-gradient text-light dropdown-toggle" id="btnGroupVerticalDrop1" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ajouter une dépenses</button>
                <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">

                   <a class="dropdown-item" href="#0" id="pop1btn" class="cd-popup-trigger"  onclick="openpopup('pop1')">{{__('messages.invoice_to_pay')}}</a>
                   <a class="dropdown-item" href="#0" id="pop1btn" class="cd-popup-trigger"  onclick="openpopup('depenseSimple')">{{__('messages.expense')}}</a>
                   <a class="dropdown-item" href="#0" id="pop1btn" class="cd-popup-trigger"  onclick="openpopup('cheque')">{{__('messages.check')}}</a>
                   <a class="dropdown-item" href="#0" id="pop1btn" class="cd-popup-trigger"  onclick="openpopup('credit')">{{__('messages.vendor_credit')}}</a>

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
                  <div >
                    <h6 class="text-700 text-white" style="color: white">{{__('messages.invoice_to_pay')}} ({{$Depenses->where('type', "facture")->count()}})</h6>
                    <h3 class="fw-normal text-700" style="color: white !important">{!! formatpriceth($Depenses->where('type', "facture")->sum('total'), getCurrency()) !!}</h3>
                  </div>
                </div>

                <div class="col-md-3 p-3 m-1 card h-100 bg-line-chart-gradient" style="width: 24.4% !important">
                    <div>
                      <h6 class="text-700 text-white" style="color: white">{{__('messages.expense')}} ({{$Depenses->where('type', "depense")->count()}})</h6>
                      <h3 class="fw-normal text-700" style="color: white !important">{!! formatpriceth($Depenses->where('type', "depense")->sum('total'), getCurrency()) !!}</h3>
                    </div>
                  </div>

                  <div class="col-md-3 p-3 m-1 card h-100 bg-line-chart-gradient" style="width: 24.4% !important">
                    <div>
                      <h6 class="text-700 text-white" style="color: white">{{__('messages.check')}} ({{$Depenses->where('type', "cheque")->count()}})</h6>
                      <h3 class="fw-normal text-700" style="color: white !important">{!! formatpriceth($Depenses->where('type', "cheque")->sum('total'), getCurrency()) !!}</h3>
                    </div>
                  </div>

                  <div class="col-md-3 p-3 m-1 card h-100 bg-line-chart-gradient" style="width: 24.4% !important">
                    <div>
                      <h6 class="text-700 text-white" style="color: white">{{__('messages.vendor_credit')}} ({{$Depenses->where('type', "credit")->count()}})</h6>
                      <h3 class="fw-normal text-700" style="color: white !important">{!! formatpriceth($Depenses->where('type', "credit")->sum('total'), getCurrency()) !!}</h3>
                    </div>
                  </div>


              </div>

        </div>

      </div>
    <div class="card-body bg-light table-responsive scrollbar">
        @if (Auth::user()->habilitation->fonctionnalites->where('module_id', 6)->first()->voir == "yes")
        <table id="example" class="table table-hover table-striped overflow-hidden" style="width:100%">
            <thead class="text-light" style="background-color: #232e3c">
                <tr>
                    <th>{{__('messages.date')}}</th>
                    <th>{{__('messages.type')}}</th>
                    <th>{{__('messages.beneficiary')}}</th>
                    <th>{{__('messages.no')}}</th>
                    <th>{{__('messages.note')}}</th>
                    <th>{{__('messages.sub_total')}}</th>
                    <th>{{__('messages.taxes')}}</th>
                    <th>{{__('messages.total')}}</th>
                    <th style="width: 2%">{{__('messages.action')}}</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($Depenses->where('status', '!=', "draft") as $depense)


                <tr>
                    <td>{{$depense->created_at->format('d M Y')}}</td>

                    @if ($depense->type == "credit")
                    <td>{{__('messages.vendors_credit')}}</td>
                    @elseif ($depense->type == "facture")
                    <td>{{__('messages.invoice')}}</td>
                    @elseif ($depense->type == "depense")
                    <td>{{__('messages.expense')}}</td>
                    @elseif ($depense->type == "cheque")
                    <td>{{__('messages.check')}}</td>
                    @endif
                    @if ($depense->fournisseur_id)
                    <td>{{$depense->fournisseur->entreprise??"ff"}}</td>

                    @elseif ($depense->clients_entreprise_id)
                    <td>{{$depense->clientsEntreprise->entreprise}}</td>

                    @endif
                    @if ($depense->type == "facture")
                    <td>{{$depense->facture->numero_facture ??"-- "}}</td>
                    @elseif ($depense->type == "depense")
                    <td>{{$depense->depensesSimple->reference ??"--"}}</td>
                    @elseif ($depense->type == "cheque")
                    <td>{{$depense->cheque->numero_cheque??"--"}}</td>
                    @elseif ($depense->type == "credit")
                    <td>{{$depense->fournisseursCredit->note ??""}}</td>
                    @endif
                    @if ($depense->type == "facture")
                    <td>{{$depense->message}}</td>
                    @elseif ($depense->type == "depense")
                    <td>{{$depense->note}}</td>
                    @elseif ($depense->type == "cheque")
                    <td>{{$depense->note}}</td>
                    @elseif ($depense->type == "credit")
                    <td>{{$depense->note}}</td>
                    @endif
                    <td>{!! formatpriceth($depense->total_sans_taxe??0, getCurrency()) !!}</td>
                    <td>{!! formatpriceth($depense->taxe??0, getCurrency()) !!}</td>
                    <td>{!! formatpriceth($depense->total??0, getCurrency()) !!}</td>
                    @if (Auth::user()->habilitation->fonctionnalites->where('module_id', 6)->first()->modifier == "yes")
                    <td>
                        @if ($depense->type == "facture")
                        <a class=" btn btn-primary bg-line-chart-gradient btn-edit-facture" facture-id="{{ $depense->id ?? '' }}" href="#0" class="cd-popup-trigger btn btn-info" onclick="openpopup('pop2')">{{__('messages.edit')}}</a>

                        @elseif ($depense->type == "depense")
                        <a class=" btn btn-primary bg-line-chart-gradient depense-simple" id="depense-simple" depense-id="{{ $depense->id ?? '' }}" href="#0" class="cd-popup-trigger btn btn-success" onclick="openpopup('depensepopup')">{{__('messages.edit')}}</a>

                        @elseif ($depense->type == "cheque")
                        <a class=" btn btn-primary bg-line-chart-gradient btn-edit-cheque" cheque-id="{{ $depense->id ?? '' }}" href="#0" class="cd-popup-trigger btn btn-danger" onclick="openpopup('chequepopup')">{{__('messages.edit')}}</a>

                        @elseif ($depense->type == "credit")
                        <a class="btn btn-primary bg-line-chart-gradient btn-edit-credit" credit-id="{{ $depense->id ?? '' }}" href="#0" class="cd-popup-trigger btn btn-warning" onclick="openpopup('creditFournisseursPopup')">{{__('messages.edit')}}</a>

                        @endif
                    </td>
                    @else
                        @include('layouts.admin.required.includes.controle.accessDeniedBtnEdit')
                    @endif

                </tr>
                @endforeach


            </tbody>
            <tfoot>
                <tr>
                    <th>{{__('messages.date')}}</th>
                    <th>{{__('messages.type')}}</th>
                    <th>{{__('messages.beneficiary')}}</th>
                    <th>{{__('messages.no')}}</th>
                    <th>{{__('messages.note')}}</th>
                    <th>{{__('messages.sub_total')}}</th>
                    <th>{{__('messages.taxes')}}</th>
                    <th>{{__('messages.total')}}</th>
                    <th style="width: 2%">{{__('messages.action')}}</th>

                </tr>
            </tfoot>
        </table>

        @else
            @include('layouts.admin.required.includes.controle.accessDeniedShow')
        @endif

    </div>
  </div>

</div>

@endsection

@section('scripts')
@include('layouts.admin.required.extensions.js.datatable')
@include('layouts.admin.required.extensions.js.FullScreenPopup')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
<script src="{{asset('assets/admin/js/flatpickr.js')}}"></script>

{{-- @include('layouts.admin.required.extensions.js.dynamicCategoryAdd') --}}

@include('entreprise.depenses.depenses.facture.ajax')
@include('entreprise.depenses.depenses.depenseSimple.ajax')
@include('entreprise.depenses.depenses.cheque.ajax')
@include('entreprise.depenses.depenses.creditFournisseurs.ajax')


@endsection
