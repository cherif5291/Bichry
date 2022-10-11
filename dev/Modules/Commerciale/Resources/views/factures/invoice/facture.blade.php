@extends('layouts.admin.admin')

@section('styles')
@include('layouts.admin.required.extensions.styles.datatable')
<link href="{{asset('assets/admin/vendors/flatpickr/flatpickr.min.css')}}" rel="stylesheet" />
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
  <div class="modal fade" id="error-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px">
      <div class="modal-content position-relative">
        <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
          <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('entreprise.factures.paiement.facture')}}" method="POST"> @csrf

        <div class="modal-body p-0">
          <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
            <h4 class="mb-1" id="modalExampleDemoLabel">{{__('messages.add_new_payment')}} </h4>
          </div>
          <div class="p-4 pb-0">
              <div class="mb-3">
                <label class="col-form-label" for="recipient-name">{{__('messages.due_amount_today')}}: <strong class="text-danger">{!! formatpriceth($Facture->total-getReglements()->where('facture_id', $Facture->id)->sum('montant_recu'), getCurrency()) !!} </strong></label>
              </div>
              <input class="form-control" name="id"  hidden   value="{{$Facture->id}}"  type="text" />

              <div class="mb-3">
                <label class="col-form-label" for="recipient-name">{{__('messages.payment_amount')}} ({{getCurrency()->sigle}}):</label>
                <input class="form-control" name="montant" style="color: green !important"  value=" {{$Facture->total-getReglements()->where('facture_id', $Facture->id)->sum('montant_recu')}}" id="recipient-name" type="text" />
              </div>
              <div class="mb-3">
                <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1" for="fournisseur">{{__('messages.supply_source')}}</label>
                <select class="form-select mb-3" name="paiement_source" aria-label="Default select example">
                    <optgroup label="Banques">
                        @foreach ($Banques as $banque)
                        <option value="B{{$banque->id}}">{{$banque->nom}} | solde: {!! formatpriceth($banque->solde, getCurrency()) !!}</option>
                        @endforeach
                    </optgroup>
                    <optgroup label="Caisses">
                        @foreach ($Caisses as $caisse)
                        <option value="C{{$caisse->id}}">{{$caisse->nom}} | solde: {!! formatpriceth($caisse->solde, getCurrency()) !!}</option>
                        @endforeach
                    </optgroup>
                </select>
            </div>

              <div class="mb-3">
                <label class="col-form-label" for="message-text">{{__('messages.payment_note')}}:</label>
                <textarea class="form-control" name="note" id="message-text"></textarea>
              </div>


          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-danger" type="button" data-bs-dismiss="modal">{{__('messages.cancel')}}</button>
          <button class="btn btn-primary" type="submit">{{__('messages.save')}} </button>
        </div>
    </form>
      </div>
    </div>
  </div>
  <div class="row g-3">
    <div class="col-xl-4 order-xl-1">
      <div class="card">
        <div class="card-header bg-light d-flex flex-between-center">
          <h5 class="mb-0">{{__('messages.payments')}}</h5>
          <button class="btn btn-link btn-sm btn-light text-600" type="button" data-bs-toggle="modal" data-bs-target="#error-modal">  <i class="fa fa-plus"></i> Paiement
          </button>

        </div>
        <div class="card-body">
          <table class="table table-borderless fs--1 mb-0">
            <tbody>

            @foreach (getReglements()->where('facture_id', $Facture->id)  as $reglement)
            <tr class="border-bottom">
                <th class="ps-0">{{__('messages.received_amount')}}:
                <div class="stext-dark fs--2">
                    {{__('messages.receive_on')}}
                    {{-- @dd($reglement->caisse) --}}
                    @if ($reglement->banque_id >0)
                    {{__('messages.the_bank_account')}}  {{$reglement->banque->nom}}
                    @elseif ($reglement->caisse_id >0)
                    {{__('messages.the_cash')}}  {{$reglement->caisse->nom}} @endif
                    {{__('messages.on')}} {{$reglement->created_at}}
                </div>
                </th>
                <th class="pe-0 text-end">{!! formatpriceth($reglement->montant_recu, getCurrency()) !!}</th>
            </tr>
            @endforeach

            <tr class="border-bottom mt-4">
              <th class="ps-0">{{__('messages.total_amount')}}</th>
              <th class="pe-0 text-end">{!! formatpriceth($Facture->total, getCurrency()) !!}</th>
            </tr>
            <tr>
              <th class="ps-0 pb-0">{{__('messages.total_paid')}}</th>
              <th class="pe-0 text-end text-success pb-0">{!! formatpriceth(getReglements()->where('facture_id', $Facture->id)->sum('montant_recu'), getCurrency()) !!}</th>
            </tr>
          </tbody></table>
        </div>
        <div class="card-footer d-flex justify-content-between bg-light">

          <div class="fw-semi-bold">{{__('messages.due_amount')}}</div>
          <div class="fw-bold text-danger">{!! formatpriceth($Facture->total-getReglements()->where('facture_id', $Facture->id)->sum('montant_recu'), getCurrency()) !!}</div>
        </div>
      </div>
    </div>
    <div class="col-xl-8">
      <div class="card mb-3">
        <div class="card-header bg-light">
          <div class="row flex-between-center">
            <div class="col-sm-auto">
              {{-- <h5 class="mb-2 mb-sm-0">Your Shipping Address</h5> --}}
            </div>
            <div class="col-sm-auto">

                    <a  href="@if ($Facture->pdf_link){{asset($Facture->pdf_link)}}{{asset($Facture->pdf_link)}} @else {{route('entreprise.factures.generer.pdf', $Facture->id)}} @endif" download="" class="btn btn-falcon-default btn-sm me-1 mb-2 mb-sm-0" ><svg class="svg-inline--fa fa-arrow-down fa-w-14 me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M413.1 222.5l22.2 22.2c9.4 9.4 9.4 24.6 0 33.9L241 473c-9.4 9.4-24.6 9.4-33.9 0L12.7 278.6c-9.4-9.4-9.4-24.6 0-33.9l22.2-22.2c9.5-9.5 25-9.3 34.3.4L184 343.4V56c0-13.3 10.7-24 24-24h32c13.3 0 24 10.7 24 24v287.4l114.8-120.5c9.3-9.8 24.8-10 34.3-.4z"></path></svg><!-- <span class="fas fa-arrow-down me-1"> </span> Font Awesome fontawesome.com -->Télécharger (.pdf)</a>
                    <a href="{{route('entreprise.factures.generer.pdf', $Facture->id)}}" class="btn btn-falcon-default btn-sm me-1 mb-2 mb-sm-0" type="button"><svg class="svg-inline--fa fa-print fa-w-16 me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="print" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M448 192V77.25c0-8.49-3.37-16.62-9.37-22.63L393.37 9.37c-6-6-14.14-9.37-22.63-9.37H96C78.33 0 64 14.33 64 32v160c-35.35 0-64 28.65-64 64v112c0 8.84 7.16 16 16 16h48v96c0 17.67 14.33 32 32 32h320c17.67 0 32-14.33 32-32v-96h48c8.84 0 16-7.16 16-16V256c0-35.35-28.65-64-64-64zm-64 256H128v-96h256v96zm0-224H128V64h192v48c0 8.84 7.16 16 16 16h48v96zm48 72c-13.25 0-24-10.75-24-24 0-13.26 10.75-24 24-24s24 10.74 24 24c0 13.25-10.75 24-24 24z"></path></svg><!-- <span class="fas fa-print me-1"> </span> Font Awesome fontawesome.com -->Imprimer</a>
                    <a href="{{route('entreprise.facture.send',  $Facture->id)}}" class="btn btn-falcon-default btn-sm mb-2 mb-sm-0" type="button"><svg class="svg-inline--fa fa-dollar-sign fa-w-9 me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="dollar-sign" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 288 512" data-fa-i2svg=""><path fill="currentColor" d="M209.2 233.4l-108-31.6C88.7 198.2 80 186.5 80 173.5c0-16.3 13.2-29.5 29.5-29.5h66.3c12.2 0 24.2 3.7 34.2 10.5 6.1 4.1 14.3 3.1 19.5-2l34.8-34c7.1-6.9 6.1-18.4-1.8-24.5C238 74.8 207.4 64.1 176 64V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48h-2.5C45.8 64-5.4 118.7.5 183.6c4.2 46.1 39.4 83.6 83.8 96.6l102.5 30c12.5 3.7 21.2 15.3 21.2 28.3 0 16.3-13.2 29.5-29.5 29.5h-66.3C100 368 88 364.3 78 357.5c-6.1-4.1-14.3-3.1-19.5 2l-34.8 34c-7.1 6.9-6.1 18.4 1.8 24.5 24.5 19.2 55.1 29.9 86.5 30v48c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16v-48.2c46.6-.9 90.3-28.6 105.7-72.7 21.5-61.6-14.6-124.8-72.5-141.7z"></path></svg><!-- <span class="fas fa-dollar-sign me-1"></span> Font Awesome fontawesome.com -->Envoyer par mail</a>
                    <a href="{{route('factures.index')}}" class="btn btn-falcon-danger btn-sm mb-2 mb-sm-0" type="button">{{__('messages.back')}}</a>

            </div>
          </div>
        </div>
        <div class="card-body">
            <div class="row align-items-center text-center mb-3">
              @if (getCompanyInfo()->logo)

              <div class="col-sm-6 text-sm-start">
                <img src="{{asset(getCompanyInfo()->logo)}}" alt="invoice" width="150">
              </div>

              @endif
              <div class="col text-sm-end mt-3 mt-sm-0">
                  @if ($Facture->type =="facture")
                  <h2 class="mb-3">{{__('messages.invoice')}}</h2>
                    @else
                    <h2 class="mb-3">{{__('messages.receipt')}}</h2>

                  @endif
                <h5>{{Auth::user()->entreprise->nom_entreprise}}</h5>
                <p class="fs--1 mb-0">{{Auth::user()->entreprise->adresse}}<br>{{Auth::user()->entreprise->ville}}, {{Auth::user()->entreprise->pays}} <br>
                    <i class="fas fa-phone-square-alt"></i> {{Auth::user()->entreprise->telephone}}
                </p>
              </div>
              <div class="col-12">
                <hr>
              </div>
            </div>
            <div class="row align-items-center">
              <div class="col">
                <h6 class="text-500">{{__('messages.address_to')}}</h6>
                <h5>{{$Facture->clientsEntreprise->nom_pro}}</h5>
                <p class="fs--1"> {{__('messages.represented_by')}}: <strong>{{$Facture->clientsEntreprise->prenom}} {{$Facture->clientsEntreprise->nom}}</strong> <br>
                    {{$Facture->clientsEntreprise->adresse}}<br>{{$Facture->clientsEntreprise->ville}}, {{$Facture->clientsEntreprise->pays}}<br>Canada</p>
                <p class="fs--1"><a href="mailto:{{$Facture->clientsEntreprise->email}}">{{$Facture->clientsEntreprise->email}}</a><br><a href="tel:{{$Facture->clientsEntreprise->telephone}}">{{$Facture->clientsEntreprise->telephone}}</a></p>
              </div>
              <div class="col-sm-auto ms-auto">
                <div class="table-responsive">
                  <table class="table table-sm table-borderless fs--1">
                    <tbody>
                      <tr>
                        <th class="text-sm-end">{{__('messages.no')}} {{$Facture->type}}: </th>
                        <td>{{$Facture->numero_facture ?? $Facture->numero_recu}}</td>
                      </tr>
                      @if ($Facture->reference)
                      <tr>
                        <th class="text-sm-end">{{__('messages.no')}} {{__('messages.of_reference')}}:</th>
                        <td>{{$Facture->reference}}</td>
                      </tr>
                      @endif
                      <tr>

                        <th class="text-sm-end">{{__('messages.date')}} @if ($Facture->type == "facture") {{__('messages.of_invoice')}} @elseif ($Facture->type == "recu") {{__('messages.of_receipt')}} @endif:</th>
                        <td>{{$Facture->date_facturation}}</td>
                      </tr>
                      <tr>
                        <th class="text-sm-end">{{__('messages.due_date')}}:</th>
                        <td>{{$Facture->echeance}}</td>
                      </tr>
                      <tr class="alert-success fw-bold">
                        <th class="text-sm-end">{{__('messages.amount')}}:</th>
                        <td>{!! formatpriceth($Facture->total, getCurrency()) !!} </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="table-responsive scrollbar mt-4 fs--1">
              <table class="table table-striped border-bottom">
                <thead class="light">
                  <tr class="bg-primary text-white dark__bg-1000">
                    <th class="border-0">{{__('messages.title')}}</th>
                    <th class="border-0 text-center">{{__('messages.quantity')}}</th>
                    <th class="border-0 text-end">{{__('messages.amount')}}</th>
                    <th class="border-0 text-end">{{__('messages.taxes')}}</th>

                    <th class="border-0 text-end">{{__('messages.total')}}</th>
                  </tr>
                </thead>
                <tbody>
                 {{-- @dd($Facture->depensesPaniers); --}}
                  @foreach ($Facture->depensesPaniers as $article)
                  <tr>
                    <td class="align-middle">
                      <h6 class="mb-0 text-nowrap">{{$article->designation}}</h6>
                      @if ($article->description)
                      <p class="mb-0">{{$article->description}}</p>

                      @endif
                    </td>
                    <td class="align-middle text-center">{{$article->qte}}</td>
                    <td class="align-middle text-end">{!! formatpriceth($article->montant, getCurrency()) !!}</td>
                    <td class="align-middle text-end">{!! formatpriceth($article->montant_taxe, getCurrency()) !!}</td>
                    <td class="align-middle text-end">{!! formatpriceth($article->total, getCurrency()) !!}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="row justify-content-end">
              <div class="col-auto">
                <table class="table table-sm table-borderless fs--1 text-end">
                  <tbody><tr>
                    <th class="text-900">{{__('messages.sub_total')}}:</th>
                    <td class="fw-semi-bold">{!! formatpriceth($Facture->total_sans_taxe, getCurrency()) !!}</td>
                  </tr>
                  <tr>
                    <th class="text-900">{{__('messages.taxe_amount')}}:</th>
                    <td class="fw-semi-bold">{!! formatpriceth($Facture->taxe, getCurrency()) !!}</td>
                  </tr>
                  <tr class="border-top">
                    <th class="text-900">{{__('messages.total_amount')}}:</th>
                    <td class="fw-semi-bold"> {!! formatpriceth($Facture->total, getCurrency()) !!}</td>
                  </tr>
                  <tr class="border-top border-top-2 fw-bolder text-900">
                    <th>{{__('messages.due_amout')}}:</th>
                    <td class="text-danger"> {!! formatpriceth($Facture->total-getReglements()->where('facture_id', $Facture->id)->sum('montant_recu'), getCurrency()) !!}</td>
                  </tr>
                </tbody></table>
              </div>
            </div>
          </div>
      </div>

    </div>
  </div>

@endsection

@section('scripts')
<script src="{{asset('assets/admin/js/flatpickr.js')}}"></script>
@include('layouts.admin.required.extensions.js.datatable')
@endsection
