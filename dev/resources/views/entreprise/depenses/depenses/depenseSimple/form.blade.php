<div class="cd-popup-container">
    <div class="card-body ">
        <form action="{{route('entreprise.depense.new.DepenseOnPop')}}" method="POST" enctype="multipart/form-data">@csrf
            <div class="row col-md-12 d-flex justify-content-between gx-3 mb-3">
                <div class="d-flex mb-4 justify-content-between">
                    <h4>{{__('messages.simple_expense')}} {{__('messages.no')}} <span id="get_depense_number" style="color: red!important"></span></h4>
                    <div>
                        <button type="submit"  class="btn btn-success ">{{__('messages.save')}} </button>
                        {{-- <div class="btn-group">
                            <button class="btn btn-danger" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{__('messages.delete')}}
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item text-danger" href="#" style="font-weight: 900">{{__('messages.confirm_delete_message')}}</a>
                            </div>
                        </div> --}}
                        <a href="#0" class="btn bg-line-chart-gradient text-light cd-popup-close">Fermer</a>

                    </div>

                </div>


            </div>

            <div class="row gx-3 col-md-12 d-flex justify-content-between mb-3">
                <div style="width: 15% !important">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                        for="fournisseur">{{__('messages.vendors')}}</label>
                    <select class="form-select mb-3" name="fournisseur" type="text">
                        {{--
                            @if ($DepenseSimple) @if ($DepenseSimple->clients_entreprise_id === $client->id) selected @endif @endif --}}
                        <option value="" hidden>{{__('messages.chose')}}</option>
                        @foreach ($Fournisseurs as $fournisseur)
                        @php
                        $value = "F".$fournisseur->id;
                        @endphp
                        <option value="{{$value}}" >{{$fournisseur->entreprise}}</option>
                        @endforeach
                        @foreach ($Clients as $client)
                        @php
                        $value2 = "C".$client->id;
                        @endphp
                        <option value="{{$value2}}" >{{$client->entreprise}}</option>
                        @endforeach
                    </select>
                </div>
                <div style="width: 75% !important;"></div>
                <div style="width: 10% !important">
                    <span>{{__('messages.amount_to_pay')}}:</span>
                   <h3 id="amount_depense_depenseSimple_pay">{{getCurrency()->sigle}} 0.00 </h3>
                </div>

            </div>
            <div class="row gx-3 col-md-12 d-flex justify-content-between mb-3">
                <div style="width: 15% !important; margin-right:1em !important">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                        for="paiementsource_id">{{__('messages.payment_source')}}</label>
                    <select class="form-select mb-3" name="paiementsource_id" id="paiementsource_id"
                        aria-label="Default select example">
                        <option value="" hidden>Choisir</option>
                        @foreach ($SourcesPaiement as $source)
                        <option value="{{$source->id}}" >({{$source->type}}) {{$source->nom}}</option>
                        @endforeach

                    </select>

                </div>
                <input hidden type="text" name="type" value="depense">
                <div style="width: 15% !important; margin-right:1em !important">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                        for="date_facturation">{{__('messages.payment_date')}}</label>
                    <input class="form-control datetimepicker" name="date_facturation" value="{{\Carbon\Carbon::now()}}" id="date_facturation"   type="text" />
                </div>

                <div style="width: 15% !important; margin-right:1em !important">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                        for="paiements_mode_id">{{__('messages.payment_mode')}}</label>
                    <select class="form-select mb-3" name="paiements_mode_id" id="paiements_mode_id"
                        aria-label="Default select example">
                        <option value="" hidden>{{__('messages.chose')}}</option>
                        @foreach ($ModesPaiements as $modeP)
                        <option value="{{$modeP->id}}" >{{$modeP->nom}}</option>
                        @endforeach
                    </select>
                </div>
                <div style="width: 37% !important;"></div>

                <div style="width: 15% !important">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                        for="reference">{{__('messages.no')}} {{__('messages.reference')}}</label>
                    <input class="form-control" id="reference_depense" name="reference" type="number"/>
                </div>

            </div>


            <div class="accordion mt-4 mb-4" id="accordionExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="heading1">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">{{__('messages.accounting_account')}}</button>
                  </h2>
                  <div class="accordion-collapse collapse show" id="collapse1" aria-labelledby="heading1" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="col-md-12">
                            <div class="table-responsive scrollbar mt-4 fs--1">
                                <table id="test-table" class="table table-striped border-bottom">
                                    <thead class="light">
                                        <tr class="bg-line-chart-gradient text-white dark__bg-1000">
                                            <th class="border-0">{{__('messages.categorie')}}</th>
                                            <th class="border-0">{{__('messages.description')}}</th>
                                            <th class="border-0">{{__('messages.amount')}}</th>
                                            <th class="border-0" hidden>{{__('messages.amount_without_taxe')}}</th>

                                            <th class="border-0">{{__('messages.taxe')}}</th>
                                            <th class="border-0" hidden>{{__('messages.taxe_amount')}}</th>
                                            <th class="border-0">{{__('messages.total_amount')}}</th>
                                            <th class="border-0">-</th>
                                        </tr>
                                    </thead>
                                    <tbody id="test-body2" style="padding: 0px !important; margin: 0px !important">

                                        <tr id="row_dep_sim_0" style="padding: 0px !important; ">
                                            <td style="margin-left: 0px !important; padding-left:0px !important">
                                                <select class="form-select mb-3" id="comptes_comptable_id[]_dep_sim_0" name="comptes_comptable_id[]" oninput="calculateDepSim('row_dep_sim_0')"
                                                    aria-label="Default select example">
                                                    <option value="" hidden>{{__('messages.chose_category')}}</option>
                                                    @foreach ($ComptesComptables as $CompteComptable)
                                                    <option value="{{$CompteComptable->id}}">
                                                        {{$CompteComptable->nom}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input class="form-control" id="decription[]_dep_sim_0" name="description[]"
                                                    placeholder="Description" value="-" type="text" />
                                            </td>
                                            <td class="d-none">
                                                <input class="form-control" id="qte[]_dep_sim_0" name="qte[]" oninput="calculateDepSim('row_dep_sim_0')" placeholder="Quantité"
                                                    type="number" value="1"/>
                                            </td>
                                            <td>
                                                <input class="form-control" id="montant[]_dep_sim_0" name="montant[]" oninput="calculateDepSim('row_dep_sim_0')" placeholder="Montant"
                                                    type="number" value="0"/>
                                            </td>
                                            <td hidden>
                                                <input class="form-control total_ht_dep_sim" name="htDepSim" id="htDepSim_dep_sim_0" placeholder="Montant HT"
                                                    type="text" disabled/>
                                            </td>
                                            <td>
                                                <select class="form-select mb-3" name="taxe_id[]" id="taxe_id[]_dep_sim_0" oninput="calculateDepSim('row_dep_sim_0')"
                                                    aria-label="Default select example">
                                                    <option value="-1">{{__('messages.no_taxe')}}</option>
                                                    @foreach ($Taxes as $taxe)
                                                    <option value="{{$taxe->id}}">{{$taxe->nom}}
                                                        ({{$taxe->taux}}%)</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td hidden>
                                                <input class="form-control total_taxe_dep_sim" name="taxeDepSim" id="taxeDepSim_dep_sim_0" placeholder="Montant Taxe"
                                                type="text" disabled/>
                                            </td>
                                            <td>
                                                <input class="form-control ttc_dep_sim" name="ttcDepSim" id="ttcDepSim_dep_sim_0" placeholder="Montant TTC"
                                                type="text" disabled/>
                                            </td>
                                            <td><i id="trash_dep_sim" data-dep_sim="0" class="fa fa-trash text-danger trash_dep_sim"></i>
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>
                                <input onClick="addRowDepPan('test-body2')" class="btn btn-warning" type="button" value='+ Nouvelle ligne' />
                                <input value="{{$CompteComptables}}" type="hidden" id="compte_compta" />
                                <input value="{{$Taxes}}" type="hidden" id="taxe_value_dep_panier" />
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="accordion-item mt-2">
                    <h2 class="accordion-header" id="heading2">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="true" aria-controls="collapse2">{{__('messages.products_services')}}</button>
                    </h2>
                    <div class="accordion-collapse collapse" id="collapse2" aria-labelledby="heading2" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                          <div class="col-md-12">
                              <div class="table-responsive scrollbar mt-4 fs--1">
                                  <table id="test-table"  class="table table-striped border-bottom">
                                      <thead class="light">
                                          <tr class="bg-line-chart-gradient text-white dark__bg-1000">
                                            <th class="border-0">{{__('messages.item')}}</th>
                                            <th class="border-0">{{__('messages.description')}}</th>
                                            <th class="border-0">{{__('messages.quantity')}}</th>
                                            <th class="border-0">{{__('messages.amount')}}</th>
                                            <th class="border-0" hidden>{{__('messages.amount_without_taxe')}}</th>
                                            <th class="border-0">{{__('messages.taxe')}}</th>
                                            <th class="border-0" hidden>{{__('messages.taxe_amount')}}</th>
                                            <th class="border-0">{{__('messages.total_amount')}}</th>
                                            <th class="border-0">-</th>

                                            </tr>
                                      </thead>
                                      <tbody id="dep-simp-article" style="padding: 0px !important; margin: 0px !important">
                                          <tr id='row_simAr_0' style="padding: 0px !important; ">
                                              <td style="margin-left: 0px !important; padding-left:0px !important">
                                                  <select class="form-select mb-3" id="article_id[]_0" name="article_id[]"
                                                      aria-label="Default select example" oninput="calculateDepSimpUp('row_simAr_0')">
                                                      <option value="" hidden>{{__('messages.chose_item')}}</option>
                                                      @foreach ($Articles as $Article)
                                                      <option value="{{$Article->id}}">
                                                          {{$Article->nom}}</option>
                                                      @endforeach
                                                  </select>
                                              </td>
                                              <td>
                                                  <input class="form-control" value="-" id="decription_article[]_0" name="description_article[]"
                                                      placeholder="Description" type="text" oninput="calculateDepSimpUp('row_simAr_0')"/>
                                              </td>
                                              <td>
                                                  <input class="form-control" id="qte_article[]_0" name="qte_article[]" placeholder="quantité"
                                                      type="number" value="1" oninput="calculateDepSimpUp('row_simAr_0')"/>
                                              </td>
                                              <td>
                                                  <input class="form-control" id="montant_article[]_0" name="montant_article[]" placeholder="Montant"
                                                      type="number" oninput="calculateDepSimpUp('row_simAr_0')"/>
                                              </td>
                                              <td hidden>
                                                  <input class="form-control total_ht" name="total_ht_dep" id="total_ht_dep_0" placeholder="Prix HT"
                                                      type="text" disabled/>
                                              </td>
                                              <td>
                                                  <select class="form-select mb-3" name="taxe_article[]" id="taxe_article[]_0"
                                                      aria-label="Default select example" oninput="calculateDepSimpUp('row_simAr_0')">
                                                      <option value="-1" hidden>{{__('messages.no_taxe')}}</option>
                                                      @foreach ($Taxes as $taxe)
                                                      <option value="{{$taxe->id}}">{{$taxe->nom}}
                                                          ({{$taxe->taux}}%)</option>
                                                      @endforeach
                                                  </select>
                                              </td>
                                              <td hidden>
                                                  <input class="form-control total_taxe" name="total_taxe_dep" id="total_taxe_dep_0" placeholder="Montant Taxe"
                                                      type="text" disabled/>
                                              </td>
                                              <td>
                                                  <input class="form-control ttc" name="ttc_dep" id="ttc_dep_0" placeholder="Montant TTC"
                                                      type="text" disabled/>
                                              </td>
                                              <td><i id="trash_dep_fac" data-fac="0" class="fa fa-trash text-danger trash_dep_fac"></i>
                                              </td>
                                          </tr>
                                      </tbody>

                                  </table>
                                  <input onClick="addRowDepSimpUp('dep-simp-article')"  class="btn btn-warning" type="button" value='+ Nouvelle ligne' />
                                  <input value="{{$Articles}}" type="hidden" id="articles_facture_depense" />
                                  <input value="{{$Taxes}}" type="hidden" id="taxe_facture_depense" />
                              </div>

                          </div>
                      </div>
                    </div>
                  </div>
            </div>



            <div class="row mt-4 gx-3 col-md-12 d-flex justify-content-between mb-3">

                <div class="col-md-3 col-12">

                    <div class="mt-2">
                        <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                        for="note">{{__('messages.memo')}}</label>
                    <textarea name="note" id="" class="form-control" cols="30" id="note"
                        rows="4"> </textarea>
                    </div>






                </div>

                <div class="col-md-3 col-12">
                    <div class="">
                        <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                        for="cardNumber">{{__('messages.pj')}}</label>
                        <input  class="form-control" name="fichier" id="customFile" type="file" />
                    </div>

                </div>
                <div class="col-md-3  d-md-block d-none">

                </div>
                <div class=" col-md-3 col-12 bg-line-chart-gradient">
                    <div class="col-auto mt-3">
                        <table class="table table-sm table-borderless fs--1 text-end">
                            <tr>
                                <th class="text-light">{{__('messages.sub_total')}}:</th>
                                <td class="fw-semi-bold text-light total_sans_taxe_dep_sim">0.00 {{getCurrency()->sigle}}</td>
                            </tr>
                            <tr>
                                <th class="text-light">{{__('messages.taxe_amount')}}:</th>
                                <td class="fw-semi-bold taxe_value_dep_sim">0 {{getCurrency()->sigle}}</td>
                            </tr>

                            <tr class="border-top border-top-2 fw-bolder text-light">
                                <th class="text-light">{{__('messages.amount_to_paye')}}:</th>
                                <td class="total_ttc_dep_sim text-light">0 {{getCurrency()->sigle}}</td>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div> <!-- cd-popup-container -->





<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content position-relative">
            <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                    data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
                    <h4 class="mb-1" id="modalExampleDemoLabel">Ajout nouveau fournisseur </h4>
                </div>
                <div class="p-4 pb-0">
                    <form action="{{route('entreprise.fournisseurs.new.store')}}" class="row g-3 needs-validation"
                        novalidate="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="entreprise">Nom entreprise fournisseur</label>
                                <input class="form-control" name="entreprise" id="entreprise" type="text" required="" />
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="prenom">Prénom du responsable</label>
                                <input class="form-control" name="prenom" id="prenom" type="text" required="" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="nom">Nom du responsable</label>
                                <input class="form-control" name="nom" id="nom" type="text" required="" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="titre">Titre du responsable</label>
                                <input class="form-control" name="titre" id="titre" type="text" required="" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="col-form-label" for="recipient-name">Recipient:</label>
                                <input class="form-control" id="recipient-name" type="text" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="telephone">Téléphone</label>
                                <input class="form-control" name="telephone" id="telephone" type="text" required="" />
                            </div>


                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="email">Email</label>
                                <input class="form-control" name="email" id="email" type="text" />
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="numero_compte">Numéro de compte</label>
                                <input class="form-control" name="numero_compte" id="numero_compte" type="text" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="adresse">Adresse</label>
                                <input class="form-control" name="adresse" id="adresse" type="text">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="ville">Ville</label>
                                <input class="form-control" id="ville" name="ville" type="text" />
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="province">Province</label>
                                <input class="form-control" name="province" id="province" type="text" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="code_postal">Code Postal</label>
                                <input class="form-control" name="code_postal" id="code_postal" type="text" />
                            </div>


                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="pays">Pays</label>
                                <select class="form-select" name="pays" id="pays" required="">
                                    <option selected="" disabled="" value="">Chosir</option>
                                    <option value="Sénégal">Sénégal</option>
                                    <option value="Canada">Canada</option>

                                </select>
                                <div class="invalid-feedback">Vous devez choisir un pays</div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="devises_monetaire_id">Devise monétaire</label>
                                <select class="form-select" name="devises_monetaire_id" id="devises_monetaire_id"
                                    required="">
                                    <option selected="" disabled="" value="">Choisir</option>
                                    @foreach ($DevisesMonetaires as $devise)
                                    <option value="{{$devise->id}}">{{$devise->nom}} {{$devise->sigle}}</option>
                                    @endforeach

                                </select>
                                <div class="invalid-feedback">Vous devez choisir une devise pour cette fournisseur</div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="comptescomptable_id">Compte Comptable</label>
                                <select class="form-select" name="comptescomptable_id" id="comptescomptable_id"
                                    required="">
                                    <option disabled="" value="">Choisir</option>

                                    @foreach ($ComptesComptables as $ccomptable)
                                    <option value="{{$ccomptable->id}}">{{$ccomptable->nom}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">Vous devez choisir un pays</div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="paiements_modalite_id">Mode de paiement souhaité</label>
                                <select class="form-select" name="paiements_modalite_id" id="paiements_modalite_id"
                                    required="">
                                    <option disabled="" value="">Choisir</option>

                                    @foreach ($ModesPaiements as $pmode)
                                    <option value="{{$pmode->id}}">{{$pmode->nom}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">Vous devez choisir un mode de paiement</div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="validationCustom05">Note du fournisseur</label>
                                <textarea class="form-control" name="" id="" cols="5" rows="5"></textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="col-form-label" for="message-text">Message:</label>
                                <textarea class="form-control" id="message-text" cols="5" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Close</button>
                            <button class="btn btn-primary" type="submit">Enregistrer </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
