@extends('layouts.admin.admin')

@section('styles')

@endsection

@section('content')
@section('content')
@if (Auth::user()->role == "entreprise" OR Auth::user()->role == "admin" OR Auth::user()->role == "cabinet")
@php
$PackageEntreprise = $Abonnement->where('entreprise_id', Auth::user()->entreprise_id)->first()->package_id;
// $PackageEntreprise = $Packages::where('package_id', $AbonnementEntreprise->package_id)->first();
$ModuleEntreprise = $ModulePack->where('package_id', $PackageEntreprise);
@endphp
@endif
@include('layouts.admin.required.includes.messages')


<div class="card mb-3" id="customersTable"
    data-list="{&quot;valueNames&quot;:[&quot;name&quot;,&quot;email&quot;,&quot;phone&quot;,&quot;address&quot;,&quot;joined&quot;],&quot;page&quot;:10,&quot;pagination&quot;:true}">


                <div class="tab-content">
                  <div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-80eaf95d-9d0c-409c-afdc-ee331ded94ab" id="dom-80eaf95d-9d0c-409c-afdc-ee331ded94ab">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                      <li class="nav-item"><a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#tab-home" role="tab" aria-controls="tab-home" aria-selected="true">Demandes</a></li>
                      <li class="nav-item"><a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#tab-profile" role="tab" aria-controls="tab-profile" aria-selected="false">Documents partagés</a></li>
                    </ul>
                    <div class="tab-content border-x border-bottom p-3" id="myTabContent">
                      <div class="tab-pane fade show active" id="tab-home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="card-body overflow-hidden p-lg-6" style="height: 80vh">
                            <div class="row align-items-center">
                              <div class="col-lg-6"><img class="img-fluid" src="{{asset('assets/admin/img/nodocument.png')}}" alt=""></div>
                              <div class="col-lg-6 ps-lg-4 my-5 text-center text-lg-start">
                                  <h3 class="text-primary">Aucun contenu ici</h3>
                                  <p class="lead"> Lorsque votre comptable a besoin de votre aide, sa demande s'affiche ici.</p>
                                </div>
                            </div>

                          </div>
                      </div>
                      <div class="tab-pane fade" id="tab-profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="card-body overflow-hidden ">
                                @if (Auth::user()->role == "admin")
                                <div class="row align-items-center">
                                    <div class="col-lg-6"><img class="img-fluid" src="{{asset('assets/admin/img/icons/spot-illustrations/21.png')}}" alt=""></div>
                                    <div class="col-lg-6 ps-lg-4 my-5 text-center text-lg-start">
                                        <h3 class="text-primary">Aucun contenu ici</h3>
                                        <p class="lead"> Stockez et classez vos documents dans un espace sécurisé</p><a class="btn btn-falcon-primary" href="../documentation/getting-started.html">Ajouter un document</a>
                                      </div>
                                  </div>
                                @elseif (Auth::user()->role == "cabinet")

                                <div class="row align-items-center">
                                    <div class="col-lg-6">
                                        <ul class="nav nav-pills" id="pill-myTab" role="tablist">
                                           {{-- <div> --}}
                                            <li class="nav-item"><a class="nav-link active" id="pill-recent-tab" data-bs-toggle="tab" href="#pill-tab-recent" role="tab" aria-controls="pill-tab-recent" aria-selected="true">Récents</a></li>
                                            <li class="nav-item"><a class="nav-link" id="pill-structure-tab" data-bs-toggle="tab" href="#pill-tab-structure" role="tab" aria-controls="pill-tab-structure" aria-selected="false">Structures</a></li>
                                           {{-- </div> --}}
                                           <div style=" position: absolute !important;right: 51.3% !important;">
                                            <li class="nav-item">
                                                <div class="btn-group">
                                                    <button class="btn dropdown-toggle mb-2 btn-warning" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ajouter
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <button class="btn btn-primary dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#error-dossier">Dossier</button>
                                                        <button class="btn btn-primary dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#dossier">Un fichier</button>


                                                    </div>
                                                </div>
                                            </li>

                                           </div>
                                        </ul>

<div class="modal fade" id="error-dossier" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px">
    <div class="modal-content position-relative">
      <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
        <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-0">
        <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
          <h4 class="mb-1" id="modalExampleDemoLabel">Ajouter un dossier</h4>
        </div>
        <div class="p-4 pb-0">
          <form>
            <div class="mb-3">
              <label class="col-form-label" for="recipient-name">Nom du dossier ou type de document:</label>
              <input class="form-control" id="recipient-name" type="text" />
            </div>

          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Fermer</button>
        <button class="btn btn-primary" type="submit">Ajouter </button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="dossier" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px">
      <div class="modal-content position-relative">
        <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
          <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-0">
          <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
            <h4 class="mb-1" id="modalExampleDemoLabel">Ajouter un document</h4>
          </div>
          <div class="p-4 pb-0">
            <form>
              <div class="mb-3">
                <label class="col-form-label" for="recipient-name">Nom du document:</label>
                <input class="form-control" id="recipient-name" type="text" />
              </div>
              <div class="mb-3">
                <label class="col-form-label" for="message-text">Description:</label>
                <textarea class="form-control" name="description" id="message-text"></textarea>
              </div>
              <hr>
              <span>Vous pouvez ajouter jusqu'à trois document</span>
              <div class="mb-3">
                <label class="form-label" for="customFile">Document 1</label>
                <input class="form-control" id="customFile" name="doc1" type="file" />
              </div>
              <div class="mb-3">
                <label class="form-label" for="customFile">Document 2</label>
                <input class="form-control" id="customFile" name="doc2"  type="file" />
              </div>
              <div class="mb-3">
                <label class="form-label" for="customFile">Document 3</label>
                <input class="form-control" id="customFile" name="doc3"  type="file" />
              </div>
              <div class="form-check form-switch">
                <input class="form-check-input" id="flexSwitchCheckChecked" type="checkbox"  />
                <label class="form-check-label" for="flexSwitchCheckChecked">Visibe au cabinet comptable</label>
              </div>
            </form>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
          <button class="btn btn-primary" type="button">Understood </button>
        </div>
      </div>
    </div>
  </div>
                                        <div class="tab-content border p-3 mt-3" id="pill-myTabContent">
                                            <div class="tab-pane fade show active" id="pill-tab-recent" role="tabpanel" aria-labelledby="recent-tab">
                                                <div class="table-responsive scrollbar">
                                                    <table class="table table-hover table-striped overflow-hidden">
                                                      <thead>
                                                        <tr>
                                                          <th scope="col">Détails</th>
                                                          <th scope="col">Type</th>
                                                          <th scope="col">Date</th>
                                                          <th scope="col">Action</th>

                                                        </tr>
                                                      </thead>
                                                      <tbody>
                                                        <tr class="align-middle">
                                                          <td class="text-nowrap">
                                                            <div class="d-flex align-items-center">
                                                              <div class="avatar avatar-xl">
                                                                <img class="rounded-circle" src="../../assets/img/team/4.jpg" alt="" />
                                                              </div>
                                                              <div class="ms-2">Ricky Antony</div>
                                                            </div>
                                                          </td>
                                                          <td class="text-nowrap">ricky@example.com</td>
                                                          <td class="text-nowrap">(201) 200-1851</td>
                                                          <td class="text-nowrap">2392 Main Avenue, Penasauka</td>

                                                        </tr>

                                                      </tbody>
                                                    </table>
                                                  </div>
                                            </div>
                                            <div class="tab-pane fade" id="pill-tab-structure" role="tabpanel" aria-labelledby="structure-tab">
                                                <ul class="treeview" id="treeviewExample">
                                                    <li class="treeview-list-item">
                                                      <a data-bs-toggle="collapse" href="#treeviewExample-1-1" role="button" aria-expanded="false">
                                                        <p class="treeview-text">
                                                          public
                                                        </p>
                                                      </a>
                                                      <ul class="collapse treeview-list" id="treeviewExample-1-1" data-show="false">
                                                        <li class="treeview-list-item">
                                                          <a data-bs-toggle="collapse" href="#treeviewExample-2-1" role="button" aria-expanded="false">
                                                            <p class="treeview-text">
                                                              assets
                                                            </p>
                                                          </a>
                                                          <ul class="collapse treeview-list" id="treeviewExample-2-1" data-show="false">
                                                            <li class="treeview-list-item">
                                                              <a data-bs-toggle="collapse" href="#treeviewExample-3-1" role="button" aria-expanded="false">
                                                                <p class="treeview-text">
                                                                  image
                                                                </p>
                                                              </a>
                                                              <ul class="collapse treeview-list" id="treeviewExample-3-1" data-show="true">
                                                                <li class="treeview-list-item">
                                                                  <div class="treeview-item">
                                                                    <a class="flex-1" href="#!">
                                                                      <p class="treeview-text">
                                                                        <span class="me-2 fas fa-image text-success"></span>
                                                                        falcon.png
                                                                      </p>
                                                                    </a>
                                                                  </div>
                                                                </li>
                                                                <li class="treeview-list-item">
                                                                  <div class="treeview-item">
                                                                    <a class="flex-1" href="#!">
                                                                      <p class="treeview-text">
                                                                        <span class="me-2 fas fa-image text-success"></span>
                                                                        generic.png
                                                                      </p>
                                                                    </a>
                                                                  </div>
                                                                </li>
                                                                <li class="treeview-list-item">
                                                                  <div class="treeview-item">
                                                                    <a class="flex-1" href="#!">
                                                                      <p class="treeview-text">
                                                                        <span class="me-2 fas fa-sun text-warning"></span>
                                                                        shield.svg
                                                                      </p>
                                                                    </a>
                                                                  </div>
                                                                </li>
                                                              </ul>
                                                            </li>
                                                            <li class="treeview-list-item">
                                                              <a data-bs-toggle="collapse" href="#treeviewExample-3-2" role="button" aria-expanded="false">
                                                                <p class="treeview-text">
                                                                  video<span class="badge rounded-pill badge-soft-primary ms-2">3</span>
                                                                </p>
                                                              </a>
                                                              <ul class="collapse treeview-list" id="treeviewExample-3-2" data-show="true">
                                                                <li class="treeview-list-item">
                                                                  <div class="treeview-item">
                                                                    <a class="flex-1" href="#!">
                                                                      <p class="treeview-text">
                                                                        <span class="me-2 fas fa-play text-danger"></span>
                                                                        beach.mp4
                                                                      </p>
                                                                    </a>
                                                                  </div>
                                                                </li>
                                                                <li class="treeview-list-item">
                                                                  <div class="treeview-item">
                                                                    <a class="flex-1" href="#!">
                                                                      <p class="treeview-text">
                                                                        <span class="me-2 fas fa-play text-danger"></span>
                                                                        background.map
                                                                      </p>
                                                                    </a>
                                                                  </div>
                                                                </li>
                                                              </ul>
                                                            </li>
                                                            <li class="treeview-list-item">
                                                              <a data-bs-toggle="collapse" href="#treeviewExample-3-3" role="button" aria-expanded="false">
                                                                <p class="treeview-text">
                                                                  js<span class="badge rounded-pill badge-soft-primary ms-2">2</span>
                                                                </p>
                                                              </a>
                                                              <ul class="collapse treeview-list" id="treeviewExample-3-3" data-show="false">
                                                                <li class="treeview-list-item">
                                                                  <div class="treeview-item">
                                                                    <a class="flex-1" href="#!">
                                                                      <p class="treeview-text">
                                                                        <span class="me-2 fab fa-js text-success"></span>
                                                                        theme.js
                                                                      </p>
                                                                    </a>
                                                                  </div>
                                                                </li>
                                                                <li class="treeview-list-item">
                                                                  <div class="treeview-item">
                                                                    <a class="flex-1" href="#!">
                                                                      <p class="treeview-text">
                                                                        <span class="me-2 fab fa-js text-success"></span>
                                                                        theme.min.js
                                                                      </p>
                                                                    </a>
                                                                  </div>
                                                                </li>
                                                              </ul>
                                                            </li>
                                                          </ul>
                                                        </li>
                                                        <li class="treeview-list-item">
                                                          <a data-bs-toggle="collapse" href="#treeviewExample-2-3" role="button" aria-expanded="false">
                                                            <p class="treeview-text">
                                                              dashboard
                                                            </p>
                                                          </a>
                                                          <ul class="collapse treeview-list" id="treeviewExample-2-3" data-show="false">
                                                            <li class="treeview-list-item">
                                                              <div class="treeview-item">
                                                                <a class="flex-1" href="#!">
                                                                  <p class="treeview-text">
                                                                    <span class="me-2 fab fa-html5 text-danger"></span>
                                                                    default.html
                                                                  </p>
                                                                </a>
                                                              </div>
                                                            </li>
                                                            <li class="treeview-list-item">
                                                              <div class="treeview-item">
                                                                <a class="flex-1" href="#!">
                                                                  <p class="treeview-text">
                                                                    <span class="me-2 fab fa-html5 text-danger"></span>
                                                                    analytics.html
                                                                  </p>
                                                                </a>
                                                              </div>
                                                            </li>
                                                            <li class="treeview-list-item">
                                                              <div class="treeview-item">
                                                                <a class="flex-1" href="#!">
                                                                  <p class="treeview-text">
                                                                    <span class="me-2 fab fa-html5 text-danger"></span>
                                                                    crm.html
                                                                  </p>
                                                                </a>
                                                              </div>
                                                            </li>
                                                          </ul>
                                                        </li>
                                                        <li class="treeview-list-item">
                                                          <div class="treeview-item">
                                                            <a class="flex-1" href="#!">
                                                              <p class="treeview-text">
                                                                <span class="me-2 fab fa-html5 text-danger"></span>
                                                                index.html
                                                              </p>
                                                            </a>
                                                          </div>
                                                        </li>
                                                      </ul>
                                                    </li>
                                                    <li class="treeview-list-item">
                                                      <a data-bs-toggle="collapse" href="#treeviewExample-1-2" role="button" aria-expanded="false">
                                                        <p class="treeview-text">
                                                          Files
                                                        </p>
                                                      </a>
                                                      <ul class="collapse treeview-list" id="treeviewExample-1-2" data-show="true">
                                                        <li class="treeview-list-item">
                                                          <div class="treeview-item">
                                                            <a class="flex-1" href="#!">
                                                              <p class="treeview-text">
                                                                <span class="me-2 fas fa-file-archive text-warning"></span>
                                                                build.zip
                                                              </p>
                                                            </a>
                                                          </div>
                                                        </li>
                                                        <li class="treeview-list-item">
                                                          <div class="treeview-item">
                                                            <a class="flex-1" href="#!">
                                                              <p class="treeview-text">
                                                                <span class="me-2 fas fa-file-archive text-warning"></span>
                                                                live-1.3.4.zip
                                                              </p>
                                                            </a>
                                                          </div>
                                                        </li>
                                                        <li class="treeview-list-item">
                                                          <div class="treeview-item">
                                                            <a class="flex-1" href="#!">
                                                              <p class="treeview-text">
                                                                <span class="me-2 fas fa-file text-primary"></span>
                                                                app.exe
                                                              </p>
                                                            </a>
                                                          </div>
                                                        </li>
                                                        <li class="treeview-list-item">
                                                          <div class="treeview-item">
                                                            <a class="flex-1" href="#!">
                                                              <p class="treeview-text">
                                                                <span class="me-2 fas fa-file text-primary"></span>
                                                                export.csv
                                                              </p>
                                                            </a>
                                                          </div>
                                                        </li>
                                                        <li class="treeview-list-item">
                                                          <div class="treeview-item">
                                                            <a class="flex-1" href="#!">
                                                              <p class="treeview-text">
                                                                <span class="me-2 fas fa-file-pdf text-danger"></span>
                                                                default.pdf
                                                              </p>
                                                            </a>
                                                          </div>
                                                        </li>
                                                        <li class="treeview-list-item">
                                                          <div class="treeview-item">
                                                            <a class="flex-1" href="#!">
                                                              <p class="treeview-text">
                                                                <span class="me-2 fas fa-music text-info"></span>
                                                                Yellow_Coldplay.wav
                                                              </p>
                                                            </a>
                                                          </div>
                                                        </li>
                                                      </ul>
                                                    </li>
                                                    <li class="treeview-list-item">
                                                      <div class="treeview-item">
                                                        <a class="flex-1" href="#!">
                                                          <p class="treeview-text">
                                                            <span class="me-2 fab fa-node-js text-success"></span>
                                                            package.json
                                                          </p>
                                                        </a>
                                                      </div>
                                                    </li>
                                                    <li class="treeview-list-item">
                                                      <div class="treeview-item">
                                                        <a class="flex-1" href="#!">
                                                          <p class="treeview-text">
                                                            <span class="me-2 fab fa-node-js text-success"></span>
                                                            package-lock.json
                                                          </p>
                                                        </a>
                                                      </div>
                                                    </li>
                                                    <li class="treeview-list-item">
                                                      <div class="treeview-item">
                                                        <a class="flex-1" href="#!">
                                                          <p class="treeview-text">
                                                            <span class="me-2 fas fa-exclamation-circle text-primary"></span>
                                                            README.md
                                                          </p>
                                                        </a>
                                                      </div>
                                                    </li>
                                                  </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 ps-lg-4 my-5 text-center text-lg-start">
                                        <h3 class="text-primary">Aucun contenu ici</h3>
                                        <p class="lead"> Stockez et classez vos documents dans un espace sécurisé</p><a class="btn btn-falcon-primary" href="../documentation/getting-started.html">Ajouter un document</a>
                                      </div>
                                  </div>

                                @endif

                            </div>
                      </div>
                    </div>
                  </div>

                </div>


</div>

@endsection

@section('scripts')

@endsection
