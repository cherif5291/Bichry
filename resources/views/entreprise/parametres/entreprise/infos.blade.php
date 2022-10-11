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
          <h4 class="mb-1">{{$Entreprise->nom_entreprise}}<span data-bs-toggle="tooltip" data-bs-placement="right" title="Verified"><small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small></span>
          </h4>
          <p class="text-500">{{$Entreprise->adresse}}, {{$Entreprise->ville}}, {{$Entreprise->pays}}</p>
          {{-- <a class="btn btn-success btn-sm px-3 ms-2" type="button">Ajouter Dépenses</a> --}}

          <a class="btn btn-info btn-sm px-3 ms-2" href="{{route('entreprise.client.edit', $Entreprise->id)}}">Modifier</a>
          <a class="btn btn-dark btn-sm px-3" type="button">Désactiver</a>

            <a class="btn btn-danger btn-sm px-3" type="button">Supprimer</a>
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
    <div class="col-lg-12 pe-lg-2">
      <div class="card mb-3">
        <div class="card-header bg-light">
          <h5 class="mb-0">Infos Entrepris</h5>
        </div>

        <div class=" card-body m-1">
            <form action="{{route('entreprise.infos.change')}}" class="row g-3 needs-validation" novalidate="" method="POST" enctype="multipart/form-data"> @csrf
                <div class="col-md-4">
                    <label class="form-label" for="nom_entreprise">Nom de l'entreprise</label>
                    <input class="form-control" name="nom_entreprise" id="nom_entreprise" type="text" value="{{$Entreprise->nom_entreprise}}" required="" />
                </div>


                <div class="col-md-4">
                    <label class="form-label" for="email">Email</label>
                    <input class="form-control" name="email" id="email" type="text" value="{{$Entreprise->email}}"/>
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="nom_entreprise">Logo</label>
                    <input class="form-control" name="logo" id="nom_entreprise" type="file"  />
                </div>
                <div class="col-md-12">
                    <label class="form-label" for="a_propos">A propos</label>
                    <textarea name="a_propos" class="form-control" id="" cols="30" rows="10">{{$Entreprise->a_propos}}</textarea>
                </div>



                <div class="col-md-4">
                    <label class="form-label" for="telephone">Téléphone</label>
                    <input class="form-control" name="telephone" id="telephone" type="text" value="{{$Entreprise->telephone}}" required="" />
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="portable">Portable</label>
                    <input class="form-control" name="portable" id="portable" type="text" value="{{$Entreprise->portable}}" required="" />
                </div>



                <div class="col-md-4">
                    <label class="form-label" for="website">Site web</label>
                    <input class="form-control" name="website" id="website" type="text" value="{{$Entreprise->website}}"/>
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="adresse">Adresse</label>
                    <input class="form-control" name="adresse" id="adresse" type="text" value="{{$Entreprise->adresse}}"/>
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="ville">ville</label>
                    <input class="form-control" id="ville" name="ville" type="text" value="{{$Entreprise->ville}}"/>
                </div>

                <div class="col-md-3">
                    <label class="form-label" for="province">Province</label>
                    <input class="form-control" name="province" id="province" type="text" value="{{$Entreprise->province}}"/>
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="code_postale">Code Postal</label>
                    <input class="form-control" name="code_postale" id="code_postale" type="text" value="{{$Entreprise->code_postale}}"/>
                </div>


                <div class="col-md-3">
                    <label class="form-label" for="pays">Pays</label>
                    <select class="form-select" name="pays" id="pays" required="">
                        <option value="Sénégal">Sénégal</option>
                        <option value="Canada">Canada</option>

                    </select>
                    <div class="invalid-feedback">Vous devez choisir un pays</div>
                </div>

                <div class="col-md-3">
                    <label class="form-label" for="devises_monetaire_id">Devise monétaire</label>
                    <select class="form-select" name="devises_monetaire_id" id="devises_monetaire_id" required="">
                        <option selected="" disabled="" value="">Choisir</option>
                        @foreach ($DevisesMonetaires as $devise)
                        <option  @if ($Entreprise->devises_monetaire_id === $devise->id) selected  @endif value="{{$devise->id}}">{{$devise->nom}} {{$devise->sigle}}</option>
                    @endforeach

                    </select>
                    <div class="invalid-feedback">Vous devez choisir une devise pour ce client</div>
                </div>




                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Mettre à jour</button>
                </div>
            </form>
        </div>
      </div>


    </div>
    {{-- <div class="col-lg-4 ps-lg-2">
      <div class="sticky-sidebar">
        <div class="card mb-3">
          <div class="card-header bg-light">
            <h5 class="mb-0">Autres paramètres de sécurité</h5>
          </div>

        </div>

      </div>
    </div> --}}
  </div>

@endsection

