@extends('layouts.admin.admin')

@section('styles')
@include('layouts.admin.required.extensions.styles.datatable')
@endsection

@section('content')


  <div class="card mb-3">
    <div class="card-header">
      <div class="row flex-between-end">
        <div class="col-auto align-self-center">
          <h5 class="mb-0" data-anchor="data-anchor">{{$PageName??""}}</h5>
        </div>
      </div>
    </div>
    <div class="card-body bg-light">
        @include('admin.parametres.index')
          <div class="tab-content border-x border-bottom p-3" id="myTabContent">
            {{-- <div class="tab-pane fade show active" id="tab-home" role="tabpanel" aria-labelledby="home-tab">
                <form action="{{route('entreprise.client.store')}}" class="row g-3 needs-validation" novalidate="" method="POST" enctype="multipart/form-data"> @csrf
                    <div class="col-md-4">
                        <label class="form-label" for="entreprise">Nom entreprise</label>
                        <input class="form-control" name="entreprise" id="entreprise" type="text"required="" />
                    </div>

                    <div class="col-md-4">
                        <label class="form-label" for="nom_chequier">A propos</label>
                        <input class="form-control" name="nom_chequier" id="nom_chequier" type="text"  required="" />
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="nom_pro">Nom sur les facture</label>
                        <input class="form-control" id="nom_pro" name="nom_pro" type="text"  required="" />
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="prenom">Prénom du responsable</label>
                        <input class="form-control" name="prenom" id="prenom" type="text" required="" />
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="nom">Nom du responsable</label>
                        <input class="form-control" name="nom" id="nom" type="text" required="" />
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
                        <label class="form-label" for="portable">Portable</label>
                        <input class="form-control" name="portable" id="portable" type="text" required="" />
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="telecopie">Télécopie</label>
                        <input class="form-control" name="telecopie" id="telecopie" type="text" />
                    </div>

                    <div class="col-md-4">
                        <label class="form-label" for="email">Email</label>
                        <input class="form-control" name="email" id="email" type="text" />
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="website">Site web</label>
                        <input class="form-control" name="website" id="website" type="text" />
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="paiements_modalite_id">Mode de paiement souhaité</label>
                        <select class="form-select" name="paiements_modalite_id" id="paiements_modalite_id" required="">
                            <option disabled="" value="">Choisir</option>


                        </select>
                        <div class="invalid-feedback">Vous devez choisir un mode de paiement</div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="adresse">Adresse</label>
                        <input class="form-control" name="adresse" id="adresse" type="text" />
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="ville">Ville</label>
                        <input class="form-control" id="ville" name="ville" type="text" />
                    </div>

                    <div class="col-md-3">
                        <label class="form-label" for="province">Province</label>
                        <input class="form-control" name="province" id="province" type="text"/>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="code_postale">Code Postal</label>
                        <input class="form-control" name="code_postale" id="code_postale" type="text" />
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



                    <div class="col-md-12">
                        <label class="form-label" for="validationCustom05">Note du client</label>
                        <textarea  class="form-control" name="note" id="" cols="30" rows="10"></textarea>
                    </div>

                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Ajouter un nouveau client</button>
                    </div>
                </form>
            </div> --}}
            {{-- <div class="tab-pane fade" id="tab-profile" role="tabpanel" aria-labelledby="profile-tab">Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic. </div> --}}
            <div class="tab-pane fade show active" id="tab-contact" role="tabpanel" aria-labelledby="contact-tab">
                <div class="row g-0">
                    <div class="col-lg-4 pe-lg-2">
                      <div class="card mb-3">
                        <div class="card-header bg-light">
                          <h5 class="mb-0">Ajouter un package d'abonnement</h5>
                        </div>

                        <div class="card-body">
                           <form action="{{route('admin.parametres.packages.add')}}" class="row g-3 needs-validation" novalidate="" method="POST" enctype="multipart/form-data"> @csrf
                            <div class="col-md-4-12">
                                <label class="form-label" for="nom">Nom du package</label>
                                <input class="form-control" name="nom" id="nom" type="text"  required="" />
                            </div>

                            <div class="col-md-4-12">
                                <label class="form-label" for="nom">Description</label>
                                <textarea name="description"  class="form-control" id="" cols="30" rows="3"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="nom">Prix de l'abonnement</label>
                                <input class="form-control" name="prix" id="nom" type="number"  required="" />
                            </div>


                            <div class="col-md-6">
                                <label class="form-label" for="stripe_id">Stripe ID</label>
                                <input class="form-control" name="stripe_id" id="stripe_id" type="text"  required />
                            </div>

                            <div class="col-md-12">
                                <label class="form-label" for="type">Type d'abonnement</label>
                                <select class="form-select" name="type" id="type" required="">
                                    <option selected="" disabled="" value="">Choisir</option>
                                    <option value="entreprise">Entreprise</option>
                                    <option value="cabinet">Cabinet</option>
                                </select>
                                <div class="invalid-feedback">Vous devez choisir un type d'abonnement</div>
                            </div>


                            <div class="col-12">
                                <button class="btn btn-primary w-100" type="submit">Ajouter</button>
                            </div>
                        </form>

                        </div>
                      </div>


                    </div>
                    <div class="col-lg-8 ps-lg-2">
                      <div class="sticky-sidebar">
                        <div class="card mb-3">
                          <div class="card-header bg-light">
                            <h5 class="mb-0">Liste des package d'abonnement</h5>
                          </div>
                          <div class="card-body bg-light">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 50%">Nom du pack d'abonnement</th>
                                        <th>Prix</th>
                                        <th>Type</th>
                                        <th>Modules</th>
                                        <th >Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Packages as $pack)
                                    <tr>

                                        <td>{{$pack->nom}}</td>
                                        <td>{{$pack->prix}}$</td>

                                        <td>{{$pack->type}}</td>
                                        <td>{{$ModulePack->where('package_id', $pack->id)->count()}}</td>

                                        <td>
                                            <div class="btn-group">
                                                <button class="btn dropdown-toggle mb-2 btn-primary" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Option
                                                </button>
                                                <div class="dropdown-menu">
                                                  <a class="dropdown-item" href="{{route('admin.parametres.packages.edit', $pack->id)}}">Modifier</a>
                                                  <a class="dropdown-item" href="{{route('admin.parametres.packages.show', $pack->id)}}">Modules</a>
                                                  <div class="dropdown-divider"></div>
                                                  <a class="dropdown-item" href="#">Désactiver</a>
                                                  <a class="dropdown-item text-danger" href="#">Supprimer</a>

                                                </div>
                                              </div>
                                        </td>

                                    </tr>
                                    @endforeach


                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th style="width: 50%">Nom du pack d'abonnement</th>
                                        <th>Prix</th>
                                        <th>Type</th>
                                        <th>Modules</th>
                                        <th >Action</th>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>
                        </div>

                      </div>
                    </div>
                  </div>
            </div>
          </div>

    </div>
  </div>

</div>

@endsection

@section('scripts')
@include('layouts.admin.required.extensions.js.datatable')
@endsection
