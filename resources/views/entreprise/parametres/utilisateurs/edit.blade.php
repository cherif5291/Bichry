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
          <h5 class="mb-0">{{__('messages.edit_user')}}: <strong>{{$User->prenom}} {{$User->nom}}</strong></h5>
        </div>

        <div class="card-body">
              <form action="{{route('entreprise.utilisateur.updateUserEntreprise', $User->id)}}" class="row g-3 needs-validation" novalidate="" method="POST"> @csrf
                <div class="col-md-4-12">
                    <label class="form-label" for="email">{{__('messages.email')}}</label>
                    <input class="form-control" name="email" id="email" value="{{$User->email}}" type="email"  required="" />
                </div>


                <div class="col-md-4-12">
                    <label class="form-label" for="habilitation_id">{{__('messages.chose_role')}}</label>
                    <select class="form-select" name="habilitation_id" id="habilitation_id" size="1" >
                        <option disabled>{{__('messages.chose')}}</option>
                        @foreach ($Habilitations->where('entreprise_id', 0) as $habilDefaut)
                        <option @if ($habilDefaut->id == $User->habilitation_id) selected @endif value="{{$habilDefaut->id}}">{{$habilDefaut->habilitation}}</option>
                        @endforeach
                        @foreach ($Habilitations->where('entreprise_id', Auth::user()->entreprise_id) as $habilEntreprise)
                        <option @if ($habilDefaut->id == $User->habilitation_id) selected @endif value="{{$habilEntreprise->id}}">{{$habilEntreprise->habilitation}}</option>
                        @endforeach
                        </select>
                </div>

                <div class="col-md-12" hidden>
                    <input class="form-control" name="entreprise_id" value="{{Auth::user()->entreprise_id}}" id="entreprise_id" type="text"  required="" />
                </div>
                <div class="col-md-12">
                    <small class="text-warning">{{__('messages.click_to_reset_password')}}. <br> {{__('messages.default_password_tips')}} <strong>@Bilanpro</strong></small>
                    <div class="form-check form-switch">
                        <label class="form-check-label " for="resetpass">{{__('messages.reset_password')}}</label>
                        <input class="form-check-input" value="1" name="resetpass" id="resetpass" type="checkbox"/>
                    </div>
                </div>


                <div class="col-12 d-flex justify-content-end">
                    <button class="btn btn-primary " type="submit" style=" margin-right: 2em !important">{{__('messages.update')}}</button>
                    <a href="{{route('entreprise.utilisateurs')}}" class="btn btn-danger">{{__('messages.cancel')}}</a>
                </div>
            </form>
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
                        <td class="text-truncate">oui</td>
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
                            <a href="{{route('entreprise.habilitation.details',$user->id )}}"> <i class="fas fa-pen-square " style="font-size: 1.4em; margin-right:5px"></i></a>
                            <a href="{{route('entreprise.habilitation.delete',$user->id )}}"> <i class="far fa-trash-alt text-danger" style="font-size: 1.4em"></i></a>
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



