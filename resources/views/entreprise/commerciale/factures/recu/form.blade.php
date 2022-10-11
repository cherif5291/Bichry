<div class="cd-popup-container">
    <div class="card-body ">
        <form action="{{route('entreprise.facture.depenseFactureAdd')}}" method="POST" enctype="multipart/form-data">@csrf

            <input hidden type="text" name="type" value="recu">

            <div class="row col-md-12 d-flex justify-content-between gx-3 mb-3">
                <div class="d-flex mb-4 justify-content-between">
                    <h4>Reçu N° <span id="get_recu_number" style="color: red!important"></span></h4>
                    <div class="d-flex justify-content-between">
                        <div class="mr-1">
                            <button type="submit" class="btn btn-success mr-1" style="margin-right: 1em !important">{{__('messages.save')}} </button>

                        </div>
                        <a href="#0" class="btn bg-line-chart-gradient text-light cd-popup-close">Fermer</a>

                    </div>

                </div>

            </div>

            <div class="row col-md-12 d-flex justify-content-between gx-3 mb-3">
                <div class="col-md-2 col-6">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                        for="fournisseur">{{__('messages.client')}}</label>
                    <select class="form-select mb-3" name="fournisseur" id="fournisseur"
                        aria-label="Default select example" required>

                        @foreach ($Clients as $client)
                        <option value="" hidden>{{__('messages.chose_client')}}</option>
                        <option value="{{'C'.$client->id}}">{{$client->entreprise}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 col-6">
                    <span class="form-check form-switch"  for="cc_cci" style="margin-bottom: 0px !important">
                        <input class="form-check-input" id="flexSwitchCheckChecked" type="checkbox" checked="" />
                        <label style="margin-bottom: 0px !important" class="form-check-label" for="flexSwitchCheckChecked">CC CCI ({{__('messages.send_receipt')}})</label>
                    </span>
                    <textarea class="form-control" name="cc_cci" id="cc_cci" cols="30" rows="1"></textarea>
                </div>

                <div class="col-md-5 col-6 d-none d-md-block"></div>
                <div class="col-md-2 col-6 d-none d-md-block">
                    <span>{{__('messages.amount_to_pay')}}:</span>
                   <h3 id="amount_commercial_recu_pay">{{getCurrency()->sigle}} 0.00 </h3>
                </div>

            </div>


            <div class="row gx-3 col-md-12 d-flex justify-content-start  mb-3">

                <div class="col-md-2 col-6">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                        for="cardNumber">{{__('messages.payment_mode')}}</label>
                    <select class="form-select mb-3" name="paiements_mode_id" id="paiements_mode_id"
                        aria-label="Default select example">
                        <option value="" hidden>{{__('messages.chose_a_payment_mode')}}</option>
                        @foreach ($ModesPaiements as $key=>$Modalite)
                        <option value="{{$Modalite->id}}" {{$key==0 ? 'selected' : '' }}>{{$Modalite->nom}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2 col-6">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                        for="cc_cci">{{__('messages.reference')}}
                    </label>
                    <input class="form-control" name="reference" id="reference" type="text" />
                </div>

                <div class="col-md-2 col-6">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                        for="paiement_source_id">{{__('messages.payment_source')}}</label>
                    <select class="form-select mb-3" name="paiement_source_id" id="paiement_source_id"
                        aria-label="Default select example">
                        <option value="">{{__('messages.chose')}}</option>
                        @foreach ($SourcesPaiement as $source)
                        <option value="{{$source->id}}">({{$source->type}}) {{$source->nom}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2 col-6">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                        for="date_facturation">{{__('messages.invoice_date')}}</label>
                    <input class="form-control datetimepicker" name="date_facturation"
                        value="{{ \Carbon\Carbon::now() }}" id="date_facturation" type="text" />
                </div>
                <div class="col-md-2 col-6 d-md-block d-none"></div>
                <div class="col-md-2 col-6">
                    <div>
                        <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                            for="numero_recu">{{__('messages.receipt')}} {{__('messages.no')}} </label>
                        <input class="form-control" id="numero_recu" name="numero_recu" type="text" />
                    </div>
                    {{-- <div>
                        <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                            for="cc_cci">{{__('messages.reference')}}
                        </label>
                        <input class="form-control" name="reference" id="reference" type="text" />
                    </div> --}}
                </div>
            </div>

            <div class="col-md-12">
                <div class="table-responsive scrollbar mt-4 fs--1">
                    <table id="test-table" class="table table-striped border-bottom">
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
                        <tbody id="table-recu" style="padding: 0px !important; margin: 0px !important">

                            <tr id="row_recu_0" style="padding: 0px !important; ">
                                <td style="margin-left: 0px !important; padding-left:0px !important">
                                    <select class="form-select mb-3" id="article_id[]_recu_0" name="article_id[]"
                                        oninput="calculateRecu('row_recu_0')" aria-label="Default select example">
                                        <option value="" hidden>Choisir une article</option>
                                        @foreach ($Articles as $Article)
                                        <option value="{{$Article->id}}">
                                            {{$Article->nom}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input class="form-control" id="decription[]_recu_0" name="description[]"
                                        placeholder="Description" type="text" />
                                </td>
                                <td class="d-non">
                                    <input class="form-control" id="qte[]_recu_0" name="qte[]"
                                        oninput="calculateRecu('row_recu_0')" placeholder="Quantité" type="number"
                                        value="1" />
                                </td>
                                <td>
                                    <input class="form-control" id="montant[]_recu_0" value="0" name="montant[]"
                                        oninput="calculateRecu('row_recu_0')" placeholder="Montant" type="number" />
                                </td>
                                <td hidden>
                                    <input class="form-control total_ht_recu" name="htRecu" id="htRecu_recu_0"
                                        placeholder="Montant HT" type="text" disabled />
                                </td>
                                <td>
                                    <select class="form-select mb-3" name="taxe_id[]" id="taxe_id[]_recu_0"
                                        oninput="calculateRecu('row_recu_0')" aria-label="Default select example">
                                        <option value="-1">Pas de taxe</option>
                                        @foreach ($Taxes as $taxe)
                                        <option value="{{$taxe->id}}">{{$taxe->nom}}
                                            ({{$taxe->taux}}%)</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td hidden>
                                    <input class="form-control total_taxe_recu" name="taxeRecu" id="taxeRecu_recu_0"
                                        placeholder="Montant Taxe" type="text" disabled />
                                </td>
                                <td>
                                    <input class="form-control ttc_recu" name="ttcRecu" id="ttcRecu_recu_0"
                                        placeholder="Montant TTC" type="text" disabled />
                                </td>
                                <td><i id="trash_recu" data-recu_id="0" class="fa fa-trash text-danger trash_recu"></i>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                    <input onClick="addRowRecu('table-recu')" class="btn btn-warning" type="button"
                        value='+ Nouvelle ligne' />
                    <input value="{{$ComptesComptables}}" type="hidden" id="compte_compta" />
                    <input value="{{$Taxes}}" type="hidden" id="taxe_value_recu" />
                </div>

                <div class="row justify-content-end">

                </div>

            </div>
            <div class="row mt-4 gx-3 col-md-12 d-flex justify-content-between mb-3">

                <div class="col-md-3 col-6">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1" for="message">Message
                        sur la facture</label>
                    <textarea name="message" id="" class="form-control" cols="30" id="message" rows="4"> </textarea>
                </div>
                <div class="col-md-3 col-6">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                        for="message_affiche">Message affiché sur le relevé</label>
                    <textarea name="message_affiche" id="" class="form-control" cols="30" id="message_affiche"
                        rows="4"></textarea>
                </div>
                <div class="col-md-3 col-12">
                    <div class="mt-2">
                        <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                            for="cardNumber">Pièce Jointe</label>
                        <input  class="form-control" name="fichier"  id="customFile" type="file" />

                    </div>
                </div>


                <div class="col-md-3 col-12 bg-line-chart-gradient">
                    <div class="col-auto mt-3">
                        <table class="table table-sm table-borderless fs--1 text-end">
                            <tr>
                                <th class="text-light">Sous Total:</th>
                                <td class="fw-semi-bold text-light total_sans_taxe_recu">0.00 {{getCurrency()->sigle}}</td>
                            </tr>
                            <tr>
                                <th class="text-light">Taxe:</th>
                                <td class="fw-semi-bold text-light taxe_value_recu">0 {{getCurrency()->sigle}}</td>
                            </tr>

                            <tr class="border-top border-top-2 fw-bolder text-light">
                                <th>SOLDE À PAYER :</th>
                                <td class="total_ttc_recu text-light">0 {{getCurrency()->sigle}}*</td>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>

        </form>
    </div>
</div> <!-- cd-popup-container -->
