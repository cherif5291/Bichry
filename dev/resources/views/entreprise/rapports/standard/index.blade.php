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
                      <li class="nav-item"><a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#tab-home" role="tab" aria-controls="tab-home" aria-selected="true">Standard</a></li>
                      <li class="nav-item"><a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#tab-profile" role="tab" aria-controls="tab-profile" aria-selected="false">Rapports de la direction</a></li>
                    </ul>
                    <div class="tab-content border-x border-bottom p-3" id="myTabContent">
                      <div class="tab-pane fade show active" id="tab-home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading1">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">Favoris</button>
                                </h2>
                                <div class="accordion-collapse collapse show" id="collapse1" aria-labelledby="heading1"
                                    data-bs-parent="#accordionExample">

                                    <div class="table-responsive scrollbar">
                                        <div class="col-md-12 row">
                                            <div class="col-md-6">
                                                <table class="table table-hover table-striped overflow-hidden">

                                                    <tbody>
                                                        <tr class="align-middle">
                                                            <td class="text-nowrap">État des résultats en pourcentage du revenu total</td>
                                                            <td class="text-end">
                                                                <a href=""><i class="fas fa-heart text-warning"></i></a>
                                                                <div class="btn-group dropstart">
                                                                    <a href="" class="" type="" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-grip-vertical text-dark"></i></a>
                                                                    <div class="dropdown-menu">
                                                                      <a class="dropdown-item" href="#">Action</a>

                                                                    </div>
                                                                  </div>
                                                            </td>
                                                        </tr>
                                                        <tr class="align-middle">
                                                            <td class="text-nowrap">Comparaison de bilans</td>
                                                           <td class="text-end">
                                                                <a href=""><i class="fas fa-heart text-warning"></i></a>
                                                                <div class="btn-group dropstart">
                                                                    <a href="" class="" type="" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-grip-vertical text-dark"></i></a>
                                                                    <div class="dropdown-menu">
                                                                      <a class="dropdown-item" href="#">Action</a>

                                                                    </div>
                                                                  </div>
                                                            </td>
                                                        </tr>
                                                        <tr class="align-middle">
                                                            <td class="text-nowrap">Bilan détaillé</td>
                                                           <td class="text-end">
                                                                <a href=""><i class="fas fa-heart text-warning"></i></a>
                                                                <div class="btn-group dropstart">
                                                                    <a href="" class="" type="" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-grip-vertical text-dark"></i></a>
                                                                    <div class="dropdown-menu">
                                                                      <a class="dropdown-item" href="#">Action</a>

                                                                    </div>
                                                                  </div>
                                                            </td>
                                                        </tr>
                                                        <tr class="align-middle">
                                                            <td class="text-nowrap">Bilan</td>
                                                           <td class="text-end">
                                                                <a href=""><i class="fas fa-heart text-warning"></i></a>
                                                                <div class="btn-group dropstart">
                                                                    <a href="" class="" type="" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-grip-vertical text-dark"></i></a>
                                                                    <div class="dropdown-menu">
                                                                      <a class="dropdown-item" href="#">Action</a>

                                                                    </div>
                                                                  </div>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-md-6">
                                                <table class="table table-hover table-striped overflow-hidden">

                                                    <tbody>
                                                        <tr class="align-middle">
                                                            <td class="text-nowrap">Relevé des changements des capitaux propres</td>
                                                           <td class="text-end">
                                                                <a href=""><i class="fas fa-heart text-warning"></i></a>
                                                                <div class="btn-group dropstart">
                                                                    <a href="" class="" type="" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-grip-vertical text-dark"></i></a>
                                                                    <div class="dropdown-menu">
                                                                      <a class="dropdown-item" href="#">Action</a>

                                                                    </div>
                                                                  </div>
                                                            </td>
                                                        </tr>
                                                        <tr class="align-middle">
                                                            <td class="text-nowrap">Sommaire trimestriel de l’état des résultats</td>
                                                           <td class="text-end">
                                                                <a href=""><i class="fas fa-heart text-warning"></i></a>
                                                                <div class="btn-group dropstart">
                                                                    <a href="" class="" type="" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-grip-vertical text-dark"></i></a>
                                                                    <div class="dropdown-menu">
                                                                      <a class="dropdown-item" href="#">Action</a>

                                                                    </div>
                                                                  </div>
                                                            </td>
                                                        </tr>
                                                        <tr class="align-middle">
                                                            <td class="text-nowrap">État des flux de trésorerie</td>
                                                           <td class="text-end">
                                                                <a href=""><i class="fas fa-heart text-warning"></i></a>
                                                                <div class="btn-group dropstart">
                                                                    <a href="" class="" type="" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-grip-vertical text-dark"></i></a>
                                                                    <div class="dropdown-menu">
                                                                      <a class="dropdown-item" href="#">Action</a>

                                                                    </div>
                                                                  </div>
                                                            </td>
                                                        </tr>
                                                        <tr class="align-middle">
                                                            <td class="text-nowrap">État des résultats par client</td>
                                                           <td class="text-end">
                                                                <a href=""><i class="fas fa-heart text-warning"></i></a>
                                                                <div class="btn-group dropstart">
                                                                    <a href="" class="" type="" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-grip-vertical text-dark"></i></a>
                                                                    <div class="dropdown-menu">
                                                                      <a class="dropdown-item" href="#">Action</a>

                                                                    </div>
                                                                  </div>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading2">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse2" aria-expanded="true" aria-controls="collapse2">Aperçu de
                                        l’entreprise</button>
                                </h2>
                                <div class="accordion-collapse collapse " id="collapse2" aria-labelledby="heading2"
                                    data-bs-parent="#accordionExample">
                                    <div class="col-md-12 row">
                                        <div class="col-md-6">
                                            <table class="table table-hover table-striped overflow-hidden">

                                                <tbody>
                                                    <tr class="align-middle">
                                                        <td class="text-nowrap">État des résultats en pourcentage du revenu total</td>
                                                        <td class="text-end">
                                                            <a href=""><i class="fas fa-heart text-warning"></i></a>
                                                            <div class="btn-group dropstart">
                                                                <a href="" class="" type="" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-grip-vertical text-dark"></i></a>
                                                                <div class="dropdown-menu">
                                                                  <a class="dropdown-item" href="#">Action</a>

                                                                </div>
                                                              </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle">
                                                        <td class="text-nowrap">Comparaison de bilans</td>
                                                       <td class="text-end">
                                                            <a href=""><i class="fas fa-heart text-warning"></i></a>
                                                            <div class="btn-group dropstart">
                                                                <a href="" class="" type="" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-grip-vertical text-dark"></i></a>
                                                                <div class="dropdown-menu">
                                                                  <a class="dropdown-item" href="#">Action</a>

                                                                </div>
                                                              </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle">
                                                        <td class="text-nowrap">Bilan détaillé</td>
                                                       <td class="text-end">
                                                            <a href=""><i class="fas fa-heart text-warning"></i></a>
                                                            <div class="btn-group dropstart">
                                                                <a href="" class="" type="" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-grip-vertical text-dark"></i></a>
                                                                <div class="dropdown-menu">
                                                                  <a class="dropdown-item" href="#">Action</a>

                                                                </div>
                                                              </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle">
                                                        <td class="text-nowrap">Bilan</td>
                                                       <td class="text-end">
                                                            <a href=""><i class="fas fa-heart text-warning"></i></a>
                                                            <div class="btn-group dropstart">
                                                                <a href="" class="" type="" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-grip-vertical text-dark"></i></a>
                                                                <div class="dropdown-menu">
                                                                  <a class="dropdown-item" href="#">Action</a>

                                                                </div>
                                                              </div>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-md-6">
                                            <table class="table table-hover table-striped overflow-hidden">

                                                <tbody>
                                                    <tr class="align-middle">
                                                        <td class="text-nowrap">Relevé des changements des capitaux propres</td>
                                                       <td class="text-end">
                                                            <a href=""><i class="fas fa-heart text-warning"></i></a>
                                                            <div class="btn-group dropstart">
                                                                <a href="" class="" type="" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-grip-vertical text-dark"></i></a>
                                                                <div class="dropdown-menu">
                                                                  <a class="dropdown-item" href="#">Action</a>

                                                                </div>
                                                              </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle">
                                                        <td class="text-nowrap">Sommaire trimestriel de l’état des résultats</td>
                                                       <td class="text-end">
                                                            <a href=""><i class="fas fa-heart text-warning"></i></a>
                                                            <div class="btn-group dropstart">
                                                                <a href="" class="" type="" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-grip-vertical text-dark"></i></a>
                                                                <div class="dropdown-menu">
                                                                  <a class="dropdown-item" href="#">Action</a>

                                                                </div>
                                                              </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle">
                                                        <td class="text-nowrap">État des flux de trésorerie</td>
                                                       <td class="text-end">
                                                            <a href=""><i class="fas fa-heart text-warning"></i></a>
                                                            <div class="btn-group dropstart">
                                                                <a href="" class="" type="" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-grip-vertical text-dark"></i></a>
                                                                <div class="dropdown-menu">
                                                                  <a class="dropdown-item" href="#">Action</a>

                                                                </div>
                                                              </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle">
                                                        <td class="text-nowrap">État des résultats par client</td>
                                                       <td class="text-end">
                                                            <a href=""><i class="fas fa-heart text-warning"></i></a>
                                                            <div class="btn-group dropstart">
                                                                <a href="" class="" type="" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-grip-vertical text-dark"></i></a>
                                                                <div class="dropdown-menu">
                                                                  <a class="dropdown-item" href="#">Action</a>

                                                                </div>
                                                              </div>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading3">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse3" aria-expanded="true" aria-controls="collapse3">Ce qu’on vous
                                        doit</button>
                                </h2>
                                <div class="accordion-collapse collapse " id="collapse3" aria-labelledby="heading3"
                                    data-bs-parent="#accordionExample">
                                    <div class="col-md-12 row">
                                        <div class="col-md-6">
                                            <table class="table table-hover table-striped overflow-hidden">

                                                <tbody>
                                                    <tr class="align-middle">
                                                        <td class="text-nowrap">État des résultats en pourcentage du revenu total</td>
                                                        <td class="text-end">
                                                            <a href=""><i class="fas fa-heart text-warning"></i></a>
                                                            <div class="btn-group dropstart">
                                                                <a href="" class="" type="" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-grip-vertical text-dark"></i></a>
                                                                <div class="dropdown-menu">
                                                                  <a class="dropdown-item" href="#">Action</a>

                                                                </div>
                                                              </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle">
                                                        <td class="text-nowrap">Comparaison de bilans</td>
                                                       <td class="text-end">
                                                            <a href=""><i class="fas fa-heart text-warning"></i></a>
                                                            <div class="btn-group dropstart">
                                                                <a href="" class="" type="" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-grip-vertical text-dark"></i></a>
                                                                <div class="dropdown-menu">
                                                                  <a class="dropdown-item" href="#">Action</a>

                                                                </div>
                                                              </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle">
                                                        <td class="text-nowrap">Bilan détaillé</td>
                                                       <td class="text-end">
                                                            <a href=""><i class="fas fa-heart text-warning"></i></a>
                                                            <div class="btn-group dropstart">
                                                                <a href="" class="" type="" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-grip-vertical text-dark"></i></a>
                                                                <div class="dropdown-menu">
                                                                  <a class="dropdown-item" href="#">Action</a>

                                                                </div>
                                                              </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle">
                                                        <td class="text-nowrap">Bilan</td>
                                                       <td class="text-end">
                                                            <a href=""><i class="fas fa-heart text-warning"></i></a>
                                                            <div class="btn-group dropstart">
                                                                <a href="" class="" type="" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-grip-vertical text-dark"></i></a>
                                                                <div class="dropdown-menu">
                                                                  <a class="dropdown-item" href="#">Action</a>

                                                                </div>
                                                              </div>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-md-6">
                                            <table class="table table-hover table-striped overflow-hidden">

                                                <tbody>
                                                    <tr class="align-middle">
                                                        <td class="text-nowrap">Relevé des changements des capitaux propres</td>
                                                       <td class="text-end">
                                                            <a href=""><i class="fas fa-heart text-warning"></i></a>
                                                            <div class="btn-group dropstart">
                                                                <a href="" class="" type="" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-grip-vertical text-dark"></i></a>
                                                                <div class="dropdown-menu">
                                                                  <a class="dropdown-item" href="#">Action</a>

                                                                </div>
                                                              </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle">
                                                        <td class="text-nowrap">Sommaire trimestriel de l’état des résultats</td>
                                                       <td class="text-end">
                                                            <a href=""><i class="fas fa-heart text-warning"></i></a>
                                                            <div class="btn-group dropstart">
                                                                <a href="" class="" type="" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-grip-vertical text-dark"></i></a>
                                                                <div class="dropdown-menu">
                                                                  <a class="dropdown-item" href="#">Action</a>

                                                                </div>
                                                              </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle">
                                                        <td class="text-nowrap">État des flux de trésorerie</td>
                                                       <td class="text-end">
                                                            <a href=""><i class="fas fa-heart text-warning"></i></a>
                                                            <div class="btn-group dropstart">
                                                                <a href="" class="" type="" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-grip-vertical text-dark"></i></a>
                                                                <div class="dropdown-menu">
                                                                  <a class="dropdown-item" href="#">Action</a>

                                                                </div>
                                                              </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle">
                                                        <td class="text-nowrap">État des résultats par client</td>
                                                       <td class="text-end">
                                                            <a href=""><i class="fas fa-heart text-warning"></i></a>
                                                            <div class="btn-group dropstart">
                                                                <a href="" class="" type="" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-grip-vertical text-dark"></i></a>
                                                                <div class="dropdown-menu">
                                                                  <a class="dropdown-item" href="#">Action</a>

                                                                </div>
                                                              </div>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading4">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse4" aria-expanded="true" aria-controls="collapse4">Ventes et
                                        clients</button>
                                </h2>
                                <div class="accordion-collapse collapse" id="collapse4" aria-labelledby="heading4"
                                    data-bs-parent="#accordionExample">
                                    <div class="col-md-12 row">
                                        <div class="col-md-6">
                                            <table class="table table-hover table-striped overflow-hidden">

                                                <tbody>
                                                    <tr class="align-middle">
                                                        <td class="text-nowrap">État des résultats en pourcentage du revenu total</td>
                                                        <td class="text-end">
                                                            <a href=""><i class="fas fa-heart text-warning"></i></a>
                                                            <div class="btn-group dropstart">
                                                                <a href="" class="" type="" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-grip-vertical text-dark"></i></a>
                                                                <div class="dropdown-menu">
                                                                  <a class="dropdown-item" href="#">Action</a>

                                                                </div>
                                                              </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle">
                                                        <td class="text-nowrap">Comparaison de bilans</td>
                                                       <td class="text-end">
                                                            <a href=""><i class="fas fa-heart text-warning"></i></a>
                                                            <div class="btn-group dropstart">
                                                                <a href="" class="" type="" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-grip-vertical text-dark"></i></a>
                                                                <div class="dropdown-menu">
                                                                  <a class="dropdown-item" href="#">Action</a>

                                                                </div>
                                                              </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle">
                                                        <td class="text-nowrap">Bilan détaillé</td>
                                                       <td class="text-end">
                                                            <a href=""><i class="fas fa-heart text-warning"></i></a>
                                                            <div class="btn-group dropstart">
                                                                <a href="" class="" type="" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-grip-vertical text-dark"></i></a>
                                                                <div class="dropdown-menu">
                                                                  <a class="dropdown-item" href="#">Action</a>

                                                                </div>
                                                              </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle">
                                                        <td class="text-nowrap">Bilan</td>
                                                       <td class="text-end">
                                                            <a href=""><i class="fas fa-heart text-warning"></i></a>
                                                            <div class="btn-group dropstart">
                                                                <a href="" class="" type="" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-grip-vertical text-dark"></i></a>
                                                                <div class="dropdown-menu">
                                                                  <a class="dropdown-item" href="#">Action</a>

                                                                </div>
                                                              </div>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-md-6">
                                            <table class="table table-hover table-striped overflow-hidden">

                                                <tbody>
                                                    <tr class="align-middle">
                                                        <td class="text-nowrap">Relevé des changements des capitaux propres</td>
                                                       <td class="text-end">
                                                            <a href=""><i class="fas fa-heart text-warning"></i></a>
                                                            <div class="btn-group dropstart">
                                                                <a href="" class="" type="" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-grip-vertical text-dark"></i></a>
                                                                <div class="dropdown-menu">
                                                                  <a class="dropdown-item" href="#">Action</a>

                                                                </div>
                                                              </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle">
                                                        <td class="text-nowrap">Sommaire trimestriel de l’état des résultats</td>
                                                       <td class="text-end">
                                                            <a href=""><i class="fas fa-heart text-warning"></i></a>
                                                            <div class="btn-group dropstart">
                                                                <a href="" class="" type="" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-grip-vertical text-dark"></i></a>
                                                                <div class="dropdown-menu">
                                                                  <a class="dropdown-item" href="#">Action</a>

                                                                </div>
                                                              </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle">
                                                        <td class="text-nowrap">État des flux de trésorerie</td>
                                                       <td class="text-end">
                                                            <a href=""><i class="fas fa-heart text-warning"></i></a>
                                                            <div class="btn-group dropstart">
                                                                <a href="" class="" type="" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-grip-vertical text-dark"></i></a>
                                                                <div class="dropdown-menu">
                                                                  <a class="dropdown-item" href="#">Action</a>

                                                                </div>
                                                              </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="align-middle">
                                                        <td class="text-nowrap">État des résultats par client</td>
                                                       <td class="text-end">
                                                            <a href=""><i class="fas fa-heart text-warning"></i></a>
                                                            <div class="btn-group dropstart">
                                                                <a href="" class="" type="" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-grip-vertical text-dark"></i></a>
                                                                <div class="dropdown-menu">
                                                                  <a class="dropdown-item" href="#">Action</a>

                                                                </div>
                                                              </div>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="tab-profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="table-responsive scrollbar">
                            <table class="table table-hover table-striped overflow-hidden">
                              <thead>
                                <tr>
                                  <th scope="col"><small>NOM</small></th>
                                  <th scope="col"><small>CRÉÉ PAR</small></th>
                                  <th scope="col"><small>DERNIÈRE MODIFICATION</small></th>
                                  <th scope="col">   <small>PÉRIODE COUVERTE</small></th>
                                  <th class="text-end" scope="col">	 <small>ACTION</small></th>
                                </tr>
                              </thead>
                            <tbody>
                                {{-- <tr class="align-middle">
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
                                    <td><span class="badge badge rounded-pill d-block p-2 badge-soft-success">Completed<span class="ms-1 fas fa-check" data-fa-transform="shrink-2"></span></span>
                                    </td>
                                    <td class="text-end">$99</td>
                                  </tr> --}}
                            </tbody>
                            </table>
                          </div>
                      </div>
                    </div>
                  </div>

                </div>


</div>

@endsection

@section('scripts')

@endsection
