<input value="{{ $Clients }}" type="hidden" id="Clients-recu" />
<input value="{{ $ModesPaiements }}" type="hidden" id="Mode-paiement-recu" />
<input value="{{ $SourcesPaiement }}" type="hidden" id="Sources-paiement-recu" />
<input value="{{ $ComptesComptables }}" type="hidden" id="ComptesComptables-recu" />
<input value="{{ $Taxes }}" type="hidden" id="Taxes-recu" />
<input hidden class="form-control" name="type" id="type-recu" type="text" value="recu" />
<div class="cd-popup-container">
    <div class="card-body ">
        <form method="POST" action="{{route('entreprise.factures.paiement.facture')}}">
            @csrf

            <input name="id" hidden id="id-recu-paiement" />

            <div class="row col-md-12 d-flex justify-content-between gx-3 mb-3">
                <div class="d-flex mb-4 justify-content-between">
                    <h4>Reçu N° <span id="recu_number_update_paiement" style="color: red!important"></span>
                        <br>

                        <hr>
                        Montant <span id="montant_recu_paiement" > 30004 {{getCurrency()->sigle}}</span> <br>
                        Montant Payé <span id="montant_recu_a_payer_paiement" style="color: green!important">33403 {{getCurrency()->sigle}}</span><br>
                        Montant Dû <span id="montant_du_recu_paiement" style="color: red!important">33403 {{getCurrency()->sigle}}</span></h4>
                    <div>
                        <button class="btn btn-success" type="submit">Payer </button>
                        <a href="" class="btn btn-danger">Annuler</a>
                    </div>

                </div>

            </div>

            <div class="row col-md-12 d-flex justify-content-between gx-3 mb-3">
                <div class="col-md-6">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                        for="fournisseur">Source d'approvisionnement</label>
                    <select class="form-select mb-3" name="paiement_source" aria-label="Default select example">
                        <optgroup label="Banques">
                            @foreach ($Banques as $banque)
                            <option value="B{{$banque->id}}">{{$banque->nom}}</option>
                            @endforeach
                        </optgroup>
                        <optgroup label="Caisses">
                            @foreach ($Caisses as $caisse)
                            <option value="C{{$caisse->id}}">{{$caisse->nom}}</option>
                            @endforeach
                        </optgroup>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                        for="fournisseur">Montant</label>
                    <input class="form-control" name="montant" type="number" required />
                </div>
            </div>
            <div class="row col-md-12 d-flex justify-content-between gx-3 mb-3">
                <div class="col-md-6">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                        for="fournisseur">Client</label>
                    <select class="form-select mb-3" name="fournisseur" id="fournisseur-recu-paiement"
                        aria-label="Default select example" disabled>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1" for="numero_recu">Nº de
                        reçu</label>
                    <input class="form-control" id="numero_recu_update_paiement" name="numero_recu" type="text"
                        disabled />
                </div>
            </div>


            <div class="row gx-3 col-md-12 d-flex justify-content-between mb-3">
                <div class="col-md-6">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1" for="cardNumber">Mode
                        paiement</label>
                    <select class="form-select mb-3" name="paiements_mode_id" id="paiements_mode_recu_paiement" disabled
                        aria-label="Default select example">
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1" for="cc_cci">Reférence
                    </label>
                    <input class="form-control" name="reference" id="reference_update_paiement" type="text" disabled />
                </div>
            </div>
            <div class="row gx-3 col-md-12 d-flex justify-content-between  mb-3">

                <div class="col-md-6">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                        for="paiement_source_id">Source de paiement</label>
                    <select class="form-select mb-3" name="paiement_source_id" id="paiement_source_recu_paiement"
                        aria-label="Default select example" disabled>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                        for="date_facturation">Date de Paiement</label>
                    <input class="form-control datetimepicker" name="date_facturation" id="date_recu_update_paiement"
                        type="text" disabled />
                </div>
            </div>
            <div class="row gx-3 col-md-12 d-flex justify-content-between  mb-3">
                <div class="col-md-6">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                        for="adresse_facturation">Addresse Facturation</label>
                    <input class="form-control" id="adresse_facturation_recu_paiement" name="adresse_facturation"
                        type="text" disabled />
                </div>
                <div class="col-md-6">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1" for="cc_cci">CC
                        CCI</label>
                    <input class="form-control" name="cc_cci" id="cc_cci_recu_paiement" type="text" disabled />
                </div>
            </div>
            <div class="row gx-3 col-md-12 d-flex justify-content-between  mb-3">
                <div class="col-md-6 mb-3">

                    <div class="col-md-12">
                        <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1" for="message">Note
                            sur le réglement</label>
                        <textarea name="note" class="form-control" cols="30" rows="4"> </textarea>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="table-responsive scrollbar mt-4 fs--1">
                        <table class="table table-striped border-bottom">
                            <thead class="light">
                                <tr class="bg-primary text-white dark__bg-1000">
                                    <th class="border-0">Categorie</th>
                                    <th class="border-0">Description</th>
                                    <th class="border-0">Quantité</th>
                                    <th class="border-0">Montant</th>
                                    <th class="border-0">Taxe</th>

                                </tr>
                            </thead>
                            <tbody id="table-recu-update-paiement"
                                style="padding: 0px !important; margin: 0px !important">

                            </tbody>

                        </table>
                    </div>

                    <div class="row justify-content-end">
                        <div class="col-auto">
                            <table class="table table-sm table-borderless fs--1 text-end">
                                <tr>
                                    <th class="text-900">Sous Total:</th>
                                    <td class="fw-semi-bold" id="total_sans_taxe_credit_paiement">0.00 {{getCurrency()->sigle}}</td>
                                </tr>
                                <tr>
                                    <th class="text-900" id="taux_taxe_credit_paiement">Taxe:</th>
                                    <td class="fw-semi-bold" id="taxe_credit_paiement">0 {{getCurrency()->sigle}}*</td>
                                </tr>

                                <tr class="border-top border-top-2 fw-bolder text-900">
                                    <th>SOLDE À PAYER :</th>
                                    <td id="total_credit_paiement">0 {{getCurrency()->sigle}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                </div>
            </div>

        </form>
    </div>
    <a href="#0" class="cd-popup-close mt-3"></a>
</div> <!-- cd-popup-container -->


