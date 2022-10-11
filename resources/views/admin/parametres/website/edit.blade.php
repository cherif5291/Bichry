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
          @include('layouts.admin.required.includes.messages')
        </div>
      </div>
    </div>
    <div class="card-body bg-light">
        @include('admin.parametres.index')
          <div class="tab-content border-x border-bottom p-3" id="myTabContent">
            <div class="tab-pane fade show active" id="tab-contact" role="tabpanel" aria-labelledby="contact-tab">
                <div class="row g-0">
                    <div class="col-lg-4 pe-lg-2">
                      <div class="card mb-3">
                        <div class="card-header bg-light">
                          <h5 class="mb-0">Modifier le package d'abonnement</h5>
                        </div>

                        <div class="card-body">
                           <form action="{{route('admin.parametres.packages.update', $Package->id)}}" class="row g-3 needs-validation" novalidate="" method="POST" enctype="multipart/form-data"> @csrf
                            <div class="col-md-4-12">
                                <label class="form-label" for="nom">Nom du package</label>
                                <input class="form-control" value="{{$Package->nom}}" name="nom" id="nom" type="text"  required="" />
                            </div>

                            <div class="col-md-4-12">
                                <label class="form-label" for="nom">Description</label>
                                <textarea name="description"   class="form-control" id="" cols="30" rows="3">{{$Package->description}}</textarea>
                            </div>
                            <div class="col-md-4-12">
                                <label class="form-label" for="nom">Prix de l'abonnement</label>
                                <input class="form-control"  value="{{$Package->prix}}"  name="prix" id="nom" type="number"  required="" />
                            </div>

                            <div class="col-md-12">
                                <label class="form-label" for="type">Type d'abonnement</label>
                                <select class="form-select" name="type" id="type" required="">
                                    <option value="entreprise"  @if ($Package->type == "entreprise" ) selected @endif>Entreprise</option>
                                    <option value="cabinet"  @if ($Package->type == "cabinet" ) selected @endif>Cabinet</option>
                                </select>
                                <div class="invalid-feedback">Vous devez choisir un type d'abonnement</div>
                            </div>


                            <div class="col-12">
                                <button class="btn btn-primary w-100" type="submit">Mettre à jours</button>
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
                                        <td>{{$ModulePack->where('package_id', $pack->id)->count()}} modules</td>

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
