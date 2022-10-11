@extends('layouts.admin.admin')

@section('styles')
@include('layouts.admin.required.extensions.styles.datatable')
@include('layouts.admin.required.extensions.styles.FullScreenPopup')
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
<div id="addEmploye" class="cd-popup ex3 bg-light fixed-top" role="alert">
    @include('entreprise.rh.employes.form')
</div>

<div class="card mb-3 "  id="customersTable" data-list="{&quot;valueNames&quot;:[&quot;name&quot;,&quot;email&quot;,&quot;phone&quot;,&quot;address&quot;,&quot;joined&quot;],&quot;page&quot;:10,&quot;pagination&quot;:true}">
    <div class="card-header"  style="background-color: #232e3c">
      <div class="row flex-between-center">
        <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
          <h5 class="fs-0 mb-0 text-nowrap text-light py-2 py-xl-0">{{$PageName}}</h5>
        </div>
        <div class="col-8 col-sm-auto text-end ps-2">

          <div id="table-customers-replace-element">
            <a class="btn  btn-sm bg-line-chart-gradient text-light" href="{{route('entreprise.employe.create')}}"><svg class="svg-inline--fa fa-plus fa-w-14" data-fa-transform="shrink-3 down-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="" style="transform-origin: 0.4375em 0.625em;"><g transform="translate(224 256)"><g transform="translate(0, 64)  scale(0.8125, 0.8125)  rotate(0 0 0)"><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z" transform="translate(-224 -256)"></path></g></g></svg><!-- <span class="fas fa-plus" data-fa-transform="shrink-3 down-2"></span> Font Awesome fontawesome.com --><span class="d-none d-sm-inline-block ms-1">{{__('messages.add_employer')}}</span></a>

            <button class="btn btn-falcon-default btn-sm" type="button"><svg class="svg-inline--fa fa-external-link-alt fa-w-16" data-fa-transform="shrink-3 down-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="external-link-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="" style="transform-origin: 0.5em 0.625em;"><g transform="translate(256 256)"><g transform="translate(0, 64)  scale(0.8125, 0.8125)  rotate(0 0 0)"><path fill="currentColor" d="M432,320H400a16,16,0,0,0-16,16V448H64V128H208a16,16,0,0,0,16-16V80a16,16,0,0,0-16-16H48A48,48,0,0,0,0,112V464a48,48,0,0,0,48,48H400a48,48,0,0,0,48-48V336A16,16,0,0,0,432,320ZM488,0h-128c-21.37,0-32.05,25.91-17,41l35.73,35.73L135,320.37a24,24,0,0,0,0,34L157.67,377a24,24,0,0,0,34,0L435.28,133.32,471,169c15,15,41,4.5,41-17V24A24,24,0,0,0,488,0Z" transform="translate(-256 -256)"></path></g></g></svg><!-- <span class="fas fa-external-link-alt" data-fa-transform="shrink-3 down-2"></span> Font Awesome fontawesome.com --><span class="d-none d-sm-inline-block ms-1">{{__('messages.pay_list')}}</span></button>
          </div>
        </div>
      </div>
    </div>
    <div class="card-body  p-0" style="min-height: 78vh !important">
      <div class="table-responsive">
        <table class="table table-sm table-striped fs--1 mb-0 overflow-hidden">
          <thead class="bg-200 text-900">
            <tr>
              <th>
                <div class="form-check fs-0 mb-0 d-flex align-items-center">
                  <input class="form-check-input" id="checkbox-bulk-customers-select" type="checkbox" data-bulk-select="{&quot;body&quot;:&quot;table-customers-body&quot;,&quot;actions&quot;:&quot;table-customers-actions&quot;,&quot;replacedElement&quot;:&quot;table-customers-replace-element&quot;}">
                </div>
              </th>
              <th class="sort pe-1 align-left white-space-nowrap" data-sort="name">{{__('messages.full_name')}}</th>
              <th class="sort pe-1 align-left white-space-nowrap" data-sort="email">{{__('messages.email')}}</th>
              <th class="sort pe-1 align-left white-space-nowrap" data-sort="phone">{{__('messages.telephone')}}</th>
              <th class="sort pe-1 align-left white-space-nowrap" data-sort="joined">{{__('messages.remuneration')}}</th>
              <th class="sort pe-1 align-left white-space-nowrap ps-5" data-sort="address" style="min-width: 200px;">{{__('messages.payment_mode')}}</th>
              <th class="align-left no-sort" style="width: 2%"></th>
            </tr>
          </thead>
          <tbody class="list" id="table-customers-body">

            @foreach ($Employes as $employe)
            <tr class="btn-reveal-trigger">
                <td class="align-left py-2" style="width: 28px;">
                  <div class="form-check fs-0 mb-0 d-flex align-items-center">
                    <input class="form-check-input" type="checkbox" id="customer-0" data-bulk-select-row="data-bulk-select-row">
                  </div>
                </td>
                <td class="name align-left white-space-nowrap py-2"><a href="../../app/e-commerce/customer-details.html">
                    <div class="d-flex d-flex align-items-center">
                      <div class="avatar avatar-xl me-2">
                        <div class="avatar-name rounded-circle"><span>{{$employe->initial}}</span></div>
                      </div>
                      <div class="flex-1">
                        <h5 class="mb-0 fs--1">{{$employe->prenom}} {{$employe->nom}}</h5>
                      </div>
                    </div>
                  </a></td>
                <td class="email align-left py-2"><a href="{{"mailto:".$employe->email}}">{{$employe->email}}</a></td>
                <td class="phone align-left white-space-nowrap py-2"><a href="{{"tel:".$employe->telephone}}">{{$employe->telephone}} </a></td>
                <td class="address align-left white-space-nowrap ps-5 py-2">{{$employe->remuneration}}{{$employe->devisesMonetaire->sigle}}</td>
                <td class="joined align-left py-2">{{$employe->paiementsMode->nom}}</td>
                <td class="align-left white-space-nowrap py-2 text-end">
                  <div class="dropdown font-sans-serif position-static">
                    <button class="btn bg-line-chart-gradient btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" id="customer-dropdown-0" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" style="color: cornsilk">
                       <strong class="text-light">{{__('messages.option')}}</strong> <span class="fas fa-ellipsis-h text-light fs--1"></span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="customer-dropdown-0">
                      <div class="bg-white py-2">
                          <a class="dropdown-item" href="{{route('entreprise.employe.edit',$employe->id )}}">{{__('messages.edit')}}</a>
                        <a class="dropdown-item text-danger" href="#!">{{__('messages.details')}}</a>
                    </div>
                    </div>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <div class="card-footer d-flex align-items-center justify-content-center">
      <button class="btn btn-sm btn-falcon-default me-1 disabled" type="button" title="Previous" data-list-pagination="prev" disabled=""><svg class="svg-inline--fa fa-chevron-left fa-w-10" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M34.52 239.03L228.87 44.69c9.37-9.37 24.57-9.37 33.94 0l22.67 22.67c9.36 9.36 9.37 24.52.04 33.9L131.49 256l154.02 154.75c9.34 9.38 9.32 24.54-.04 33.9l-22.67 22.67c-9.37 9.37-24.57 9.37-33.94 0L34.52 272.97c-9.37-9.37-9.37-24.57 0-33.94z"></path></svg><!-- <span class="fas fa-chevron-left"></span> Font Awesome fontawesome.com --></button>
      <ul class="pagination mb-0"><li class="active"><button class="page" type="button" data-i="1" data-page="10">1</button></li><li><button class="page" type="button" data-i="2" data-page="10">2</button></li><li><button class="page" type="button" data-i="3" data-page="10">3</button></li></ul>
      <button class="btn btn-sm btn-falcon-default ms-1" type="button" title="Next" data-list-pagination="next"><svg class="svg-inline--fa fa-chevron-right fa-w-10" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"></path></svg><!-- <span class="fas fa-chevron-right"></span> Font Awesome fontawesome.com --></button>
    </div>
  </div>

@endsection

@section('scripts')
    @include('layouts.admin.required.extensions.js.FullScreenPopup')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
@endsection
