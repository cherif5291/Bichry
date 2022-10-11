<input value="{{ $Clients }}" type="hidden" id="Clients-recu" />
<input value="{{ $ModesPaiements }}" type="hidden" id="Mode-paiement-recu" />
<input value="{{ $SourcesPaiement }}" type="hidden" id="Sources-paiement-recu" />
<input value="{{ $ComptesComptables }}" type="hidden" id="ComptesComptables-recu" />
<input value="{{ $Taxes }}" type="hidden" id="Taxes-recu" />
<input type="hidden" id="id-recu" />
<input hidden class="form-control" name="type" id="type-recu" type="text" value="recu" />
<div class="cd-popup-container">
    <div class="card-body ">
        <form action="" method="">
            <div class="row col-md-12 d-flex justify-content-between gx-3 mb-3">
                <div class="d-flex mb-4 justify-content-between">
                    <h4>Reçu N° <span id="recu_number_update" style="color: red!important"></span></h4>
                    <div>
                        <button class="btn btn-success btn-recu-submit">Modifier </button>
                        <div class="btn-group">
                            <button class="btn btn-danger" type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false"> <i id="trash" data-id="0"
                                    class="fa fa-trash text-light trash"></i>Effacer
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item text-danger" id="id_route_recu"
                                    href="{{route('factures.destroy', '#')}}" style="font-weight: 900">Confirmer la
                                    suppression de cette dépense</a>

                            </div>
                            <a href="#0" class="btn bg-line-chart-gradient text-light cd-popup-close">Fermer</a>

                        </div>
                    </div>

                </div>

            </div>

            <div class="row col-md-12 d-flex justify-content-between gx-3 mb-3">
                <div class="col-md-2 col-2">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                        for="fournisseur">Client</label>
                    <select class="form-select mb-3" name="fournisseur" id="fournisseur-recu"
                        aria-label="Default select example">
                    </select>
                </div>


                <div class="col-md-3 col-2">
                    <span class="form-check form-switch"  for="cc_cci" style="margin-bottom: 0px !important">
                        <input class="form-check-input" id="flexSwitchCheckChecked" type="checkbox" checked="" />
                        <label style="margin-bottom: 0px !important" class="form-check-label" for="flexSwitchCheckChecked">CC CCI ({{__('messages.send_receipt')}})</label>
                    </span>
                    <textarea class="form-control" name="cc_cci" id="cc_cci_recu" cols="30" rows="1"></textarea>
                </div>

                <div class="col-md-5 col-2 d-none d-md-block"></div>
                <div class="col-md-2 col-2 d-none d-md-block">
                    <span>{{__('messages.amount_to_pay')}}:</span>
                   <h3 id="amount_commercial_recu_pay_update">{{getCurrency()->sigle}} 0.00</h3>
                </div>

            </div>


            <div class="row gx-3 col-md-12 d-flex justify-content-between  mb-3">

                <div class="col-md-2 col-2">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1" for="cardNumber">Mode
                        paiement</label>
                    <select class="form-select mb-3" name="paiements_mode_id" id="paiements_mode_recu"
                        aria-label="Default select example">
                    </select>
                </div>
                <div class="col-md-2 col-2">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1" for="cc_cci">Reférence
                    </label>
                    <input class="form-control" name="reference" id="reference_update" type="text" />
                </div>
                <div  class="col-md-2 col-2">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                        for="paiement_source_id">Source de paiement</label>
                    <select class="form-select mb-3" name="paiement_source_id" id="paiement_source_recu"
                        aria-label="Default select example">
                    </select>
                </div>
                <div  class="col-md-2 col-2">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                        for="date_facturation">Date de Paiement</label>
                    <input class="form-control datetimepicker" name="date_facturation" id="date_recu_update"
                        type="text" />
                </div>
                <div class="col-md-2 col-2 d-md-block d-none"></div>

                <div class="col-md-2 col-2">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1" for="numero_recu">Nº de
                        reçu</label>
                    <input class="form-control" id="numero_recu_update" name="numero_recu" type="text" />
                </div>
            </div>
            <div class="row gx-3 col-md-12 d-flex justify-content-between  mb-3">
                <div class="col-md-6" hidden>
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                        for="adresse_facturation">Addresse Facturation</label>
                    <input class="form-control" id="adresse_facturation_recu" name="adresse_facturation" type="text"
                        value="" />
                </div>

            </div>

            <div class="col-md-12">
                <div class="table-responsive scrollbar mt-4 fs--1">
                    <table class="table table-striped border-bottom">
                        <thead class="light">
                            <tr class="bg-line-chart-gradient text-white dark__bg-1000">
                                <th class="border-0">Article</th>
                                <th class="border-0">Description</th>
                                <th class="border-0">Quantité</th>
                                <th class="border-0">Montant</th>
                                <th class="border-0" hidden>Prix HT</th>
                                <th class="border-0">Taxe</th>
                                <th class="border-0" hidden>Montant Taxe</th>
                                <th class="border-0">Prix TTC</th>
                                <th class="border-0">Action</th>
                            </tr>
                        </thead>
                        <tbody id="table-recu-update" style="padding: 0px !important; margin: 0px !important">
                        </tbody>
                        <tbody id="table-recu-update2" style="padding: 0px !important; margin: 0px !important">

                            <tr id="row_recu_up_0" style="padding: 0px !important; display:none;">
                                <td>
                                    <select class="form-select mb-3" id="article_id[]_recu_up_0" name="article_id[]"
                                        oninput="calculateRecuUpdate('row_recu_up_0')"
                                        aria-label="Default select example">
                                        <option value="" hidden>Choisir une article</option>
                                        @foreach ($Articles as $Article)
                                        <option value="{{$Article->id}}">
                                            {{$Article->nom}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input class="form-control" id="decription[]_recu_up_0" name="description[]"
                                        placeholder="Description" type="text" />
                                </td>
                                <td class="d-non">
                                    <input class="form-control" id="qte[]_recu_up_0" name="qte[]"
                                        oninput="calculateRecuUpdate('row_recu_up_0')" placeholder="Quantité"
                                        type="number" value="1" />
                                </td>
                                <td>
                                    <input class="form-control" id="montant[]_recu_up_0" value="0" name="montant[]"
                                        oninput="calculateRecuUpdate('row_recu_up_0')" placeholder="Montant"
                                        type="number" />
                                </td>
                                <td hidden>
                                    <input class="form-control total_ht_recu_update" name="htRecuUpdate"
                                        id="htRecuUpdate_recu_up_0" placeholder="Montant HT" type="text" disabled />
                                </td>
                                <td>
                                    <select class="form-select mb-3" name="taxe_id[]" id="taxe_id[]_recu_up_0"
                                        oninput="calculateRecuUpdate('row_recu_up_0')"
                                        aria-label="Default select example">
                                        <option value="-1">Pas de taxe</option>
                                        @foreach ($Taxes as $taxe)
                                        <option value="{{$taxe->id}}">{{$taxe->nom}}
                                            ({{$taxe->taux}}%)</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td hidden>
                                    <input class="form-control total_taxe_recu_update" name="taxeRecuUpdate"
                                        id="taxeRecuUpdate_recu_up_0" placeholder="Montant Taxe" type="text" disabled />
                                </td>
                                <td>
                                    <input class="form-control ttc_recu_update" name="ttcRecuUpdate"
                                        id="ttcRecuUpdate_recu_up_0" placeholder="Montant TTC" type="text" disabled />
                                </td>
                                <td><i id="trash_recu_update" data-recu_id_up="0"
                                        class="fa fa-trash text-danger trash_recu_update"></i>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                    <input onClick="addRowRecuUpdate('table-recu-update2')" class="btn btn-warning" type="button"
                        value='+ Nouvelle ligne' />
                </div>



            </div>
            <div class="row gx-3 mt-4 col-md-12 d-flex justify-content-between mb-3">

                <div class="col-md-3 col-12">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1" for="message">Message
                        sur la facture</label>
                    <textarea name="message" class="form-control" cols="30" id="message_recu_update"
                        rows="4"> </textarea>
                </div>
                <div class="col-md-3 col-12">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                        for="message_affiche">Message affiché sur le relevé</label>
                    <textarea name="message_affiche" class="form-control" cols="30" id="message_affiche_recu_update"
                        rows="4"></textarea>
                </div>
                <div class="col-md-3 col-12">
                    <div class="mt-2">
                        <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                            for="cardNumber">Pièce Jointe</label>
                        <input disabled class="form-control" id="customFile" type="file" />

                    </div>
                    <button class="btn btn-primary mt-3" type="button" data-bs-toggle="modal" data-bs-target="#pjrecu">{{__('messages.see_pj')}}</button>
                    <div class="modal fade" id="pjrecu" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg mt-6" role="document">
                            <div class="modal-content shadow-lg">

                            <div class="modal-body  p-0 bg-light" >
                                <div class="bg-light p-2 d-flex justify-content-between rounded-top-lg ">
                                <h4 class="mb-1" id="staticBackdropLabel">Pièce jointe</h4>
                                <button class=" btn btn-sm btn-danger d-flex flex-center " data-bs-dismiss="modal" aria-label="Close">{{__('messages.close')}}</button>

                                {{-- <p class="fs--2 mb-0">Added by <a class="link-600 fw-semi-bold" href="#!">Antony</a></p> --}}
                                </div>
                                <div class="">
                                    <iframe id="pj_facture_recu" src="http://127.0.0.1:8000/storage/docs/facture-recu/Bolico%20Group/Ibrahima/facture%20N%C2%B0234%20pour%20Ibrahima%20-%20Bolico%20Group.pdf" width="100%" height="600px"> </iframe>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-12 bg-line-chart-gradient">
                    <div class="col-auto mt-3">
                        <table class="table table-sm table-borderless fs--1 text-end">
                            <tr>
                                <th class="text-light">Sous Total:</th>
                                <td class="fw-semi-bold text-light" id="total_sans_taxe_credit">0.00 {{getCurrency()->sigle}}</td>
                                <input class="total_sans_taxe_credit text-light" id="tot_ht_recu_update" hidden />
                            </tr>
                            <tr>
                                <th class="text-light" id="taux_taxe_credit">Total Taxe:</th>
                                <input class="taux_taxe_credit" hidden />
                                <td class="fw-semi-bold text-light" id="taxe_credit">0 {{getCurrency()->sigle}}*</td>
                                <input class="taxe_credit" id="tot_taxe_recu_update" hidden />
                            </tr>

                            <tr class="border-top border-top-2 fw-bolder text-light">
                                <th  class="text-light">SOLDE À PAYER :</th>
                                <td id="total_credit" class="text-light">0 {{getCurrency()->sigle}}*</td>
                                <input class="total_credit" id="tsanstaxe_recu_update" hidden />
                            </tr>
                        </table>
                    </div>
                </div>

            </div>

        </form>
    </div>
</div> <!-- cd-popup-container -->





{{-- <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
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
                                <label class="form-label" for="nom_chequier">Nom sur le chèque</label>
                                <input class="form-control" name="nom_chequier" id="nom_chequier" type="text"
                                    required="" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="nom_pro">Nom sur les facture</label>
                                <input class="form-control" id="nom_pro" name="nom_pro" type="text" required="" />
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
                                <label class="form-label" for="portable">Portable</label>
                                <input class="form-control" name="portable" id="portable" type="text" required="" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="telecopie">Télécopie</label>
                                <input class="form-control" name="telecopie" id="telecopie" type="text" />
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="email">Email</label>
                                <input class="form-control" name="email" id="email" type="text" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="website">Site web</label>
                                <input class="form-control" name="website" id="website" type="text" />
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
</div> --}}
