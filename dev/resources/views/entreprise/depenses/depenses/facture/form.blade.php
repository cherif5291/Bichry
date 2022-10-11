

<div class="cd-popup-container  " >
    <div class="card-body  " style="height: 100vh !important">
        <form action="{{route('entreprise.depense.new.DepenseOnPop')}}" method="POST" enctype="multipart/form-data">@csrf
            <div class="row col-md-12 d-flex justify-content-between gx-3 mb-3">
                <div class="d-flex mb-4 justify-content-between">
                    <h4>{{__('messages.invoice_to_pay')}} {{__('messages.no')}} <span id="get_facture_number" style="color: red!important"></span></h4>
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
                <div class="col-md-2 col-6">
                    {{-- @dd($Facture) --}}
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                        for="fournisseur">{{__('messages.vendors')}}</label>
                    <select class="form-select mb-3" name="fournisseur" id="fournisseur"
                        aria-label="Default select example">

                        <option value="" hidden>{{__('messages.chose')}}</option>

                        {{-- <option value="addFournisseur"><button class="btn btn-danger addFournisseur"
                            id="addFournisseur"><span
                                style="color: red!important">+</span>Ajouter</button></option> --}}
                         @foreach ($Fournisseurs as $fournisseur)

                        @php
                        $value = "F".$fournisseur->id;
                        @endphp
                        <option value="{{$value}}">{{$fournisseur->entreprise}}</option>
                        @endforeach
                    </select>

                    <input hidden class="form-control" name="type" id="type" type="text"
                    value="facture" />
                </div>

                <div class="col-md-2 col-6 d-md-block d-none"></div>

                <div class="col-md-2 col-6 d-md-block d-none">
                    <span >{{__('messages.amount_to_pay')}}:</span>
                   <h3 id="amount_depense_facture_pay">{{getCurrency()->sigle}} 0.00 </h3>
                </div>


            </div>

            <div class="row gx-3 col-md-12  mb-3">
                <div class="col-md-2 col-6">
                        <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                        for="has_taxe">{{__('messages.amount_show_with')}}</label>
                    <select class="form-select mb-3" name="has_taxe" id="has_taxe"
                        aria-label="Default select example">
                        <option>{{__('messages.taxe_not_inclued')}}</option>
                        <option>{{__('messages.taxe_inclued')}}</option>
                        <option>{{__('messages.no_taxe')}}</option>


                </select>
                </div>


                <div class="col-md-2 col-6">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                        for="cardNumber">{{__('messages.modality')}}</label>
                    <select class="form-select mb-3" name="paiements_modalite_id" id="paiements_modalite_id"
                        aria-label="Default select example">
                        <option value="" hidden>{{__('messages.chose')}}</option>
                        @foreach ($Modalites as $Modalite)
                        <option value="{{$Modalite->id}}" >{{$Modalite->nom}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2 col-6">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                        for="date_facturation">{{__('messages.invoice_date')}}</label>
                    <input class="form-control datetimepicker" name="date_facturation" value="{{\Carbon\Carbon::now()}}" id="date_facturation" data-options='{"disableMobile":true}' type="text" />
                </div>
                <div class="col-md-2 col-6">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                        for="echeance">{{__('messages.du_date')}}</label>
                    <input class="form-control datetimepicker" data-options='{"disableMobile":true}' name="echeance" id="echeance" type="text"/>
                </div>
                <div class="col-md-2 d-none d-md-block"></div>
                <div class="col-md-2 col-6">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                        for="numero_facture">{{__('messages.invoice_to_pay')}} {{__('messages.no')}}</label>
                    <input class="form-control" id="numero_facture" name="numero_facture" type="number"
                         />
                </div>
            </div>
            <div class="accordion mt-4 mb-4" id="accordionExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="heading1">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">Détails de la transaction</button>
                  </h2>
                  <div class="accordion-collapse collapse show" id="collapse1" aria-labelledby="heading1" data-bs-parent="#accordionExample">
                    <div class="accordion-body" style="padding: 0px !important">
                        <div class="col-md-12 ">
                            <div class="table-responsive scrollbar fs--1">
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
                                    <tbody  >

                                        <tr id="row_com_0" >
                                            <td style="margin-left: 5px !important; padding-left:5px !important">
                                                <select class="form-select mb-3" id="comptes_comptable_id[]_0" name="comptes_comptable_id[]"
                                                    aria-label="Default select example" oninput="calculateCom('row_com_0')">
                                                    <option value="" hidden> {{__('messages.chose_category')}}</option>
                                                    @foreach ($CompteComptables as $CompteComptable)
                                                    <option value="{{$CompteComptable->id}}">
                                                        {{$CompteComptable->nom}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input class="form-control" id="decription[]_0" name="description[]" oninput="calculateCom('row_com_0')" placeholder="Description" type="text" />
                                            </td>
                                            <td class="d-none">
                                                <input class="form-control" id="qte[]_0" name="qte[]" value="1" oninput="calculateCom('row_com_0')" placeholder="Quantité"  type="number" />
                                            </td>
                                            <td>
                                                <input class="form-control" id="montant[]_0" name="montant[]" value="0" placeholder="Montant"
                                                    type="number" oninput="calculateCom('row_com_0')"/>
                                            </td>
                                            <td hidden>
                                                <input class="form-control total_ht_com" name="total_ht" id="total_ht_0" placeholder="Prix HT"
                                                    type="text" disabled/>
                                            </td>
                                            <td>
                                                <select class="form-select mb-3" name="taxe_id[]" oninput="calculateCom('row_com_0')"
                                                    aria-label="Default select example" id="taxe_id[]_0">
                                                    <option value="-1" hidden> {{__('messages.chose_taxe')}}</option>
                                                    @foreach ($Taxes as $taxe)
                                                    <option value="{{$taxe->id}}">{{$taxe->nom}}
                                                        ({{$taxe->taux}}%)</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td hidden>
                                                <input class="form-control total_taxe_com" name="total_taxe" id="total_taxe_0" placeholder="Montant Taxe"
                                                    type="text" disabled/>
                                            </td>
                                            <td>
                                                <input class="form-control ttc_com" name="ttc" id="ttc_0" placeholder="Montant TTC"
                                                    type="text" disabled/>
                                            </td>
                                            <td><i id="trash_com" data-com="0" class="fa fa-trash text-danger trash_com"></i>
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>
                                <input onClick="addRowCom('test-body')" class="btn btn-warning mb-2" type="button" value='+ Nouvelle ligne' />
                                <input value="{{$CompteComptables}}" type="hidden" id="compte_compta"/>
                                <input value="{{$Taxes}}" type="hidden" id="taxe_value"/>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="accordion-item mt-2" hidden>
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
                                    <tbody id="facture-article" style="padding: 0px !important; margin: 0px !important">
                                        <tr id='row_factureAr_0' style="padding: 0px !important; ">
                                            <td style="margin-left: 0px !important; padding-left:0px !important">
                                                <select class="form-select mb-3" id="article_id[]_factureAr_0" name="article_id[]"
                                                    aria-label="Default select example" oninput="calculateDepfac('row_factureAr_0')">
                                                    <option value="" hidden>{{__('messages.chose_item')}}</option>
                                                    @foreach ($Articles as $Article)
                                                    <option value="{{$Article->id}}">
                                                        {{$Article->nom}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input class="form-control" value="-" id="decription_article[]_factureAr_0" name="description_article[]"
                                                    placeholder="Description" type="text" oninput="calculateDepfac('row_factureAr_0')"/>
                                            </td>
                                            <td>
                                                <input class="form-control" id="qte_article[]_factureAr_0" name="qte_article[]" placeholder="quantité"
                                                    type="number" value="1" oninput="calculateDepfac('row_factureAr_0')"/>
                                            </td>
                                            <td>
                                                <input class="form-control" id="montant_article[]_factureAr_0" name="montant_article[]" placeholder="Montant"
                                                    type="number" oninput="calculateDepfac('row_factureAr_0')"/>
                                            </td>
                                            <td hidden>
                                                <input class="form-control total_ht" name="total_ht_dep" id="total_ht_dep_factureAr_0" placeholder="Prix HT"
                                                    type="text" disabled/>
                                            </td>
                                            <td>
                                                <select class="form-select mb-3" name="taxe_article[]" id="taxe_article[]_factureAr_0"
                                                    aria-label="Default select example" oninput="calculateDepfac('row_factureAr_0')">
                                                    <option value="-1" hidden>{{__('messages.no_taxe')}}</option>
                                                    @foreach ($Taxes as $taxe)
                                                    <option value="{{$taxe->id}}">{{$taxe->nom}}
                                                        ({{$taxe->taux}}%)</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td hidden>
                                                <input class="form-control total_taxe" name="total_taxe_dep" id="total_taxe_dep_factureAr_0" placeholder="Montant Taxe"
                                                    type="text" disabled/>
                                            </td>
                                            <td>
                                                <input class="form-control ttc" name="ttc_dep" id="ttc_dep_factureAr_0" placeholder="Montant TTC"
                                                    type="text" disabled/>
                                            </td>
                                            <td><i id="trash_dep_fac" data-fac="0" class="fa fa-trash text-danger trash_dep_fac"></i>
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>
                                <input onClick="addRowFacdep('facture-article')"  class="btn btn-warning" type="button" value='+ Nouvelle ligne' />
                                <input value="{{$Articles}}" type="hidden" id="articles_facture_depense" />
                                <input value="{{$Taxes}}" type="hidden" id="taxe_facture_depense" />
                            </div>

                        </div>
                        {{-- <div class="row justify-content-end mt-4">
                            <div class="col-auto">
                                <table class="table table-sm table-borderless fs--1 text-end">
                                    <tr>
                                        <th class="text-900">Sous Total:</th>
                                        <td class="fw-semi-bold total_sans_taxe">0.00 Fcfa</td>
                                    </tr>
                                    <tr>
                                        <th class="text-900 taxe_form">Total Taxe:</th>
                                        <td class="fw-semi-bold taxe_value">0 </td>
                                    </tr>

                                    <tr class="border-top border-top-2 fw-bolder text-900 d-non">
                                        <th>SOLDE À PAYER :</th>
                                        <td class="total_ttc" >0 FCFA*</td>
                                    </tr>
                                </table>
                            </div>
                        </div> --}}
                    </div>
                  </div>
                </div>
            </div>

            <div class="row gx-3 col-md-12 d-flex justify-content-between mb-3">

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
                <div class="col-md-3  d-none  d-md-block">

                </div>

                <div class=" col-md-3 col-12 bg-line-chart-gradient">
                    <div class="col-auto mt-3">
                        <table class="table table-sm table-borderless fs--1 text-end">
                            <tr>
                                <th class="text-light">{{__('messages.sub_total')}}:</th>
                                <td class="fw-semi-bold text-light total_sans_taxe">0.00 {{getCurrency()->sigle}}</td>
                            </tr>
                            <tr>
                                <th class="text-light taxe_form">{{__('messages.taxe_amount')}}:</th>
                                <td class="fw-semi-bold text-light taxe_value">0 {{getCurrency()->sigle}}</td>
                            </tr>

                            <tr class="border-top border-top-2 fw-bolder text-light d-non">
                                <th class="text-light">{{__('messages.amount_to_paye')}}:</th>
                                <td class="total_ttc text-light" >0 {{getCurrency()->sigle}}</td>
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
                    <h4 class="mb-1" id="modalExampleDemoLabel">{{__('messages.vendor_add')}}</h4>
                </div>
                <div class="p-4 pb-0">
                    <form  action="{{route('entreprise.fournisseurs.new.store')}}" class="row g-3 needs-validation" novalidate="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="entreprise">{{__('messages.vendor_name')}}</label>
                                <input class="form-control" name="entreprise" id="entreprise" type="text" required="" />
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="prenom">{{__('messages.vendor_user_first_name')}}</label>
                                <input class="form-control" name="prenom" id="prenom" type="text" required="" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="nom">{{__('messages.vendor_user_last_name')}}</label>
                                <input class="form-control" name="nom" id="nom" type="text" required="" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="titre">{{__('messages.vendor_user_position')}}</label>
                                <input class="form-control" name="titre" id="titre" type="text" required="" />
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="telephone">{{__('messages.telephone')}}</label>
                                <input class="form-control" name="telephone" id="telephone" type="text" required="" />
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="email">{{__('messages.email')}}</label>
                                <input class="form-control" name="email" id="email" type="text" />
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="numero_compte">{{__('messages.bank_account_no')}}</label>
                                <input class="form-control" name="numero_compte" id="numero_compte" type="text" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="adresse">{{__('messages.address')}}</label>
                                <input class="form-control" name="adresse" id="adresse" type="text">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="ville">{{__('messages.town')}}</label>
                                <input class="form-control" id="ville" name="ville" type="text" />
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="province">{{__('messages.province')}}</label>
                                <input class="form-control" name="province" id="province" type="text" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="code_postal">{{__('messages.postal_code')}}</label>
                                <input class="form-control" name="code_postal" id="code_postal" type="text" />
                            </div>


                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="pays">{{__('messages.country')}}</label>
                                <select class="form-select" name="pays" id="pays" required="">
                                    <option selected="" disabled="" value="">{{__('messages.chose')}}</option>
                                    @foreach (getPays() as $pays)
                                    <option value="{{$pays->nom}}">{{$pays->nom}}</option>
                                    @endforeach

                                </select>
                                <div class="invalid-feedback">{{__('messages.you_must_field_this_case')}}</div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="devises_monetaire_id">{{__('messages.currency')}}</label>
                                <select class="form-select" name="devises_monetaire_id" id="devises_monetaire_id"
                                    required="">
                                    <option selected="" disabled="" value="">{{__('messages.chose')}}</option>
                                    @foreach ($DevisesMonetaires as $devise)
                                    <option value="{{$devise->id}}">{{$devise->nom}} {{$devise->sigle}}</option>
                                    @endforeach

                                </select>
                                <div class="invalid-feedback">{{__('messages.you_must_field_this_case')}}</div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="comptescomptable_id">Détails de la transaction</label>
                                <select class="form-select" name="comptescomptable_id" id="comptescomptable_id"
                                    required="">
                                    <option disabled="" value="">{{__('messages.chose')}}</option>

                                    @foreach ($ComptesComptables as $ccomptable)
                                    <option value="{{$ccomptable->id}}">{{$ccomptable->nom}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">{{__('messages.you_must_field_this_case')}}</div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="paiements_modalite_id">{{__('messages.payment_mode')}} {{__('messages.wishes')}}</label>
                                <select class="form-select" name="paiements_modalite_id" id="paiements_modalite_id"
                                    required="">
                                    <option disabled="" value="">{{__('messages.chose')}}</option>
                                    
                                    @foreach ($ModesPaiements as $pmode)
                                    <option value="{{$pmode->id}}">{{$pmode->nom}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">{{__('messages.you_must_field_this_case')}}</div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="validationCustom05">{{__('messages.note')}}</label>
                                <textarea class="form-control" name="" id="" cols="5" rows="5"></textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="col-form-label" for="message-text">{{__('messages.message')}}:</label>
                                <textarea class="form-control" id="message-text" cols="5" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" type="button" data-bs-dismiss="modal">{{__('messages.close')}}</button>
                            <button class="btn btn-primary" type="submit">{{__('messages.save')}} </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

