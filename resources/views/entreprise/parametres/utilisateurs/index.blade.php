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
@include('layouts.admin.required.includes.pageName')

  <div class="row g-0">
    <div class="col-lg-4 pe-lg-2">
      <div class="card mb-3">
        <div class="card-header bg-light">
          <h5 class="mb-0">{{__('messages.list_of_roles')}}</h5>
        </div>

        <div class="card-body">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item"><a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#tab-home" role="tab" aria-controls="tab-home" aria-selected="true">{{__('messages.add_by_employer')}}</a></li>
                <li class="nav-item"><a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#tab-profile" role="tab" aria-controls="tab-profile" aria-selected="false">{{__('messages.invite_person')}}</a></li>
              </ul>
              <div class="tab-content border-x border-bottom p-3" id="myTabContent">
                <div class="tab-pane fade show active" id="tab-home" role="tabpanel" aria-labelledby="home-tab">
                    <form action="{{route('entreprise.user.createEntrepriseEmployeUser')}}" class="row g-3 needs-validation" novalidate="" method="POST"> @csrf


                        <div class="col-md-4-12">
                            <label class="form-label" for="employes_entreprise_id">{{__('messages.chose_an_employer')}}</label>
                            <select class="form-select js-choice" name="employes_entreprise_id" id="employes_entreprise_id" size="1" data-options='{"removeItemButton":true,"placeholder":true}'>
                                <option selected disabled>{{__('messages.chose')}}</option>
                                @foreach ($Employes as $employe)
                                <option value="{{$employe->id}}">{{$employe->prenom}} {{$employe->nom}}</option>
                                @endforeach
                              </select>
                        </div>


                        <div class="col-md-4-12">
                            <label class="form-label" for="habilitation_id">{{__('messages.chose_role')}}.</label>
                            <select class="form-select" name="habilitation_id" id="habilitation_id" size="1" >
                                <option selected disabled>Choisir</option>
                                @foreach ($Habilitations->where('entreprise_id', 0) as $habilDefaut)
                                <option value="{{$habilDefaut->id}}">{{$habilDefaut->habilitation}}</option>
                                @endforeach
                                @foreach ($Habilitations->where('entreprise_id', Auth::user()->entreprise_id) as $habilEntreprise)
                                <option value="{{$habilEntreprise->id}}">{{$habilEntreprise->habilitation}}</option>
                                @endforeach
                              </select>
                        </div>

                        <div class="col-md-4-12" hidden>
                            <input class="form-control" name="entreprise_id" value="{{Auth::user()->entreprise_id}}" id="entreprise_id" type="text"  required="" />
                        </div>

                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">{{__('messages.save')}}</button>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="tab-profile" role="tabpanel" aria-labelledby="profile-tab">
                    <form action="{{route('entreprise.user.createEntrepriseInvitationUser')}}" class="row g-3 needs-validation" novalidate="" method="POST"> @csrf
                        <div class="col-md-4-12">
                            <label class="form-label" for="prenom">{{__('messages.first_name')}}</label>
                            <input class="form-control" name="prenom" id="prenom" type="text"  required="" />
                        </div>

                        <div class="col-md-4-12">
                            <label class="form-label" for="nom">{{__('messages.last_name')}}</label>
                            <input class="form-control" name="nom" id="nom" type="text"  required="" />
                        </div>

                        <div class="col-md-4-12">
                            <label class="form-label" for="email">{{__('messages.email')}}</label>
                            <input class="form-control" name="email" id="email" type="email"  required="" />
                        </div>

                        <div class="col-md-4-12" hidden>
                            <input class="form-control" name="entreprise_id" value="{{Auth::user()->entreprise_id}}" id="entreprise_id" type="text"  required="" />
                        </div>
                        <div class="col-md-4-12">
                            <label class="form-label" for="habilitation_id">{{__('messages.chose_role')}}</label>
                            <select class="form-select" name="habilitation_id" id="habilitation_id" size="1" >
                                <option selected disabled>Choisir</option>
                                @foreach ($Habilitations->where('entreprise_id', 0) as $habilDefaut)
                                <option value="{{$habilDefaut->id}}">{{$habilDefaut->habilitation}}</option>
                                @endforeach
                                @foreach ($Habilitations->where('entreprise_id', Auth::user()->entreprise_id) as $habilEntreprise)
                                <option value="{{$habilEntreprise->id}}">{{$habilEntreprise->habilitation}}</option>
                                @endforeach
                              </select>
                        </div>

                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">{{__('messages.save')}}</button>
                        </div>

                    </form>
                </div>
              </div>



        </div>
      </div>


    </div>
    <div class="col-lg-8 ps-lg-2">
      <div class="sticky-sidebar">
        <div class="card mb-3">
          <div class="card-header bg-light">
            <h5 class="mb-0">{{__('messages.user_company_list')}}</h5>
          </div>
          <div class="card-body bg-light text-center">
            <table class="table fs--1 mb-0 overflow-hidden">
                <thead class="bg-100 text-800">
                  <tr>
                    <th class="w-100 text-start ">{{__('messages.user_info')}}</th>
                    <th class="text-nowrap text-end ">{{__('messages.is_employer')}}</th>
                    <th class="text-nowrap text-end ">{{__('messages.role')}}</th>
                    <th class="text-nowrap text-end ">{{__('messages.created')}}</th>
                    <th class="text-nowrap text-end ">{{__('messages.action')}}</th>


                  </tr>
                </thead>
                <tbody>

                    @foreach ($Users as $user)
                    <tr>
                        <td class="text-truncate text-start ">{{$user->prenom}} {{$user->prenom}} <br>
                            <strong>{{$user->email}}</strong>
                        </td>
                        <td class="text-truncate">{{__('messages.yes')}}</td>
                        <td class="text-truncate">{{$user->habilitation->habilitation}}</td>
                        <td class="text-truncate">{{$user->created_at->format('d-m-Y')}}</td>


                        @if ($user->is_responsable == "yes")
                        <td class="text-truncate text-start">
                            <a class=" " style="margin: 0px !important" data-bs-toggle="tooltip" data-bs-placement="top" title="Vous ne pouvez pas modifier les habilitation du compte responsable">
                                <i class="fas fa-pen-square " style="font-size: 1.4em; "></i>
                            </a>

                            <a class=" " style="margin: 0px !important" data-bs-toggle="tooltip" data-bs-placement="top" title="Vous ne pouvez pas supprimer le compte responsable">
                                <i class="far fa-trash-alt text-danger" style="font-size: 1.4em"></i>
                            </a>

                        </td>
                        @elseif ($user->id == Auth::user()->id)
                        <td class="text-truncate text-start">
                            <a class="" style="margin: 0px !important" data-bs-toggle="tooltip" data-bs-placement="top" title="Vous ne pouvez pas modifier les habilitation système par défaut">
                                <i class="fas fa-pen-square " style="font-size: 1.4em; "></i>
                            </a>

                            <a class="" style="margin: 0px !important" data-bs-toggle="tooltip" data-bs-placement="top" title="Vous ne pouvez pas supprimer votre propre compte">
                                <i class="far fa-trash-alt text-danger" style="font-size: 1.4em"></i>
                            </a>

                        </td>
                        @else
                        <td class="text-truncate text-start">
                            <a href="{{route('entreprise.utilisateur.editUserEntreprise',$user->id )}}"> <i class="fas fa-pen-square " style="font-size: 1.4em; margin-right:5px"></i></a>
                            {{-- @if (Auth::user()->is_responsable == "yes")
                                <a href="{{route('entreprise.utilisateur.delete',$user->id )}}"> <i class="far fa-trash-alt text-danger" style="font-size: 1.4em"></i></a>
                            @endif --}}
                        </td>
                        @endif

                      </tr>

                    @endforeach

                </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection



