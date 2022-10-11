<input value="{{ $Fournisseurs }}" type="hidden" id="FournisseursPop2" />
<input value="{{ $Clients }}" type="hidden" id="ClientPop2" />
<input value="{{ $Modalites }}" type="hidden" id="ModalitesPop2" />
<input hidden class="form-control" name="type" id="typePop2" type="text" value="facture" />
<input class="form-control" id="idPop2" type="text" hidden />
<input class="form-control" name="depense_id" id="depense_idPop2" hidden type="text" />

<div class="cd-popup-container">
    <div class="card-body ">
        <form method="" action="" enctype="multipart/form-data">
            <div class="row col-md-12 d-flex justify-content-between gx-3 mb-3">
                <div class="d-flex mb-4 justify-content-between">
                    <h4>{{__('messages.invoice_to_pay')}} {{__('messages.no')}} <span id="get_facture_number_popup2" style="color: red!important"></span></h4>

                    <div>
                        <button class="btn btn-success btn-depensePop2-submit">{{__('messages.update')}} </button>
                        <div class="btn-group">
                            <button class="btn btn-danger" type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">{{__('messages.delete')}}
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item text-danger" id="id_delete_route_facture_depense" href="{{route('depenses.destroy', '#')}}" style="font-weight: 900">{{__('messages.confirm_delete_message')}}</a>
                                {{-- @include('layouts.admin.required.includes.errazer') --}}
                            </div>
                            <a href="#0" class="btn bg-line-chart-gradient text-light cd-popup-close">Fermer</a>

                        </div>
                    </div>

                </div>
                <div class="col-md-2 col-6">
                    {{-- @dd($Facture) --}}
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                        for="fournisseur">{{__('messages.vendors')}}</label>
                    <select class="form-select mb-3 fournisseurs_list" name="fournisseur" id="fournisseurPop2"
                        aria-label="Default select example">
                    </select>

                </div>
                <div class="col-md-2 col-6 d-md-block d-none"></div>

                <div class="col-md-2 col-6 d-md-block d-none">
                    <span >{{__('messages.amount_to_pay')}}:</span>
                   <h3 id="amount_depense_facture_pay_update">0.00 {{getCurrency()->sigle}}</h3>
                </div>
            </div>

            <div class="row gx-3 col-md-12 d-flex justify-content-between mb-3">
                <div class="col-md-4" hidden>
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                        for="adresse_facturation">{{__('messages.postal_address')}}</label>
                    <input class="form-control" name="adresse_facturation" id="adresse_facturationPop2" type="text" />

                </div>

                <div class="col-md-2 col-6">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                        for="has_taxe">{{__('messages.amount_show_with')}}</label>
                    <select class="form-select mb-3" name="has_taxe" id="has_taxePop2"
                        aria-label="Default select example">
                        <option>{{__('messages.taxe_not_inclued')}}</option>
                        <option>{{__('messages.taxe_inclued')}}</option>
                        <option>{{__('messages.no_taxe')}}</option>


                    </select>
                </div>



                <div class="col-md-2 col-6">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                        for="cardNumber">{{__('messages.modality')}}</label>
                    <select class="form-select mb-3" name="paiements_modalite_id" id="modalitePop2"
                        aria-label="Default select example">

                    </select>
                </div>
                <div class="col-md-2 col-6">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                        for="date_facturation">{{__('messages.invoice_date')}}</label>
                    <input class="form-control datetimepicker" name="date_facturation" id="date_facturationPop2"
                        data-options='{"disableMobile":true}' type="text" />
                </div>
                <div class="col-md-2 col-6">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1" for="echeance">{{__('messages.du_date')}}</label>
                    <input class="form-control datetimepicker" data-options='{"disableMobile":true}' name="echeance"
                        id="echeancePop2" type="text" />
                </div>
                <div class="col-md-2 d-none d-md-block">

                </div>

                <div class="col-md-2 col-6">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1" for="numero_facture">{{__('messages.invoice_to_pay')}} {{__('messages.no')}}</label>
                    <input class="form-control" id="numero_facturePop2" name="numero_facture" type="text" />
                </div>


            </div>



            <div class="col-md-12">
                <div class="accordion mt-4 mb-4" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="compte_comptable">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse_comptable" aria-expanded="true"
                                aria-controls="collapse_comptable">Détails de la transaction</button>
                        </h2>
                        <div class="accordion-collapse collapse show" id="collapse_comptable"
                            aria-labelledby="compte_comptable" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="table-responsive scrollbar  fs--1">
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
                                        <tbody> 

                                        </tbody>
                                        <tbody>

                                            <tr id="row_com_up_0" style="padding: 0px !important; display: none">
                                                <td style="margin-left: 5px !important; padding-left:5px !important">
                                                    <select class="form-select mb-3" id="comptes_comptable_id[]_up_0"
                                                        name="comptes_comptable_id[]"
                                                        aria-label="Default select example"
                                                        oninput="calculateComUp('row_com_up_0')">
                                                        {{-- <option value="" hidden>Choisir une catégorie</option> --}}
                                                        @foreach ($CompteComptables as $CompteComptable)
                                                        <option value="{{$CompteComptable->id}}">
                                                            {{$CompteComptable->nom}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <input class="form-control" id="decription[]_up_0"
                                                        name="description[]" oninput="calculateComUp('row_com_up_0')"
                                                        placeholder="Description" type="text" />
                                                </td>
                                                <td class="d-none">
                                                    <input class="form-control" id="qte[]_up_0" name="qte[]" value="1"
                                                        oninput="calculateComUp('row_com_up_0')" placeholder="Quantité"
                                                        type="number" />
                                                </td>
                                                <td >
                                                    <input class="form-control" id="montant[]_up_0" name="montant[]"
                                                        placeholder="Montant" type="number" value="0"
                                                        oninput="calculateComUp('row_com_up_0')" />
                                                </td>
                                                <td class="d-none">
                                                    <input class="form-control total_ht_com_up" name="total_ht"
                                                        id="total_ht_up_0" placeholder="Prix HT" type="text" disabled />
                                                </td>
                                                <td>
                                                    <select class="form-select mb-3" name="taxe_id[]"
                                                        oninput="calculateComUp('row_com_up_0')"
                                                        aria-label="Default select example" id="taxe_id[]_up_0">
                                                        <option value="-1" hidden>{{__('messages.chose_taxe')}}</option>
                                                        @foreach ($Taxes as $taxe)
                                                        <option value="{{$taxe->id}}">{{$taxe->nom}}
                                                            ({{$taxe->taux}}%)</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td class="d-none">
                                                    <input class="form-control total_taxe_com_up" name="total_taxe"
                                                        id="total_taxe_up_0" placeholder="Montant Taxe" type="text"
                                                        disabled />
                                                </td>
                                                <td>
                                                    <input class="form-control ttc_com_up" name="ttc" id="ttc_up_0"
                                                        placeholder="Montant TTC" type="text" disabled />
                                                </td>
                                                <td><i id="trash_com_up" data-com-up="0"
                                                        class="fa fa-trash text-danger trash_com_up"></i>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <input onClick="addRowComUp('test-body-up')" class="btn btn-warning" type="button"
                                        value='+ Nouvelle ligne' />
                                    <input value="{{$CompteComptables}}" type="hidden" id="compte_compta" />
                                    <input value="{{$Taxes}}" type="hidden" id="taxe_value" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item" hidden>
                        <h2 class="accordion-header" id="article">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#article_accordion" aria-expanded="true"
                                aria-controls="article_accordion">{{__('messages.products_services')}}</button>
                        </h2>
                        <div class="accordion-collapse collapse show" id="article_accordion" aria-labelledby="article"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="table-responsive scrollbar  fs--1">
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
                                        <tbody id="test-bodyPop2"
                                            style="padding: 0px !important; margin: 0px !important" class="tablePop3">
                                        </tbody>
                                        <tbody id="facture-article-up" style="padding: 0px !important; margin: 0px !important;">
                                            <tr id='row_ar_0' style="padding: 0px !important; display: none">
                                                <td style="margin-left: 5px !important; padding-left:5px !important">
                                                    <select class="form-select mb-3" id="article_id[]_ar_0" name="article_id[]"
                                                        aria-label="Default select example" oninput="calculateArUp('row_ar_0')">
                                                        <option value="" hidden>{{__('messages.chose_item')}}</option>
                                                        @foreach ($Articles as $Article)
                                                        <option value="{{$Article->id}}">
                                                            {{$Article->nom}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <input class="form-control" id="decription_article[]_ar_0" name="description_article[]"
                                                        placeholder="Description" type="text" oninput="calculateArUp('row_ar_0')"/>
                                                </td>
                                                <td>
                                                    <input class="form-control" id="qte_article[]_ar_0" name="qte_article[]" placeholder="quantité"
                                                        type="number" value="1" oninput="calculateArUp('row_ar_0')"/>
                                                </td>
                                                <td>
                                                    <input class="form-control" id="montant_article[]_ar_0" name="montant_article[]" placeholder="Montant"
                                                        type="number" oninput="calculateArUp('row_ar_0')"/>
                                                </td>
                                                <td class="d-none">
                                                    <input class="form-control total_ht_ar" name="ht" id="ht_ar_0" placeholder="Prix HT"
                                                        type="text" disabled/>
                                                </td>
                                                <td>
                                                    <select class="form-select mb-3" name="taxe_article[]" id="taxe_article[]_ar_0"
                                                        aria-label="Default select example" oninput="calculateArUp('row_ar_0')">
                                                        <option value="-1" hidden>{{__('messages.no_taxe')}}</option>
                                                        @foreach ($Taxes as $taxe)
                                                        <option value="{{$taxe->id}}">{{$taxe->nom}}
                                                            ({{$taxe->taux}}%)</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td class="d-none">
                                                    <input class="form-control total_taxe_ar" name="taxe" id="taxe_ar_0" placeholder="Montant Taxe"
                                                        type="text" disabled/>
                                                </td>
                                                <td>
                                                    <input class="form-control ttc_ar" name="ttc" id="ttc_ar_0" placeholder="Montant TTC"
                                                        type="text" disabled/>
                                                </td>
                                                <td><i id="trash_ar_up" data-ar-up="0" class="fa fa-trash text-danger trash_ar_up"></i>
                                                </td>
                                            </tr>
                                        </tbody>

                                    </table>
                                    <input onClick="addRowArUp('facture-article-up')"  class="btn btn-warning" type="button"
                                        value='+ Nouvelle ligne' />
                                    <input value="{{$CompteComptables}}" type="hidden" id="compte_compta" />
                                    <input value="{{$Taxes}}" type="hidden" id="taxe_value" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
            <div class="row gx-3 col-md-12 d-flex justify-content-between mb-3">

                <div class="col-md-3 col-6">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1" for="note">{{__('messages.memo')}}</label>
                    <textarea name="note" id="memoPop2" class="form-control" cols="30" id="note" rows="4"> </textarea>
                </div>
                <div class="col-md-3 col-6">

                    <div class="mt-2 col-md-12">
                        <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                            for="cardNumber">{{__('messages.pj')}}</label>
                            <input  class="form-control" name="fichier" id="customFile" type="file" />

                    </div>
                    <button class="btn btn-primary mt-3" type="button" data-bs-toggle="modal" data-bs-target="#depensefacturePieceJoint">{{__('messages.see_pj')}}</button>
                    <div class="modal fade" id="depensefacturePieceJoint" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg mt-6" role="document">
                            <div class="modal-content shadow-lg">

                            <div class="modal-body  p-0 bg-light" >
                                <div class="bg-light p-2 d-flex justify-content-between rounded-top-lg ">
                                <h4 class="mb-1" id="staticBackdropLabel">Pièce jointe</h4>
                                <button class=" btn btn-sm btn-danger d-flex flex-center " data-bs-dismiss="modal" aria-label="Close">{{__('messages.close')}}</button>

                                {{-- <p class="fs--2 mb-0">Added by <a class="link-600 fw-semi-bold" href="#!">Antony</a></p> --}}
                                </div>
                                <div class="">
                                    <iframe id="pj_depense_facture" src="#" width="100%" height="600px"> </iframe>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="col-md-3 d-md-block d-none"></div>
                <div class="col-md-3 col-12 bg-line-chart-gradient">
                    <div class="col-auto mt-3">
                        <table class="table table-sm table-borderless fs--1 text-end">
                            <tr>
                                <th class="text-light">{{__('messages.sub_total')}}:</th>
                                <td class="fw-semi-bold text-light" id="total_sans_taxe_facture">0 {{getCurrency()->sigle}}</td>
                                <input class="ht" id="ht" hidden />
                            </tr>
                            <tr>
                                <th class="text-light" id="taux_taxe_facture">{{__('messages.taxe_amount')}}:</th>
                                <td class="fw-semi-bold text-light" id="taxe_facture">0 {{getCurrency()->sigle}}*</td>
                                <input class="tax" id="tax" hidden />
                            </tr>

                            <tr class="border-top border-top-2 fw-bolder text-light">
                                <th class="text-light">{{__('messages.amount_to_paye')}}:</th>
                                <td id="total_facture" class="text-light">0 {{getCurrency()->sigle}}*</td>
                                <input class="tot" id="tot" hidden />
                            </tr>
                        </table>
                    </div>
                </div>



            </div>
        </form>
    </div>
</div> <!-- cd-popup-container -->
