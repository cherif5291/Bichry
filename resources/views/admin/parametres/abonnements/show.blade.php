@extends('layouts.admin.admin')

@section('styles')
@include('layouts.admin.required.extensions.styles.datatable')
@endsection

@section('content')

@include('layouts.admin.required.includes.messages')

<div class="card mb-3">
    <div class="card-header position-relative  mb-7" style="height: 120px !important">
        <div class="bg-holder rounded-3 rounded-bottom-0" style="background-image:url('{{asset('assets/admin/img/generic/bg-2.jpg')}}');">
        </div>
        <!--/.bg-holder-->

        <div class="avatar avatar-5xl avatar-profile"><img class="rounded-circle img-thumbnail shadow-sm" src="{{asset($Entreprise->logo?? 'assets/no-image.jpg')}}" width="200" alt="" /></div>
    </div>

    <div class="card-body">
      <div class="row">
        <div class="col-lg-8">
          <h4 class="mb-1">{{$Entreprise->entreprise}}<span data-bs-toggle="tooltip" data-bs-placement="right" title="Verified"><small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small></span>
          </h4>
          <h5 class="fs-0 fw-normal">{{__('messages.represented_by')}}: {{$Entreprise->prenom}} {{$Entreprise->nom}} | {{$Entreprise->titre}}</h5>
          <p class="text-500">{{$Entreprise->adresse}}, {{$Entreprise->ville}}, {{$Entreprise->pays}}</p>

          <a class="btn btn-info btn-sm px-3 ms-2" href="{{route('entreprise.client.edit', $Entreprise->id)}}">{{__('messages.edit')}}</a>
           
          <a class="btn btn-dark btn-sm px-3" type="button">{{__('messages.disable')}}</a>

          {{-- <a class="btn btn-danger btn-sm px-3" type="button">{{__('messages.delete')}}</a> --}}
          
          <a href="{{route('entreprise.clients' )}}" class="btn btn-sm btn-danger text-light" >{{__('messages.back')}}</a>


          <div class="border-dashed-bottom my-4 d-lg-none"></div>
        </div>
        <div class="col ps-2 ps-lg-3">

            <div class="flex-1 m-3">
              <h6 class="mb-0">
                  <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M15.05 5A5 5 0 0 1 19 8.95M15.05 1A9 9 0 0 1 23 8.94m-1 7.98v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                  {{$Entreprise->telephone}}
                </h6>
            </div>
            <div class="flex-1 m-3">
              <h6 class="mb-0">
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                  {{$Entreprise->email}}
                </h6>
            </div>
            <div class="flex-1 m-3">
              <h6 class="mb-0">
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
                  {{$Entreprise->website}}
                </h6>
            </div>
          </div>
      </div>
    </div>
  </div>
  <div class="row g-0">
    <div class="col-lg-6 pe-lg-2">
      <div class="card mb-3">
       

       
                <div class="card h-100" id="table" data-list="{&quot;valueNames&quot;:[&quot;path&quot;,&quot;views&quot;,&quot;time&quot;,&quot;exitRate&quot;],&quot;page&quot;:8,&quot;pagination&quot;:true,&quot;fallback&quot;:&quot;pages-table-fallback&quot;}">
                    <div class="card-header">
                    <div class="row flex-between-center">
                        <div class="col-auto col-sm-6 col-lg-7">
                        <h6 class="mb-0 text-nowrap py-2 py-xl-0">Liste des paiements de cet abonnement</h6>
                        </div>
                        <div class="col-auto col-sm-6 col-lg-5">
                        <div class="h-100">
                            <form>
                            <div class="input-group">
                                <input class="form-control form-control-sm shadow-none search" type="search" placeholder="Search for a page" aria-label="search">
                                <div class="input-group-text bg-transparent"><svg class="svg-inline--fa fa-search fa-w-16 fs--1 text-600" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path></svg><!-- <span class="fa fa-search fs--1 text-600"></span> Font Awesome fontawesome.com --></div>
                            </div>
                            </form>
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="card-body px-0 py-0">
                    <div class="table-responsive scrollbar">
                        <table class="table fs--1 mb-0 overflow-hidden">
                        <thead class="bg-200 text-900">
                            <tr>
                            <th class="sort pe-1 align-middle white-space-nowrap" data-sort="path">Date du paiement</th>
                            <th class="sort pe-1 align-middle white-space-nowrap text-end" data-sort="views">Montant</th>
          
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach ($Paiements as $pay)
                                <tr class="btn-reveal-trigger">
                                <td class="align-middle white-space-nowrap path">{{$pay->created_at}}</td>
                                <td class="align-middle white-space-nowrap views text-end">{{$pay->montant}}</td>
            
                                </tr>
                            @endforeach
                          </tbody>
                        </table>
                    </div>
                    <div class="text-center d-none" id="pages-table-fallback">
                        <p class="fw-bold fs-1 mt-3">No Page found</p>
                    </div>
                    </div>
                    
                </div>
  

      </div>


    </div>
    <div class="col-lg-6 ps-lg-2">
      <div class="sticky-sidebar">
        <div class="card mb-3">
          

          <div class="card h-100" id="table" data-list="{&quot;valueNames&quot;:[&quot;path&quot;,&quot;views&quot;,&quot;time&quot;,&quot;exitRate&quot;],&quot;page&quot;:8,&quot;pagination&quot;:true,&quot;fallback&quot;:&quot;pages-table-fallback&quot;}">
            <div class="card-header">
            <div class="row flex-between-center">
                <div class="col-auto col-sm-6 col-lg-7">
                <h6 class="mb-0 text-nowrap py-2 py-xl-0">Liste des utilisateur de cette entreprise</h6>
                </div>
                <div class="col-auto col-sm-6 col-lg-5">
                <div class="h-100">
                    <form>
                    <div class="input-group">
                        <input class="form-control form-control-sm shadow-none search" type="search" placeholder="Search for a page" aria-label="search">
                        <div class="input-group-text bg-transparent"><svg class="svg-inline--fa fa-search fa-w-16 fs--1 text-600" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path></svg><!-- <span class="fa fa-search fs--1 text-600"></span> Font Awesome fontawesome.com --></div>
                    </div>
                    </form>
                </div>
                </div>
            </div>
            </div>
            <div class="card-body px-0 py-0">
            <div class="table-responsive scrollbar">
                <table class="table fs--1 mb-0 overflow-hidden">
                <thead class="bg-200 text-900">
                    <tr>
                    <th class="sort pe-1 align-middle white-space-nowrap" data-sort="path">Nom complet</th>
                    <th class="sort pe-1 align-middle white-space-nowrap text-end" data-sort="views">Email/Telephone</th>
                    <th class="sort pe-card align-middle white-space-nowrap text-end" data-sort="exitRate">Action</th>
                    </tr>
                </thead>
                <tbody class="list">
                    @foreach ($Users as $user)
                    <tr class="btn-reveal-trigger">
                        <td class="align-middle white-space-nowrap path"><a class="text-primary fw-semi-bold" href="#!">{{$user->prenom}} {{$user->nom}}</a></td>
                        <td class="align-middle white-space-nowrap views text-end">email: {{$user->email}} <br> Telephone: {{$user->telephone}} </td>
                        <td class="align-middle text-end exitRate text-end pe-card"><a href="{{route('admin.parametres.utilisateurs.edit', $user->id)}}">Modifier</a></td>
                        </tr>
                    @endforeach
                   
                </tbody>
                </table>
            </div>
            <div class="text-center d-none" id="pages-table-fallback">
                <p class="fw-bold fs-1 mt-3">No Page found</p>
            </div>
            </div>
           
        </div>
        </div>

      </div>
    </div>
  </div>

@endsection

