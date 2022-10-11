


@extends('layouts.admin.admin')

@section('styles')
@include('layouts.admin.required.extensions.styles.datatable')


<script>
    window.onload = function () {
     var chart = new CanvasJS.Chart("chartContainer", {
         theme: "light3",

         subtitles: [{
             text: ""
         }],
         legend:{
             cursor: "pointer",
             itemclick: toggleDataSeries
         },
         toolTip: {
             shared: true
         },
         data: [

         {
             type: "stackedArea",
             name: "Factures",
             showInLegend: true,
             yValueFormatString: "#,##0 ",
             dataPoints: @php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK);  @endphp
         },

         {
             type: "stackedArea",
             name: "Dépenses",
             showInLegend: true,
             visible: true,
             yValueFormatString: "#,##0 ",
             dataPoints: @php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK);  @endphp
         }
    ]
     });

     chart.render();

     function toggleDataSeries(e){
         if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
             e.dataSeries.visible = false;
         }
         else{
             e.dataSeries.visible = true;
         }
         chart.render();
     }

     }
    </script>
@endsection

@section('content')
@if (Auth::user()->role == "entreprise" OR Auth::user()->role == "admin" OR Auth::user()->role == "cabinet" OR Auth::user()->role == "cabinet")
@php
$PackageEntreprise = $Abonnement->where('entreprise_id', Auth::user()->entreprise_id)->first()->package_id;
// $PackageEntreprise = $Packages::where('package_id', $AbonnementEntreprise->package_id)->first();
$ModuleEntreprise = $ModulePack->where('package_id', $PackageEntreprise);
@endphp
@endif

@include('layouts.admin.required.includes.messages')

<div class="row g-3 mb-3">
    <div class="col-xxl-6 col-xl-12">
      <div class="row g-3">
        <div class="col-12">
          <div class="card bg-transparent-50 overflow-hidden">
            <div class="card-header position-relative">
              <div class="bg-holder d-none d-md-block bg-card z-index-1" style="background-image:url('{{asset('assets/admin/img/illustrations/ecommerce-bg.png')}}');background-size:230px;background-position:right bottom;z-index:-1;">
              </div>
              <!--/.bg-holder-->

              <div class="position-relative z-index-2">
                <div>
                  <h3 class="text-primary mb-1">{{__('messages.hello')}}, {{$Entreprise->nom_entreprise}}!</h3>
                  <p>{{__('messages.dashboard_intro')}}</p>
                </div>
                <div class="d-flex py-3">
                  <div class="pe-3">
                    <p class="text-600 fs--1 fw-medium">{{__('Ce jour')}}</p>
                    <h4 class="text-800 mb-0">{!! formatpriceth($DayCollected, getCurrency()) !!}</h4>
                  </div>
                  <div class="ps-3">
                    <p class="text-600 fs--1">{{__('messages.collected_this_month')}}</p>
                    <h4 class="text-800 mb-0">{!! formatpriceth($MonthCollected, getCurrency()) !!}</h4>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body p-0">
              <ul class="mb-0 list-unstyled">
                <li class="alert mb-0 rounded-0 py-3 px-card alert-warning border-x-0 border-top-0">
                  <div class="row flex-between-center">
                    <div class="col">
                      <div class="d-flex">
                        <svg class="svg-inline--fa fa-circle fa-w-16 mt-1 fs--2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path></svg><!-- <div class="fas fa-circle mt-1 fs--2"></div> Font Awesome fontawesome.com -->
                        <p class="fs--1 ps-2 mb-0"> {{__('messages.you_have')}} <strong>{{getFactures()->where('status', "echue")->count()}} {{__('messages.invoice')}}</strong> {{__('messages.in_late_payment')}}</p>
                      </div>
                    </div>
                    <div class="col-auto d-flex align-items-center"><a class="alert-link fs--1 fw-medium" href="#!">{{__('messages.see_list')}}<svg class="svg-inline--fa fa-chevron-right fa-w-10 ms-1 fs--2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"></path></svg><!-- <i class="fas fa-chevron-right ms-1 fs--2"></i> Font Awesome fontawesome.com --></a></div>
                  </div>
                </li>
                <li class="alert mb-0 rounded-0 py-3 px-card alert-success border-top border-x-0 border-top-0">
                  <div class="row flex-between-center">
                    <div class="col">
                      <div class="d-flex">
                        <svg class="svg-inline--fa fa-circle fa-w-16 mt-1 fs--2 text-primary" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path></svg><!-- <div class="fas fa-circle mt-1 fs--2 text-primary"></div> Font Awesome fontawesome.com -->
                        <p class="fs--1 ps-2 mb-0">{{__('messages.you_have')}} <strong>{{getFactures()->where('status', "paid")->count()}} {{__('messages.invoice')}}</strong> {{__('messages.paid_succesfuly')}}</p>
                      </div>
                    </div>
                    <div class="col-auto d-flex align-items-center"><a class="alert-link fs--1 fw-medium" href="#!">{{__('messages.see_list')}}<svg class="svg-inline--fa fa-chevron-right fa-w-10 ms-1 fs--2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"></path></svg><!-- <i class="fas fa-chevron-right ms-1 fs--2"></i> Font Awesome fontawesome.com --></a></div>
                  </div>
                </li>
                <li class="alert mb-0 rounded-0 py-3 px-card bg-line-chart-gradient border-top  border-0">
                  <div class="row flex-between-center">
                    <div class="col">
                      <div class="d-flex">
                        <svg class="svg-inline--fa text-light fa-circle fa-w-16 mt-1 fs--2 text-primary" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path></svg><!-- <div class="fas fa-circle mt-1 fs--2 text-primary"></div> Font Awesome fontawesome.com -->
                        <p class="fs--1 ps-2 mb-0 text-light">{{__('messages.you_have')}} <strong>{{getFactures()->where('status', "partial")->count()}} {{__('messages.invoice')}} </strong> {{__('messages.partialy_paid')}} </p>
                      </div>
                    </div>
                    <div class="col-auto d-flex align-items-center"><a class="alert-link fs--1 fw-medium  text-light" href="#!">{{__('messages.see_list')}}<svg class="svg-inline--fa fa-chevron-right fa-w-10 ms-1 fs--2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"></path></svg><!-- <i class="fas fa-chevron-right ms-1 fs--2"></i> Font Awesome fontawesome.com --></a></div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="row g-3">
            <div class="col-md-6">
                <div class="card product-share-doughnut-width">
                    <div class="card-header pb-0">
                        <h6 class="mb-0 mt-2 d-flex align-items-center">{{__('messages.clients')}}</h6>
                    </div>
                    <div class="card-body">
                      <div class="d-flex justify-content-between">
                        <div class="d-flex flex-column justify-content-between">
                          <p class="font-sans-serif lh-1 mb-1 fs-5">{{getClients()->count()}}</p>
                        </div>
                        <div>
                            <img src="{{asset('assets/icons/customer.png')}}" height="50" alt="">
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card product-share-doughnut-width">
                    <div class="card-header pb-0">
                        <h6 class="mb-0 mt-2 d-flex align-items-center">{{__('messages.vendors')}}</h6>
                    </div>
                    <div class="card-body">
                      <div class="d-flex justify-content-between">
                        <div class="d-flex flex-column justify-content-between">
                          <p class="font-sans-serif lh-1 mb-1 fs-5">{{getFournisseurs()->count()}}</p>
                        </div>
                        <div>
                            <img src="{{asset('assets/icons/vendors.png')}}" height="50" alt="">
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card product-share-doughnut-width">
                    <div class="card-header pb-0">
                        <h6 class="mb-0 mt-2 d-flex align-items-center">{{__('messages.employers')}}</h6>
                    </div>
                    <div class="card-body">
                      <div class="d-flex justify-content-between">
                        <div class="d-flex flex-column justify-content-between">
                          <p class="font-sans-serif lh-1 mb-1 fs-5">{{getEmployes()->count()}}</p>
                        </div>
                        <div>
                            <img src="{{asset('assets/icons/employers.png')}}" height="50" alt="">
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card product-share-doughnut-width">
                    <div class="card-header pb-0">
                      <h6 class="mb-0 mt-2 d-flex align-items-center">{{__('messages.products_services')}}</h6>
                    </div>
                    <div class="card-body">
                      <div class="d-flex justify-content-between">
                        <div class="d-flex flex-column justify-content-between">
                          <p class="font-sans-serif lh-1 mb-1 fs-5">{{getArticles()->count()}}</p>
                        </div>
                        <div>
                            <img src="{{asset('assets/icons/products.png')}}" height="50" alt="">
                        </div>
                      </div>
                    </div>
                </div>
            </div>

          </div>
        </div>
      </div>
    </div>
    <div class="col-xxl-6 col-xl-12">
      <div class="card py-3 mb-3">
        <div class="card-body py-3">
          <div class="row g-0">
            <div class="col-6 col-md-4 border-200 border-bottom border-end pb-4">
                <h6 class="pb-1 text-700">{{__('messages.invoice_to_pay')}} </h6>
                <p class="font-sans-serif lh-1 mb-1 fs-2">{{$Depenses->where('type', "facture")->count()}}</p>
              <div class="d-flex align-items-center">
                <h6 class="fs--1 text-500 mb-0">{!! formatpriceth($Depenses->where('type', "facture")->sum('total'), getCurrency()) !!}</h6>
                <h6 class="fs--2 ps-3 mb-0 text-info"><svg class="svg-inline--fa fa-caret-up fa-w-10 me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-up" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M288.662 352H31.338c-17.818 0-26.741-21.543-14.142-34.142l128.662-128.662c7.81-7.81 20.474-7.81 28.284 0l128.662 128.662c12.6 12.599 3.676 34.142-14.142 34.142z"></path></svg><!-- <span class="me-1 fas fa-caret-up"></span> Font Awesome fontawesome.com --> +{{$DFactureC}} {{__('messages.today')}}</h6>
              </div>
            </div>
            <div class="col-6 col-md-4 border-200 border-md-200 border-bottom border-md-end pb-4 ps-3">
                <h6 class="pb-1 text-700">{{__('messages.expenses')}}</h6>
                <p class="font-sans-serif lh-1 mb-1 fs-2">{{$Depenses->where('type', "depense")->count()}}</p>
              <div class="d-flex align-items-center">
                <h6 class="fs--1 text-500 mb-0">{!! formatpriceth($Depenses->where('type', "depense")->sum('total'), getCurrency()) !!}</h6>
                <h6 class="fs--2 ps-3 mb-0 text-info"><svg class="svg-inline--fa fa-caret-up fa-w-10 me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-up" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M288.662 352H31.338c-17.818 0-26.741-21.543-14.142-34.142l128.662-128.662c7.81-7.81 20.474-7.81 28.284 0l128.662 128.662c12.6 12.599 3.676 34.142-14.142 34.142z"></path></svg><!-- <span class="me-1 fas fa-caret-up"></span> Font Awesome fontawesome.com -->+{{$DDepenseC}} {{__('messages.today')}}</h6>
              </div>
            </div>
            <div class="col-6 col-md-4 border-200 border-bottom border-end border-md-end-0 pb-4 pt-4 pt-md-0 ps-md-3">
                <h6 class="pb-1 text-700">{{__('messages.check')}} </h6>
                <p class="font-sans-serif lh-1 mb-1 fs-2">{{$Depenses->where('type', "cheque")->count()}}</p>
              <div class="d-flex align-items-center">
                <h6 class="fs--1 text-500 mb-0">{!! formatpriceth($Depenses->where('type', "cheque")->sum('total'), getCurrency()) !!}</h6>
                <h6 class="fs--2 ps-3 mb-0 text-info"><svg class="svg-inline--fa fa-caret-up fa-w-10 me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-up" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M288.662 352H31.338c-17.818 0-26.741-21.543-14.142-34.142l128.662-128.662c7.81-7.81 20.474-7.81 28.284 0l128.662 128.662c12.6 12.599 3.676 34.142-14.142 34.142z"></path></svg><!-- <span class="me-1 fas fa-caret-up"></span> Font Awesome fontawesome.com -->+{{$DChequeC}} {{__('messages.today')}}</h6>
              </div>
            </div>
            <div class="col-6 col-md-4 border-200 border-md-200 border-bottom border-md-bottom-0 border-md-end pt-4 pb-md-0 ps-3 ps-md-0">
                <h6 class="pb-1 text-700">{{__('messages.vendors_credit')}}</h6>
                <p class="font-sans-serif lh-1 mb-1 fs-2">{{$Depenses->where('type', "credit")->count()}}</p>
              <div class="d-flex align-items-center">
                <h6 class="fs--1 text-500 mb-0">{!! formatpriceth($Depenses->where('type', "credit")->sum('total'), getCurrency()) !!} </h6>
                <h6 class="fs--2 ps-3 mb-0 text-info">
                    <svg class="svg-inline--fa fa-caret-up fa-w-10 me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-up" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M288.662 352H31.338c-17.818 0-26.741-21.543-14.142-34.142l128.662-128.662c7.81-7.81 20.474-7.81 28.284 0l128.662 128.662c12.6 12.599 3.676 34.142-14.142 34.142z"></path></svg><!-- <span class="me-1 fas fa-caret-up"></span> Font Awesome fontawesome.com -->+{{$DCreditC}} {{__('messages.today')}}</h6>
              </div>
            </div>
            <div class="col-6 col-md-4 border-200 border-md-bottom-0 border-end pt-4 pb-md-0 ps-md-3">
                <h6 class="pb-1 text-700">{{__('messages.invoices')}} </h6>
                <p class="font-sans-serif lh-1 mb-1 fs-2">{{getFactures()->where('type', "facture")->count()}}</p>
              <div class="d-flex align-items-center">
                <h6 class="fs--1 text-500 mb-0">{!! formatpriceth(getFactures()->where('type', "facture")->sum('total'), getCurrency()) !!}</h6>
                <h6 class="fs--2 ps-3 mb-0 text-info"><svg class="svg-inline--fa fa-caret-up fa-w-10 me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-up" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M288.662 352H31.338c-17.818 0-26.741-21.543-14.142-34.142l128.662-128.662c7.81-7.81 20.474-7.81 28.284 0l128.662 128.662c12.6 12.599 3.676 34.142-14.142 34.142z"></path></svg><!-- <span class="me-1 fas fa-caret-up"></span> Font Awesome fontawesome.com -->+{{$FactureC}} {{__('messages.today')}}</h6>
              </div>
            </div>
            <div class="col-6 col-md-4 pb-0 pt-4 ps-3">
                <h6 class="pb-1 text-700">{{__('messages.receipt')}} </h6>
                <p class="font-sans-serif lh-1 mb-1 fs-2">{{getFactures()->where('type', "recu")->count()}} </p>
              <div class="d-flex align-items-center">
                <h6 class="fs--1 text-500 mb-0">{!! formatpriceth(getFactures()->where('type', "recu")->sum('total'), getCurrency()) !!} </h6>
                <h6 class="fs--2 ps-3 mb-0 text-info"><svg class="svg-inline--fa fa-caret-up fa-w-10 me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-up" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M288.662 352H31.338c-17.818 0-26.741-21.543-14.142-34.142l128.662-128.662c7.81-7.81 20.474-7.81 28.284 0l128.662 128.662c12.6 12.599 3.676 34.142-14.142 34.142z"></path></svg><!-- <span class="me-1 fas fa-caret-up"></span> Font Awesome fontawesome.com -->+{{$RecuC}} {{__('messages.today')}}</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card">

        <div class="card-header">
          <div class="row flex-between-center g-0">
            <div class="col-auto">
                <h6 class="mb-0">{{__('messages.diagrams_evolution_incomes_expenses')}}</h6>
            </div>

          </div>
        </div>
        <div id="chartContainer" style="height: 370px; width: 100%;"></div>

      </div>
    </div>
  </div>

@endsection



@section('scripts')
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
@endsection
