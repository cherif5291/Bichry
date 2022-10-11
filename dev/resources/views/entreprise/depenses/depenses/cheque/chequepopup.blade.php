<input value="{{ $Fournisseurs }}" type="hidden" id="Fournisseurs-cheque" />
<input value="{{ $Clients }}" type="hidden" id="Client-cheque" />
<input value="{{ $SourcesPaiement }}" type="hidden" id="SourcesPaiement-cheque" />
<input type="hidden" id="id-cheque" />
<input type="hidden" id="id-depense" />
<input hidden class="form-control" name="cheque" id="type-cheque" type="text" value="cheque" />

<div class="cd-popup-container">
    <div class="card-body ">
        <form method="" action="" enctype="multipart/form-data">
            <div class="row col-md-12 d-flex justify-content-between gx-3 mb-3">
                <div class="d-flex mb-4 justify-content-between">
                    <h4>{{__('messages.check')}} {{__('messages.no')}} <span id="get_cheque_number_edit" style="color: red!important"></span></h4>

                    <div>
                        <button class="btn btn-success btn-cheque-submit">{{__('messages.edit')}}  </button>
                        <div class="btn-group">
                            <button class="btn btn-danger" type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false"><i class="fa fa-trash"></i>{{__('messages.delete')}}
                            </button>
                            <div class="dropdown-menu">
                                <a id="id_delete_route_cheque" href="">  {{__('messages.confirm_delete_message')}}</a>
                            </div>
                            <a href="#0" class="btn bg-line-chart-gradient text-light cd-popup-close">Fermer</a>

                        </div>
                    </div>

                </div>

            </div>

            <div class="row gx-3 col-md-12 d-flex justify-content-between mb-3">
                <div   class="col-md-2 col-6">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                        for="fournisseur">{{__('messages.vendors')}}</label>
                    <select class="form-select mb-3 fournisseurs_list" name="fournisseur" id="fournisseur-cheque"
                        aria-label="Default select example">
                    </select>
                </div>
                <div class="col-md-8 col-6 d-none d-md-block"></div>
                <div class="col-md-2 col-6">
                    <span>{{__('messages.amount_to_pay')}}:</span>
                   <h3 id="amount_depense_cheque_pay_update">{{getCurrency()->sigle}} 0.00 </h3>
                </div>

            </div>

            <div class="row gx-3 col-md-12 d-flex justify-content-between  mb-3">
                <div class="col-md-2 col-6">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                        for="paiementsource_id">{{__('messages.payment_source')}}</label>
                    <select class="form-select mb-3" name="paiementsource_id" id="paiementsource_id_update"
                        aria-label="Default select example">
                    </select>
                </div>
                <input hidden type="text" name="type" value="cheque">
                <div class="col-md-2 col-6">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                        for="date_facturation">{{__('messages.payment_date')}}</label>
                    <input class="form-control datetimepicker" name="date_facturation"
                        id="date_facturation_cheque_update" type="text" />
                </div>
                <div class="col-md-6" hidden>
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                        for="adresse_postale">{{__('messages.postal_address')}}</label>
                    <input class="form-control" id="adresse_postale_cheque_update" name="adresse_postale" type="text" />
                </div>
                <div class="col-md-6 col-6 d-md-block d-none"></div>

                <div class="col-md-2 col-6">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1" for="numero_cheque">{{__('messages.check')}} {{__('messages.no')}}</label>
                    <input class="form-control" id="numero_cheque_update" name="numero_cheque" type="number" />
                </div>
            </div>

            <div class="col-md-12">
                <div class="accordion mt-4 mb-4" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="compte_comptable_cheque">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse_comptable" aria-expanded="true"
                                aria-controls="collapse_comptable">{{__('messages.accounting_account')}}</button>
                        </h2>
                        <div class="accordion-collapse collapse show" id="collapse_comptable"
                            aria-labelledby="compte_comptable_cheque" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="table-responsive scrollbar mt-4 fs--1">
                                    <table class="table table-striped border-bottom">
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
                                        <tbody style="padding: 0px !important; margin: 0px !important"
                                            class="table-categorie-cheque-update" id="table-categorie-cheque-update">
                                        </tbody>
                                        <tbody id="cheque-categorie-table-up"
                                            style="padding: 0px !important; margin: 0px !important">

                                            <tr id="row_cheque_up_0" style="padding: 0px !important; display:none">
                                                <td>
                                                    <select class="form-select mb-3"
                                                        id="comptes_comptable_id[]_cheque_up_0"
                                                        name="comptes_comptable_id[]"
                                                        oninput="calculateChequeUp('row_cheque_up_0')"
                                                        aria-label="Default select example">
                                                        <option value="" hidden>{{__('messages.chose_category')}}</option>
                                                        @foreach ($ComptesComptables as $CompteComptable)
                                                        <option value="{{$CompteComptable->id}}">
                                                            {{$CompteComptable->nom}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <input class="form-control" id="decription[]_cheque_up_0"
                                                        name="description[]" placeholder="Description" value="-"
                                                        type="text" />
                                                </td>
                                                <td class="d-none">
                                                    <input class="form-control" id="qte[]_cheque_up_0" name="qte[]"
                                                        oninput="calculateChequeUp('row_cheque_up_0')"
                                                        placeholder="Quantité" type="number" value="1" />
                                                </td>
                                                <td>
                                                    <input class="form-control" id="montant[]_cheque_up_0" value="0"
                                                        name="montant[]" oninput="calculateChequeUp('row_cheque_up_0')"
                                                        placeholder="Montant" type="number" />
                                                </td>
                                                <td hidden>
                                                    <input class="form-control total_ht_cheque_up" name="htCheque"
                                                        id="htCheque_cheque_up_0" placeholder="Montant HT" type="text"
                                                        disabled />
                                                </td>
                                                <td>
                                                    <select class="form-select mb-3" name="taxe_id[]"
                                                        id="taxe_id[]_cheque_up_0"
                                                        oninput="calculateChequeUp('row_cheque_up_0')"
                                                        aria-label="Default select example">
                                                        <option value="-1">{{__('messages.no_taxe')}}</option>
                                                        @foreach ($Taxes as $taxe)
                                                        <option value="{{$taxe->id}}">{{$taxe->nom}}
                                                            ({{$taxe->taux}}%)</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td hidden>
                                                    <input class="form-control total_taxe_cheque_up" name="taxeCheque"
                                                        id="taxeCheque_cheque_up_0" placeholder="Montant Taxe"
                                                        type="text" disabled />
                                                </td>
                                                <td>
                                                    <input class="form-control ttc_cheque_up" name="ttcCheque"
                                                        id="ttcCheque_cheque_up_0" placeholder="Montant TTC" type="text"
                                                        disabled />
                                                </td>
                                                <td><i id="trash_cheque_up" data-cheque_id="0"
                                                        class="fa fa-trash text-danger trash_cheque_up"></i>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <input onClick="addRowChequeUp('cheque-categorie-table-up')" class="btn btn-warning"
                                        type="button" value='+ Nouvelle ligne' />
                                    <input value="{{$CompteComptables}}" type="hidden" id="compte_compta" />
                                    <input value="{{$Taxes}}" type="hidden" id="taxe_value_cheque_up" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="article">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#article_accordion_cheque" aria-expanded="true"
                                aria-controls="article_accordion_cheque">{{__('messages.products_services')}}</button>
                        </h2>
                        <div class="accordion-collapse collapse show" id="article_accordion_cheque"
                            aria-labelledby="article" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="table-responsive scrollbar mt-4 fs--1">
                                    <table id="test-table-article" class="table table-striped border-bottom">
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
                                        <tbody id="tableArticleCheque"
                                            style="padding: 0px !important; margin: 0px !important"
                                            class="tableArticleCheque">
                                        </tbody>
                                        <tbody id="cheque-article-up"
                                            style="padding: 0px !important; margin: 0px !important;">
                                            <tr id='row_chequeArUp_0' style="padding: 0px !important; display: none">
                                                <td>
                                                    <select class="form-select mb-3" id="article_id[]_chequeArUp_0"
                                                        name="article_id[]" aria-label="Default select example"
                                                        oninput="calculateArChequeUp('row_chequeArUp_0')">
                                                        <option value="" hidden>{{__('messages.chose_item')}}</option>
                                                        @foreach ($Articles as $Article)
                                                        <option value="{{$Article->id}}">
                                                            {{$Article->nom}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <input class="form-control" id="decription_article[]_chequeArUp_0"
                                                        name="description_article[]" placeholder="Description"
                                                        type="text" oninput="calculateArChequeUp('row_chequeArUp_0')" />
                                                </td>
                                                <td>
                                                    <input class="form-control" id="qte_article[]_chequeArUp_0"
                                                        name="qte_article[]" placeholder="quantité"
                                                        type="number" value="1"
                                                        oninput="calculateArChequeUp('row_chequeArUp_0')" />
                                                </td>
                                                <td>
                                                    <input class="form-control" id="montant_article[]_chequeArUp_0"
                                                        name="montant_article[]" placeholder="Montant"
                                                        type="number" oninput="calculateArChequeUp('row_chequeArUp_0')" />
                                                </td>
                                                <td hidden>
                                                    <input class="form-control total_ht_ar" name="ht"
                                                        id="ht_chequeArUp_0" placeholder="Prix HT" type="text"
                                                        disabled />
                                                </td>
                                                <td>
                                                    <select class="form-select mb-3" name="taxe_article[]"
                                                        id="taxe_article[]_chequeArUp_0"
                                                        aria-label="Default select example"
                                                        oninput="calculateArChequeUp('row_chequeArUp_0')">
                                                        <option value="-1" hidden>{{__('messages.no_taxe')}}</option>
                                                        @foreach ($Taxes as $taxe)
                                                        <option value="{{$taxe->id}}">{{$taxe->nom}}
                                                            ({{$taxe->taux}}%)</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td hidden>
                                                    <input class="form-control total_taxe_ar" name="taxe"
                                                        id="taxe_chequeArUp_0" placeholder="Montant Taxe" type="text"
                                                        disabled />
                                                </td>
                                                <td>
                                                    <input class="form-control ttc_ar" name="ttc" id="ttc_chequeArUp_0"
                                                        placeholder="Montant TTC" type="text" disabled />
                                                </td>
                                                <td><i id="trash_chequeArUp_up" data-ar-up="0"
                                                        class="fa fa-trash text-danger trash_chequeArUp_up"></i>
                                                </td>
                                            </tr>
                                        </tbody>

                                    </table>
                                    <input onClick="addRowArChequeUp('cheque-article-up')" class="btn btn-warning"
                                        type="button" value='+ Nouvelle ligne' />
                                    <input value="{{$CompteComptables}}" type="hidden" id="compte_compta" />
                                    <input value="{{$Taxes}}" type="hidden" id="taxe_value" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row justify-content-end">

                </div>

            </div>
            <div class="row mt-4 gx-3 col-md-12 d-flex justify-content-between mb-3">

                <div class="col-md-3 col-6">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1" for="note">{{__('messages.memo')}}</label>
                    <textarea name="note" id="memo_cheque_update" class="form-control" cols="30" id="note"
                        rows="4"> </textarea>
                </div>
                <div class="col-md-3 row col-6">

                    <div class="mt-2 col-md-12">
                        <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                            for="cardNumber">{{__('messages.pj')}}</label>
                            <input  class="form-control" name="fichier" id="customFile" type="file" />

                    </div>
                    <div class="mt-2 col-md-12">
                        <button class="btn ml-3 btn-sm btn-primary mt-1" type="button" data-bs-toggle="modal" data-bs-target="#chequePieceJoint">{{__('messages.see_pj')}}</button>


                    </div>
                    {{-- <div class="mt-3 col-md-4">

                        <div class=" justify-content-end">
                            <button class="btn btn-success btn-cheque-submit">{{__('messages.update')}}</button>
                            @include('layouts.admin.required.includes.errazer')
                        </div>

                    </div> --}}
                    <div class="modal fade" id="chequePieceJoint" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg mt-6" role="document">
                            <div class="modal-content shadow-lg">

                            <div class="modal-body  p-0 bg-light" >
                                <div class="bg-light p-2 d-flex justify-content-between rounded-top-lg ">
                                <h4 class="mb-1" id="staticBackdropLabel">Pièce jointe</h4>
                                <button class=" btn btn-sm btn-danger d-flex flex-center " data-bs-dismiss="modal" aria-label="Close">{{__('messages.close')}}</button>

                                {{-- <p class="fs--2 mb-0">Added by <a class="link-600 fw-semi-bold" href="#!">Antony</a></p> --}}
                                </div>
                                <div class="">
                                    <iframe id="pj_depense_cheque" src="#" width="100%" height="600px"> </iframe>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="col-md-3 d-none d-md-block"></div>
                <div class="col-md-3 col-12 bg-line-chart-gradient">
                    <div class="col-auto mt-3">
                        <table class="table table-sm table-borderless fs--1 text-end">
                            <tr>
                                <th class="text-light">{{__('messages.sub_total')}}:</th>
                                <td class="fw-semi-bold text-light" id="total_sans_taxe_cheque_up">0.00 {{getCurrency()->sigle}}</td>
                                <input class="tot_ht_cheque_up text-light" id="total_ht_cheque_up" hidden />
                            </tr>
                            <tr>
                                <th class="text-light" id="taux_taxe_cheque">{{__('messages.taxe_amount')}}:</th>
                                <td class="fw-semi-bold text-light" id="taxe_cheque_up">0 {{getCurrency()->sigle}}</td>
                                <input class="tax_cheque_up" id="taxes_cheque_up" hidden />
                            </tr>

                            <tr class="border-top border-top-2 fw-bolder text-light">
                                <th class="text-light">{{__('messages.amount_to_paye')}}:</th>
                                <td id="total_cheque_up" class="text-light">0 {{getCurrency()->sigle}}*</td>
                                <input class="tot_cheque_up" id="tot_cheque_up" hidden />
                            </tr>
                        </table>
                    </div>
                </div>


            </div>
        </form>
    </div>
</div> <!-- cd-popup-container -->
