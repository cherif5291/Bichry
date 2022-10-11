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

  <div class="row g-0">
    <div class="col-lg-4 pe-lg-2">
        <div class="card h-100">
            <ul class="nav nav-tabs py-1" id="myTab" role="tablist"  style="background-color: #232e3c">
                <li class="nav-item"><a class="nav-link active text-light" id="home-tab" data-bs-toggle="tab" href="#tab-home" role="tab" aria-controls="tab-home" aria-selected="true">{{__('messages.cash_account')}}</a></li>
                <li class="nav-item"><a class="nav-link text-light" id="profile-tab" data-bs-toggle="tab" href="#tab-profile" role="tab" aria-controls="tab-profile" aria-selected="false">{{__('messages.banks_account')}}</a></li>
            </ul>
            <div class="tab-content border-x border-bottom p-3" id="myTabContent">
                <div class="tab-pane fade show active" id="tab-home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="table-responsive scrollbar">
                        <table class="table fs--1 mb-0 overflow-hidden">
                          <thead class="bg-100 text-800">
                            <tr>
                              <th class="w-100 text-start ">{{__('messages.name')}}</th>
                              <th class="text-nowrap text-end ">{{__('messages.balance')}}</th>
                              <th class="text-nowrap text-end ">...</th>

                            </tr>
                          </thead>
                          <tbody>
                              @foreach ($Caisses as $caisse)
                              <tr>
                                <td class="text-truncate">{{$caisse->nom}}</td>
                                <td class="text-truncate">{!! formatpriceth($caisse->solde, getCurrency()) !!}</td>
                                <td class="text-truncate text-start">
                                    <a href="{{route('entreprise.finances.caisse',$caisse->id )}}"> <i class="far fa-eye"></i></a>
                                </td>
                              </tr>
                              @endforeach


                          </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab-profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="table-responsive scrollbar">
                        <table class="table fs--1 mb-0 overflow-hidden">
                          <thead class="bg-100 text-800">
                            <tr>
                              <th class="w-100 text-start ">{{__('messages.name')}}</th>
                              <th class="text-nowrap text-end ">{{__('messages.balance')}}</th>
                              <th class="text-nowrap text-end ">...</th>

                            </tr>
                          </thead>
                          <tbody>
                              @foreach ($Banques as $banque)
                              <tr>
                                <td class="text-truncate">{{$banque->nom}}</td>
                                <td class="text-truncate">{!! formatpriceth($banque->solde, getCurrency()) !!}</td>
                                <td class="text-truncate text-start">
                                    <a href="{{route('entreprise.finances.banque',$banque->id )}}"> <i class="far fa-eye"></i></a>
                                </td>
                              </tr>
                              @endforeach


                          </tbody>
                        </table>
                    </div>
                </div>
                {{-- <div class="tab-pane fade" id="tab-contact" role="tabpanel" aria-labelledby="contact-tab">Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork.</div> --}}
            </div>
        </div>


    </div>
    <div class="col-lg-8 ps-lg-2">
        <div class="card h-100">
            <div class="card-header d-flex flex-between-center  py-2"  style="background-color: #232e3c">
                <h6 class="mb-0 text-light">{{__('messages.financial_activity')}} {{__('messages.of')}} <strong class="text-danger">{{$Caisse->nom}}</strong></h6>
              <div class="dropdown font-sans-serif btn-reveal-trigger">
                <button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal" type="button" id="dropdown-campaign-perfomance" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><svg class="svg-inline--fa fa-ellipsis-h fa-w-16 fs--2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="ellipsis-h" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M328 256c0 39.8-32.2 72-72 72s-72-32.2-72-72 32.2-72 72-72 72 32.2 72 72zm104-72c-39.8 0-72 32.2-72 72s32.2 72 72 72 72-32.2 72-72-32.2-72-72-72zm-352 0c-39.8 0-72 32.2-72 72s32.2 72 72 72 72-32.2 72-72-32.2-72-72-72z"></path></svg><!-- <span class="fas fa-ellipsis-h fs--2"></span> Font Awesome fontawesome.com --></button>
                <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-campaign-perfomance" style=""><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                  <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                </div>
              </div>
            </div>
            <div class="card-body pb-0">
                <div class="row">
                    <div class="col-1 p-3 m-1 card h-100 bg-dark">
                        <div>
                            <small style="color: white !important">----</small>
                            <h3 class="fw-normal text-700" style="color: white !important">{{$Transactions->where('type', "credit")->where('created_at', $Today)->count()}}</h3>
                        </div>
                        </div>
                    <div class="col-4 p-3 m-1 card h-100 bg-line-chart-gradient">
                      <div>
                        <h6 class="text-700 text-white" style="color: white">{{__('messages.actual_balance')}}</h6>
                        <h3 class="fw-normal text-700" style="color: white !important">{!! formatpriceth($Caisse->solde, getCurrency()) !!}</h3>
                      </div>
                    </div>
                    <div class="col-3 p-3 m-1 card h-100 bg-danger">
                      <div>
                        <h6 class="text-700" style="color: white !important">{{__('messages.debited_today')}}</h6>
                        <h3 class="fw-normal text-700" style="color: white !important">{!! formatpriceth($Transactions->where('type', "debit")->where('created_at', $Today)->sum('montant'), getCurrency()) !!}</h3>
                      </div>
                    </div>
                    <div class="col-3 p-3 m-1 card h-100 bg-success">
                        <div>
                          <h6 class="text-700" style="color: white !important">{{__('messages.credited_today')}}</h6>
                          <h3 class="fw-normal text-700" style="color: white !important">{!! formatpriceth($Transactions->where('type', "credit")->where('created_at', $Today)->sum('montant'), getCurrency()) !!}</h3>
                        </div>
                      </div>

                  </div>
              <div class="mx-ncard">
                <div class="table-responsive scrollbar">
                  <table class="table fs--1 mb-0 overflow-hidden">
                    <thead class="bg-100 text-800">
                      <tr>
                        <th class="" style="width: 2%">{{__('messages.type')}}</th>
                        <th class="text-nowrap text-start w-100">{{__('messages.cause')}}</th>
                        <th class="text-nowrap text-end">{{__('messages.old_amount')}}</th>
                        <th class="text-nowrap text-end">{{__('messages.amount')}}</th>
                        <th class="text-nowrap text-end">{{__('messages.new_amount')}}</th>


                        {{-- <th class="text-nowrap text-end">...</th> --}}
                      </tr>
                    </thead>
                    <tbody>

                        @foreach ($Transactions as $transaction)
                        <tr>

                            <td class="text-truncate">
                                @if ($transaction->type == "credit")
                               <img src="{{asset('assets/icons/money_in.png')}}" height="25px" alt="">
                                @elseif ($transaction->type == "debit")
                                <img src="{{asset('assets/icons/money_out.png')}}" height="25px" alt="">
                                @endif
                            </td>
                            <td class="text-truncate text-start">{{$transaction->motif}}</td>
                            <td class="text-truncate text-end">{!! formatpriceth($transaction->pre_solde_caisse, getCurrency()) !!}</td>
                            <td class="text-truncate text-end">{!! formatpriceth($transaction->montant, getCurrency()) !!}</td>
                            <td class="text-truncate text-end">{!! formatpriceth($transaction->post_solde_caisse, getCurrency()) !!}</td>
                            {{-- <td class="text-truncate text-end"></td> --}}
                        </tr>
                        @endforeach


                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
    </div>
  </div>

@endsection

