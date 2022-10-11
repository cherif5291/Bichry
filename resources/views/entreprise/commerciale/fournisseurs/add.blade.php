@extends('layouts.admin.admin')

@section('styles')
@include('layouts.admin.required.extensions.styles.datatable')
@endsection

@section('content')

@include('layouts.admin.required.includes.pageName')

<div class="card mb-3">
    <div class="card-header">
        <div class="row flex-between-end">
            <div class="col-auto align-self-center">
                <h5 class="mb-0" data-anchor="data-anchor">Formulaire ffffd'ajout de fournisseur</h5>
            </div>
            <div class="col-auto ms-auto">
                <div class="nav nav-pills nav-pills-falcon flex-grow-1" role="tablist">
                    <button class="btn btn-sm active" data-bs-toggle="pill"
                        data-bs-target="#dom-f6012467-4a1f-4b44-baf9-8005e8007fac" type="button" role="tab"
                        aria-controls="dom-f6012467-4a1f-4b44-baf9-8005e8007fac" aria-selected="true"
                        id="tab-dom-f6012467-4a1f-4b44-baf9-8005e8007fac">Preview</button>
                    <button class="btn btn-sm" data-bs-toggle="pill"
                        data-bs-target="#dom-f90060ed-1efa-42b6-988e-4a569574ecf9" type="button" role="tab"
                        aria-controls="dom-f90060ed-1efa-42b6-988e-4a569574ecf9" aria-selected="false"
                        id="tab-dom-f90060ed-1efa-42b6-988e-4a569574ecf9">Code</button>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body bg-light">
        <div class="tab-content">
            <div class="tab-pane preview-tab-pane active" role="tabpanel"
                aria-labelledby="tab-dom-f6012467-4a1f-4b44-baf9-8005e8007fac"
                id="dom-f6012467-4a1f-4b44-baf9-8005e8007fac">
                <form action="{{route('entreprise.fournisseurs.new.store')}}" class="row g-3 needs-validation" novalidate="" method="POST" enctype="multipart/form-data"> @csrf
                    <div class="col-md-4">
                        <label class="form-label" for="entreprise">Nom entreprise fournisseur</label>
                        <input class="form-control" name="entreprise" id="entreprise" type="text"  required="" />
                    </div>


                    <div class="col-md-4">
                        <label class="form-label" for="prenom">Prénom du responsable</label>
                        <input class="form-control" name="prenom" id="prenom" type="text"  required="" />
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="nom">Nom du responsable</label>
                        <input class="form-control" name="nom" id="nom" type="text"  required="" />
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="titre">Titre du responsable</label>
                        <input class="form-control" name="titre" id="titre" type="text"  required="" />
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="telephone">Téléphone</label>
                        <input class="form-control" name="telephone" id="telephone" type="text"  required="" />
                    </div>


                    <div class="col-md-4">
                        <label class="form-label" for="email">Email</label>
                        <input class="form-control" name="email" id="email" type="text" />
                    </div>

                    <div class="col-md-4">
                        <label class="form-label" for="numero_compte">Numéro de compte</label>
                        <input class="form-control" name="numero_compte" id="numero_compte" type="text"  />
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="adresse">Adresse</label>
                        <input class="form-control" name="adresse" id="adresse" type="text"  >
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="ville">Ville</label>
                        <input class="form-control" id="ville" name="ville" type="text" />
                    </div>

                    <div class="col-md-3">
                        <label class="form-label" for="province">Province</label>
                        <input class="form-control" name="province" id="province" type="text" />
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="code_postal">Code Postal</label>
                        <input class="form-control" name="code_postal" id="code_postal" type="text"  />
                    </div>


                    <div class="col-md-3">
                        <label class="form-label" for="pays">Pays</label>
                        <select class="form-select" name="pays" id="pays" required="">
                            <option selected="" disabled="" value="">Chosir</option>
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
                            <option   value="{{$devise->id}}">{{$devise->nom}} {{$devise->sigle}}</option>
                        @endforeach

                        </select>
                        <div class="invalid-feedback">Vous devez choisir une devise pour cette fournisseur</div>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label" for="comptescomptable_id">Compte Comptable</label>
                        <select class="form-select" name="comptescomptable_id" id="comptescomptable_id" required="">
                            <option disabled="" value="">Choisir</option>

                        @foreach ($ComptesComptables as $ccomptable)
                            <option   value="{{$ccomptable->id}}">{{$ccomptable->nom}}</option>
                        @endforeach
                        </select>
                        <div class="invalid-feedback">Vous devez choisir un pays</div>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="paiements_modalite_id">Mode de paiement souhaité</label>
                        <select class="form-select" name="paiements_modalite_id" id="paiements_modalite_id" required="">
                            <option disabled="" value="">Choisir</option>

                        @foreach ($ModesPaiements as $pmode)
                            <option   value="{{$pmode->id}}">{{$pmode->nom}}</option>
                        @endforeach
                        </select>
                        <div class="invalid-feedback">Vous devez choisir un mode de paiement</div>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label" for="validationCustom05">Note du fournisseur</label>
                        <textarea  class="form-control" name="" id="" cols="30" rows="10"></textarea>
                    </div>

                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Ajouter</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection

