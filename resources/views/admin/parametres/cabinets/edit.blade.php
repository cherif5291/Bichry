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
            <div class="tab-pane fade show active" id="tab-utilisateurs" role="tabpanel" aria-labelledby="tab-utilisateurs">
                <div class="row g-0">
                    <div class="col-lg-4 pe-lg-2">
                      <div class="card mb-3">
                        <div class="card-header bg-light">
                          <h5 class="mb-0">Modification utilisateur</h5>
                        </div>

                        <div class="card-body">
                           <form action="{{route('admin.parametres.packages.add')}}" class="row g-3 needs-validation" novalidate="" method="POST" enctype="multipart/form-data"> @csrf
                            <small class="text-danger">Le mot passe de reinitialisation par défaut généré par le système est: <code>@Bilanpro</code></small>
                            <div class="col-md-4-12">
                                <label class="form-label" for="prenom">Prénom</label>
                                <input class="form-control" name="prenom" value="{{ $user->prenom }}" id="prenom" type="text"  required="" />
                            </div>

                            <div class="col-md-4-12">
                                <label class="form-label" for="nom">Nom</label>
                                <input class="form-control" name="nom" value="{{ $user->nom }}" id="nom" type="text"  required="" />
                            </div>
                            <div class="col-md-12">
                                <label class="form-label" for="email">Email</label>
                                <input class="form-control" name="email" id="email" value="{{ $user->email }}" type="email"  required="" />
                            </div>


                            <div class="ml-5 col-md-12 form-check form-switch">
                                <input class="form-check-input   bg- " value="1" name="fournisseurs" id="fffdd" type="checkbox">
                                <label class="form-check-label" for="fffdd">Reinitialiser mot de passe</label>
                            </div>



                            <div class="col-12">
                                <button class="btn btn-success w-100" type="submit">Modifier</button>
                            </div>
                        </form>

                        </div>
                      </div>


                    </div>
                    <div class="col-lg-8 ps-lg-2">
                      <div class="sticky-sidebar">
                        <div class="card mb-3">
                          <div class="card-header bg-light">
                            <h5 class="mb-0">Liste des utilisateurs admin</h5>
                          </div>
                          <div class="card-body bg-light">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Prénom</th>
                                        <th>Nom</th>
                                        <th>Email</th>
                                        <th >Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Users as $user)
                                    <tr>

                                        <td>{{$user->prenom}}</td>

                                        <td>{{$user->nom}}</td>
                                        <td>{{$user->email}}</td>

                                        <td>
                                            <div class="btn-group">
                                                <button class="btn dropdown-toggle mb-2 btn-primary" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Option
                                                </button>
                                                <div class="dropdown-menu">
                                                  <a class="dropdown-item" href="{{route('admin.parametres.utilisateurs.edit', $user->id)}}">Modifier</a>
                                                  <div class="dropdown-divider"></div>
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
