<input value="{{ $Clients }}" type="hidden" id="Clients" />
<input value="{{ $Modalites }}" type="hidden" id="Modalites" />
<input value="{{ $Articles }}" type="hidden" id="Articles" />
<input value="{{ $Taxes }}" type="hidden" id="Taxes" />

<div class="cd-popup-container">
    <div class="card-body ">
        <form method="POST" action="{{route('entreprise.factures.paiement.facture')}}">
            @csrf

            <input name="type" value="facture" hidden />
            <input hidden id="id-facture-paiement" name="id" />

            <div class="row col-md-12 d-flex justify-content-between gx-3 mb-3">
                <div class="d-flex mb-4 justify-content-between">
                    <h4>Fature N° <span id="facture_number_paiement_update" style="color: indigo !important"></span> <br>

                        <hr>
                        Montant <span id="montant_facture_paiement" > 30004 {{getCurrency()->sigle}}</span> <br>
                        Montant Payé <span id="montant_facture_a_payer_paiement" style="color: green!important">33403 {{getCurrency()->sigle}}</span><br>
                        Montant Dû <span id="montant_du_facture_paiement" style="color: red!important">33403 {{getCurrency()->sigle}}</span>
                    </h4>
                    <div>
                        <button class="btn btn-success" type="submit">Payer </button>
                        <a href="" class="btn btn-danger">Annuler</a>
                    </div>

                </div>


            </div>
            <div class="row col-md-12 d-flex justify-content-between gx-3 mb-3">
                <div class="col-md-4">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                        for="fournisseur">Client</label>
                    <select class="form-select mb-3" name="fournisseur" id="clients_paiement"
                        aria-label="Default select example" disabled>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                        for="fournisseur">Source d'approvisionnement</label>
                    <select class="form-select mb-3" name="paiement_source" aria-label="Default select example">
                        <optgroup label="Banques">
                            @foreach ($Banques as $banque)
                            <option value="B{{$banque->id}}">{{$banque->nom}} | solde:{{$banque->solde}}$</option>
                            @endforeach
                        </optgroup>
                        <optgroup label="Caisses">
                            @foreach ($Caisses as $caisse)
                            <option value="C{{$caisse->id}}">{{$caisse->nom}} | solde:{{$caisse->solde}}$</option>
                            @endforeach
                        </optgroup>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                        for="fournisseur">Montant</label>
                    <input class="form-control" name="montant" type="number" required />
                </div>
            </div>

            <div class="row gx-3 col-md-12 d-flex justify-content-between mb-3">
                <div class="col-md-4">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                        for="adresse_facturation">Adresse de facturation</label>
                    <input class="form-control" name="adresse_facturation" id="adresse_facturation_paiement" type="text"
                        disabled />
                </div>
                <div class="col-md-4">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1" for="cc_cci">CC
                        CCI</label>
                    <input class="form-control" name="cc_cci" id="cc_cci_paiement" type="text" disabled />
                </div>
                <div class="col-md-4">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1" for="numero_facture">Nº
                        de la facture</label>
                    <input class="form-control" id="numero_facture_paiement" name="numero_facture" type="number"
                        disabled />
                </div>

            </div>
            <div class="row gx-3 col-md-12  mb-3">
                <div class="col-md-4">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                        for="cardNumber">Modalité</label>
                    <select class="form-select mb-3" disabled name="paiements_modalite_id" id="modaliteSelect_paiement"
                        aria-label="Default select example">

                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                        for="date_facturation">Date facturation</label>
                    <input class="form-control datetimepicker" name="date_facturation"
                        data-options='{"disableMobile":true}' id="date_facturation_paiement" type="text" disabled />
                </div>
                <div class="col-md-4">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1" for="echeance">Date
                        d'échéance</label>
                    <input class="form-control datetimepicker" name="echeance" id="echeance_paiement" type="text"
                        disabled />
                </div>

            </div>

            <div class="col-md-12">
                <div class="table-responsive scrollbar mt-4 fs--1">
                    <table id="test-table" class="table table-striped border-bottom">
                        <thead class="light">
                            <tr class="bg-primary text-white dark__bg-1000">
                                <th class="border-0">Categorie</th>
                                <th class="border-0">Description</th>
                                <th class="border-0">Quantité</th>
                                <th class="border-0">Montant</th>
                                <th class="border-0">Taxe</th>
                            </tr>
                        </thead>
                        <tbody style="padding: 0px !important; margin: 0px !important"
                            class="table-categorie-facture-com">

                        </tbody>

                    </table>
                    <input value="{{$Articles}}" type="hidden" id="articles" />
                    <input value="{{$Taxes}}" type="hidden" id="taxe_value" />
                </div>

                <div class="row justify-content-end">
                    <div class="col-auto">
                        <table class="table table-sm table-borderless fs--1 text-end">
                            <tr>
                                <th class="text-900">Sous Total:</th>
                                <td class="fw-semi-bold" id="total_sans_taxe_paiement_facture">0.00 {{getCurrency()->sigle}}</td>
                            </tr>
                            <tr>
                                <th class="text-900" id="taux_taxe_paiement_facture">Taxe 0%:</th>
                                <td class="fw-semi-bold" id="taxe_paiement_facture">0 {{getCurrency()->sigle}}</td>
                            </tr>

                            <tr class="border-top border-top-2 fw-bolder text-900">
                                <th>SOLDE À PAYER :</th>
                                <td id="total_paiement_facture">0 {{getCurrency()->sigle}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row gx-3 col-md-12 d-flex justify-content-between mb-3">

                <div class="col-md-12">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1" for="message">Note sur
                        le réglement</label>
                    <textarea name="note" class="form-control" cols="30" id="message_update" rows="4"> </textarea>
                </div>

            </div>
        </form>
    </div>
    <a href="#0" class="cd-popup-close mt-3"></a>
</div> <!-- cd-popup-container -->
