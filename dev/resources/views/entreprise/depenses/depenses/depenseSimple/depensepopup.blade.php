<input value="{{ $Fournisseurs }}" type="hidden" id="Fournisseurs-depense" />
<input value="{{ $Clients }}" type="hidden" id="Client-depense" />
<input value="{{$CompteComptables}}" type="hidden" id="compte_compta" />
<input value="{{$Taxes}}" type="hidden" id="taxe_value" />
<input value="{{ $SourcesPaiement }}" type="hidden" id="SourcesPaiement-depense" />
<input value="{{ $ModesPaiements }}" type="hidden" id="ModePaiement-depense" />
<input type="hidden" id="id-depense-simple" />
<input hidden class="form-control" name="cheque" id="type-depense" type="text" value="depense" />

<div class="cd-popup-container">
    <div class="card-body ">
        <form method="" action="" enctype="multipart/form-data">
            <div class="row col-md-12 d-flex justify-content-between gx-3 mb-3">
                <div class="d-flex mb-4 justify-content-between">
                    <h4>{{__('messages.simple_expense')}} {{__('messages.no')}} <span id="depense_number_edit" style="color: red!important"></span></h4>

                    <div>
                        <button class="btn btn-success btn-depenseSimple-submit">{{__('messages.edit')}} </button>
                        <div class="btn-group">
                            <button class="btn btn-danger" type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false"><i class="fa fa-trash"></i>{{__('messages.delete')}}
                            </button>
                            <div class="dropdown-menu">
                                <a class="btn  btn-delete-cheque" id="id_delete_route_depense" href="">  {{__('messages.confirm_delete_message')}}</a>
                            </div>
                            <a href="#0" class="btn bg-line-chart-gradient text-light cd-popup-close">Fermer</a>

                        </div>
                    </div>

                </div>

            </div>

            <div class="row gx-3 col-md-12 d-flex justify-content-between mb-3">

                <div class="col-md-3" {{-- style="width: 15% !important" --}}>
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                        for="fournisseur">{{__('messages.vendors')}}</label>
                    <select class="form-select mb-3 fournisseurs_list" name="fournisseur" id="fournisseur-depense"
                        aria-label="Default select example">
                    </select>

                </div>

                <div class="col-md-7 d-none d-md-block" {{-- style="width: 75% !important;" --}}></div>
                <div class="col-md-2 flex-end " {{-- style="width: 10% !important" --}}>
                    <span>{{__('messages.amount_to_pay')}}:</span>
                   <h3 id="amount_depense_depenseSimple_pay_update">{{getCurrency()->sigle}} 0.00 </h3>
                </div>



            </div>

            <div class="row gx-3 col-md-12 d-flex justify-content-between  mb-3">

                <div style="width: 15% !important; margin-right:1em !important">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                        for="paiementsource_id">{{__('messages.payment_source')}}</label>
                    <select class="form-select mb-3" name="paiementsource_id" id="paiementsource_depense_update"
                        aria-label="Default select example">
                    </select>
                </div>
                <input hidden type="text" name="type" value="cheque">
                <div style="width: 15% !important; margin-right:1em !important">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                        for="date_facturation">{{__('messages.payment_date')}}</label>
                    <input class="form-control datetimepicker" name="date_facturation"
                        id="date_facturation_depense_update" type="text" />
                </div>
                <div style="width: 15% !important; margin-right:1em !important">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                        for="paiements_mode_depense_id">{{__('messages.payment_mode')}}</label>
                    <select class="form-select mb-3" name="paiements_mode_id" id="paiements_mode_depense_id"
                        aria-label="Default select example">
                    </select>
                </div>
                <div style="width: 37% !important;"></div>

                <div style="width: 15% !important;">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1" for="numero_cheque">{{__('messages.no')}} {{__('messages.reference')}}</label>
                    <input class="form-control" id="numero_reference_depense_update" name="reference" type="number" />
                </div>
            </div>

            <div class="col-md-12">
                <div class="accordion mt-4 mb-4" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="compte_comptable">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse_comptable" aria-expanded="true"
                                aria-controls="collapse_comptable">{{__('messages.accounting_account')}}</button>
                        </h2>
                        <div class="accordion-collapse collapse show" id="collapse_comptable"
                            aria-labelledby="compte_comptable" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="table-responsive scrollbar mt-4 fs--1">
                                    <table class="table table-striped border-bottom">
                                        <thead class="light">
                                            <tr class="bg-line-chart-gradient  text-white dark__bg-1000">
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
                                            class="table-categorie-depense-update" >
                                        </tbody>
                                        <tbody id="test-body2Up" style="padding: 0px !important; margin: 0px !important">

                                            <tr id="row_dep_sim_up_0" style="padding: 0px !important; display:none">
                                                <td>
                                                    <select class="form-select mb-3" id="comptes_comptable_id[]_dep_sim_up_0" name="comptes_comptable_id[]" oninput="calculateDepSimUp('row_dep_sim_up_0')"
                                                        aria-label="Default select example">
                                                        {{-- <option value="" hidden>Choisir une catégorie</option> --}}
                                                        @foreach ($ComptesComptables as $CompteComptable)
                                                        <option value="{{$CompteComptable->id}}">
                                                            {{$CompteComptable->nom}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <input class="form-control" id="decription[]_dep_sim_up_0" name="description[]"
                                                        placeholder="Description" value="-" type="text" />
                                                </td>
                                                <td class="d-none">
                                                    <input class="form-control" id="qte[]_dep_sim_up_0" name="qte[]" oninput="calculateDepSimUp('row_dep_sim_up_0')" placeholder="Quantité"
                                                        type="number" value="1"/>
                                                </td>
                                                <td>
                                                    <input class="form-control" value="0" id="montant[]_dep_sim_up_0" name="montant[]" oninput="calculateDepSimUp('row_dep_sim_up_0')" placeholder="Montant"
                                                        type="number" />
                                                </td>
                                                <td hidden>
                                                    <input class="form-control total_ht_dep_sim_up" name="htDepSim" id="htDepSim_dep_sim_up_0" placeholder="Montant HT"
                                                        type="text" disabled/>
                                                </td>
                                                <td>
                                                    <select class="form-select mb-3" name="taxe_id[]" id="taxe_id[]_dep_sim_up_0" oninput="calculateDepSimUp('row_dep_sim_up_0')"
                                                        aria-label="Default select example">
                                                        <option value="-1">{{__('messages.no_taxe')}}</option>
                                                        @foreach ($Taxes as $taxe)
                                                        <option value="{{$taxe->id}}">{{$taxe->nom}}
                                                            ({{$taxe->taux}}%)</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td hidden>
                                                    <input class="form-control total_taxe_dep_sim_up" name="taxeDepSim" id="taxeDepSim_dep_sim_up_0" placeholder="Montant Taxe"
                                                    type="text" disabled/>
                                                </td>
                                                <td>
                                                    <input class="form-control ttc_dep_sim_up" name="ttcDepSim" id="ttcDepSim_dep_sim_up_0" placeholder="Montant TTC"
                                                    type="text" disabled/>
                                                </td>
                                                <td><i id="trash_dep_sim_up" data-dep_sim_up = "0" class="fa fa-trash text-danger trash_dep_sim_up"></i>
                                                </td>
                                            </tr>
                                        </tbody>

                                    </table>
                                    <input onClick="addRowDepPanUp('test-body2Up')" class="btn btn-warning" type="button" value='+ Nouvelle ligne' />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item mt-2">
                        <h2 class="accordion-header" id="article">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#article_accordion" aria-expanded="true"
                                aria-controls="article_accordion">{{__('messages.products_services')}}</button>
                        </h2>
                        <div class="accordion-collapse collapse show" id="article_accordion" aria-labelledby="article"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="table-responsive scrollbar mt-4 fs--1">
                                    <table id="test-table-article" class="table table-striped border-bottom">
                                        <thead class="light">
                                            <tr class="bg-line-chart-gradient  text-white dark__bg-1000">

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
                                        <tbody id="table-depsimp-update"
                                            style="padding: 0px !important; margin: 0px !important" class="table-depsimp-update">
                                        </tbody>
                                        <tbody id="depsimple-article-up" style="padding: 0px !important; margin: 0px !important;">
                                            <tr id='row_depsimArUp_0' style="padding: 0px !important; display: none">
                                                <td>
                                                    <select class="form-select mb-3" id="article_id[]_depsimArUp_0" name="article_id[]"
                                                        aria-label="Default select example" oninput="calculateArDepSimUp('row_depsimArUp_0')">
                                                        <option value="" hidden>{{__('messages.chose_item')}}</option>
                                                        @foreach ($Articles as $Article)
                                                        <option value="{{$Article->id}}">
                                                            {{$Article->nom}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <input class="form-control" id="decription_article[]_depsimArUp_0" name="description_article[]"
                                                        placeholder="Description" type="text" oninput="calculateArDepSimUp('row_depsimArUp_0')"/>
                                                </td>
                                                <td>
                                                    <input class="form-control" id="qte_article[]_depsimArUp_0" name="qte_article[]" placeholder="quantité"
                                                        type="number" value="1" oninput="calculateArDepSimUp('row_depsimArUp_0')"/>
                                                </td>
                                                <td>
                                                    <input class="form-control" id="montant_article[]_depsimArUp_0" name="montant_article[]" placeholder="Montant"
                                                        type="number" oninput="calculateArDepSimUp('row_depsimArUp_0')"/>
                                                </td>
                                                <td hidden>
                                                    <input class="form-control total_ht_ar" name="ht" id="ht_depsimArUp_0" placeholder="Prix HT"
                                                        type="text" disabled/>
                                                </td>
                                                <td>
                                                    <select class="form-select mb-3" name="taxe_article[]" id="taxe_article[]_depsimArUp_0"
                                                        aria-label="Default select example" oninput="calculateArDepSimUp('row_depsimArUp_0')">
                                                        <option value="-1" hidden>{{__('messages.no_taxe')}}</option>
                                                        @foreach ($Taxes as $taxe)
                                                        <option value="{{$taxe->id}}">{{$taxe->nom}}
                                                            ({{$taxe->taux}}%)</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td hidden>
                                                    <input class="form-control total_taxe_ar" name="taxe" id="taxe_depsimArUp_0" placeholder="Montant Taxe"
                                                        type="text" disabled/>
                                                </td>
                                                <td>
                                                    <input class="form-control ttc_ar" name="ttc" id="ttc_depsimArUp_0" placeholder="Montant TTC"
                                                        type="text" disabled/>
                                                </td>
                                                <td><i id="trash_depsimArUp_up" data-ar-up="0" class="fa fa-trash text-danger trash_depsimArUp_up"></i>
                                                </td>
                                            </tr>
                                        </tbody>

                                    </table>
                                    <input onClick="addRowArDepSimUp('depsimple-article-up')"  class="btn btn-warning" type="button"
                                        value='+ Nouvelle ligne' />
                                    <input value="{{$CompteComptables}}" type="hidden" id="compte_compta" />
                                    <input value="{{$Taxes}}" type="hidden" id="taxe_value" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row mt-4 gx-3 col-md-12 d-flex justify-content-between mb-3">

                <div class="col-md-3 col-12">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1" for="note">{{__('messages.memo')}}</label>
                    <textarea name="note" id="memo_depense_update" class="form-control" cols="30" id="note"
                        rows="4"> </textarea>
                </div>
                <div class="col-md-3 col-12">

                    <div class="mt-2 col-md-12">
                        <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                            for="cardNumber">{{__('messages.pj')}}</label>
                            <input  class="form-control" name="fichier" id="customFile" type="file" />

                    </div>
                    <button class="btn btn-primary mt-3" type="button" data-bs-toggle="modal" data-bs-target="#depenseSimplePieceJoint">{{__('messages.see_pj')}}</button>
                    <div class="modal fade" id="depenseSimplePieceJoint" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg mt-6" role="document">
                            <div class="modal-content shadow-lg">

                            <div class="modal-body  p-0 bg-light" >
                                <div class="bg-light p-2 d-flex justify-content-between rounded-top-lg ">
                                <h4 class="mb-1" id="staticBackdropLabel">Pièce jointe</h4>
                                <button class=" btn btn-sm btn-danger d-flex flex-center " data-bs-dismiss="modal" aria-label="Close">{{__('messages.close')}}</button>

                                {{-- <p class="fs--2 mb-0">Added by <a class="link-600 fw-semi-bold" href="#!">Antony</a></p> --}}
                                </div>
                                <div class="">
                                    <iframe id="pj_depense_depenseSimple" src="#" width="100%" height="600px"> </iframe>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-3 d-none d-md-block"></div>

                <div class=" col-md-3 col-12 bg-line-chart-gradient ">
                    <div class="col-auto mt-3">
                        <table class="table table-sm table-borderless fs--1 text-end">
                            <tr>
                                <th class="text-light">{{__('messages.sub_total')}}:</th>
                                <td class="fw-semi-bold text-light" id="total_sans_taxe_depense">0.00 {{getCurrency()->sigle}}</td>
                                <input class="total_ht" id="tot_ht_dep_sim_update" hidden/>
                            </tr>
                            <tr>
                                <th class="text-light" id="taux_taxe_depense">{{__('messages.taxe_amount')}}:</th>
                                <td class="fw-semi-bold text-light" id="taxe_depense">0 {{getCurrency()->sigle}}</td>
                                <input class="taxe" id="tot_taxe_dep_sim_update" hidden/>
                            </tr>

                            <tr class="border-top border-top-2 fw-bolder text-light">
                                <th class="text-light">{{__('messages.amount_to_paye')}}:</th>
                                <td id="total_depense" class="text-light">0 {{getCurrency()->sigle}}</td>
                                <input class="tot_dep" id="tsanstaxe_dep_sim_update" hidden/>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div> <!-- cd-popup-container -->
