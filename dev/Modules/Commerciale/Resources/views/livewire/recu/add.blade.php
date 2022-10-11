<div>
    <form wire:submit.prevent='save' method="POST" enctype="multipart/form-data">@csrf

        <input hidden type="text" name="type" value="recu">

        <div class="row col-md-12 d-flex justify-content-between gx-3 mb-3">
            <div class="d-flex mb-4 justify-content-between">
                <div class="col-md-5 d-flex justify-content-start">
                    <h4>Reçu {{__('messages.no')}} </h4>
                            <input class="form-control inputwireWidth  text-primary inputwire" wire:model='numero_recu' disabled type="text"/>

                </div>
                <div>
                    <button type="submit" class="btn btn-success mr-1" style="margin-right: 1em !important">{{__('messages.save')}}</button>
                    <a href="#0" class="btn bg-line-chart-gradient text-light cd-popup-close">Fermer</a>
                </div>
            </div>
        </div>

        <div class="row col-md-12 d-flex justify-content-between gx-3 mb-3">
            <div class="col-md-3 col-2">
                <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                for="fournisseur">{{__('messages.clients_list')}}</label>
                <div class="d-flex justify-content-start">
                    <select class="form-select mb-3" wire:model="fournisseur" id="fournisseur"
                    aria-label="Default select example">
                    <option hidden value="">{{__('messages.chose')}}</option>
                    @foreach ($data['Clients'] as $client)
                    <option value="{{'C'.$client->id}}">{{$client->entreprise}}</option>
                    @endforeach
                </select>
                @error('fournisseur') <span class="text-danger">{{ $message }}</span> @enderror
                <button class="addbtn text-light btn btn-sm bg-line-chart-gradient" wire:click.prevent="openModal('fournisseur')"><span class="fas fa-plus me-1" data-fa-transform="shrink-3"></span></button>
                </div>

            </div>


            <div class="col-md-3 col-2">
                <span class="form-check form-switch"  for="cc_cci" style="margin-bottom: 0px !important">
                    <input class="form-check-input" id="cc_cci" type="checkbox" checked="" />
                    <label style="margin-bottom: 0px !important" class="form-check-label" for="cc_cci">CC CCI ({{__('messages.send_receipt')}})</label>
                </span>
                <textarea class="form-control" wire:model="cc_cci" cols="30" rows="1"></textarea>
                @error('cc_cci') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="col-md-2 col-2 d-none d-md-block"></div>
            <div class="col-md-4 col-2 d-none d-md-block">


                <div class="text-algn">
                    <span class="text-algn">{{__('messages.amount_to_pay')}}:</span>
                    <h3 id="amount_commercial_facture_pay">
                        <div class="input-group mb-3">
                            <input class="form-control inputwire inputwireText " disabled wire:model='totalHaut' type="text" />
                        </div>
                    </h3>
                </div>
            </div>

        </div>


        <div class="row gx-3 col-md-12 d-flex justify-content-between  mb-3">

            <div class="col-md-2 col-2">
                <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1" for="cardNumber">Mode
                    paiement</label>
                <select class="form-select mb-3" wire:model="paiements_mode_id" id="cardNumber"
                    aria-label="Default select example">
                    <option value="" hidden>choisir</option>
                    @foreach ($data['ModesPaiements'] as $key=>$Modalite)
                        <option value="{{$Modalite->id}}">{{$Modalite->nom}}</option>
                    @endforeach
                </select>
                @error('paiements_mode_id') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-2 col-2">
                <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1" for="reference">Reférence
                </label>
                <input class="form-control" wire:model="reference" id="reference" type="text" />
                @error('reference') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div  class="col-md-2 col-2">
                <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                    for="paiement_source_id">Source de paiement</label>
                <select class="form-select mb-3" wire:model="paiement_source_id" id="paiement_source_id"
                    aria-label="Default select example">
                    <option value="">{{__('messages.chose')}}</option>
                    @foreach ($data['SourcesPaiement'] as $source)
                    <option value="{{$source->id}}">({{$source->type}}) {{$source->nom}}</option>
                    @endforeach
                </select>
                @error('paiement_source_id') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div  class="col-md-2 col-2">
                <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                    for="date_recu">{{__('messages.invoice_date')}}</label>
                <input class="form-control datetimepicker" wire:model="date_recu"
                    data-options='{"disableMobile":true}' id="date_recu"
                    value="{{ \Carbon\Carbon::now() }}" type="text" />
                @error('date_recu') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-2 col-2 d-md-block d-none"></div>

            <div class="col-md-2 col-2">
                <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1" for="numero_recu">Nº de
                    reçu</label>
                <input class="form-control" id="numero_recu" wire:model="numero_recu" type="text" />
                @error('numero_recu') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="row gx-3 col-md-12 d-flex justify-content-between  mb-3">
            <div class="col-md-6" hidden>
                <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                    for="adresse_facturation">Addresse Facturation</label>
                <input class="form-control" id="adresse_facturation" wire:model="adresse_facturation" type="text"
                    value="" />
                @error('adresse_facturation') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

        </div>

        <div class="col-md-12">
            <div class="table-responsive scrollbar mt-4 fs--1">
                <table class="table table-striped border-bottom">
                    <thead class="light">
                        <tr class="bg-line-chart-gradient text-white dark__bg-1000">
                            <th class="border-0">{{__('messages.item')}}</th>
                            <th class="border-0">{{__('messages.description')}}</th>
                            <th class="border-0">{{__('messages.quantity')}}</th>
                            <th class="border-0">{{__('messages.amount')}}</th>
                            <th class="border-0">{{__('messages.taxe')}}</th>
                            <th class="border-0">{{__('messages.total_amount')}}</th>
                            <th class="border-0">-</th>
                        </tr>
                    </thead>
                    <tbody id="table-recu-update" style="padding: 0px !important; margin: 0px !important">
                        @foreach ($allArticleFetched as $article)
                        <tr style="padding: 0px !important; ">
                            <td style="margin-left: 0px !important; padding-left:0px !important">
                                <select class="form-select mb-3 cartArt" aria-label="Default select example" disabled>
                                    <option value="" hidden>{{__('messages.chose_item')}}</option>
                                    @foreach ($data['Articles'] as $Article)
                                    <option value="{{$Article->id}}" {{ $Article->id == $article->article_id ?
                                        'selected' : ''}}>
                                        {{$Article->nom}}
                                    </option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input class="form-control" value="{{ $article->description}}" placeholder="description"
                                    type="text" disabled />
                            </td>
                            <td>
                                <input class="form-control" placeholder="quantité" type="number"
                                    value="{{ $article->qte}}" disabled />
                            </td>
                            <td>
                                <input class="form-control montantt" placeholder="Montant" type="number"
                                    value="{{ $article->montant}}" disabled />
                            </td>
                            <td>
                                <select class="form-select mb-3" aria-label="Default select example" disabled>
                                    <option value="-1" hidden>{{__('messages.no_taxe')}}</option>
                                    @foreach ($data['Taxes'] as $taxe)
                                    <option value="{{$taxe->id}}" {{ $taxe->id == $article->taxe_id ? 'selected' :
                                        ''}}>{{$taxe->nom}}
                                        ({{$taxe->taux}}%)</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input class="form-control ttc" value="{{ $article->total}}" placeholder="Montant TTC"
                                    type="text" disabled />
                            </td>
                            <td>
                                <button wire:click.prevent="confirmDeleteArticle({{ $article->id }})" class="btn btn-round">
                                    <i class="fa fa-trash text-danger trash"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                        @foreach ($rowArticle as $index => $row)
                        <tr style="padding: 0px !important; ">
                            <td class="d-flex justify-content-between">
                                <select class="form-select mb-3 cartArt ml-2" wire:model="rowArticle.{{$index}}.article_id"
                                    aria-label="Default select example">
                                    <option value="" hidden>{{__('messages.chose_item')}}</option>
                                    @foreach ($data['Articles'] as $Article)
                                    <option value="{{$Article->id}}">
                                        {{$Article->nom}}</option>
                                    @endforeach
                                </select>
                                <button class="addbtn text-light btn btn-sm bg-line-chart-gradient" wire:click.prevent="openModal('article')"><span class="fas fa-plus me-1" data-fa-transform="shrink-3"></span></button>
                            </td>
                            <td>
                                <input class="form-control" wire:model="rowArticle.{{$index}}.description"
                                    placeholder="description" type="text" />
                            </td>
                            <td>
                                <input class="form-control" wire:model="rowArticle.{{$index}}.qte"
                                    placeholder="quantité" type="number" value="1" />
                            </td>
                            <td>
                                <input class="form-control montant_ht" wire:model="rowArticle.{{$index}}.montant"
                                    placeholder="Montant" type="number" disabled/>
                            </td>
                            <td>
                                <select class="form-select mb-3" wire:model="rowArticle.{{$index}}.taxe_id"
                                    aria-label="Default select example">
                                    <option value="-1"  selected>{{__('messages.no_taxe')}}</option>
                                    @foreach ($data['Taxes'] as $taxe)
                                    <option value="{{$taxe->id}}">{{$taxe->nom}}
                                        ({{$taxe->taux}}%)</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input class="form-control montant_ttc" wire:model="rowArticle.{{$index}}.total"
                                    placeholder="Montant TTC" type="text" disabled/>
                            </td>
                            <td>
                                <button class="btn btn-round" wire:click.prevent="deleteRow({{$index}})">
                                    <i class="fa fa-trash text-danger trash"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                     </tbody>

                </table>
                <input  wire:click.prevent="addRow" class="btn btn-warning" type="button" value='+ Nouvelle ligne' />
            </div>



        </div>
        <div class="row gx-3 mt-4 col-md-12 d-flex justify-content-between mb-3">

            <div class="col-md-3 col-12">
                <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                for="message">{{__('messages.msg_on_invoice')}}</label>
                <textarea wire:model="message" id="" class="form-control" cols="30" id="message" rows="4"> </textarea>
                @error('message') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-3 col-12">
                <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                    for="message_affiche">{{__('messages.msg_on_rapport')}}</label>
                <textarea wire:model="message_affiche" id="" class="form-control" cols="30" id="message_affiche"
                    rows="4"></textarea>
                @error('message_affiche') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-3 col-12">
                <div class="mt-2">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                    for="cardNumber">{{__('messages.pj')}}</label>
                    <input class="form-control" wire:model="fichier" id="customFile" type="file" />
                    @error('fichier') <span class="text-danger">{{ $message }}</span> @enderror

                </div>
            </div>

            <div class="col-md-3 col-12 bg-line-chart-gradient">
                <div class="col-auto mt-3">
                    <table class="table table-sm table-borderless fs--1 text-end">
                        <tr>
                            <th class="text-light">{{__('messages.sub_total')}} ({{getCurrency()->sigle}}):</th>
                            <td class="fw-semi-bold text-light total_sans_taxe">
                                <div class="input-group mb-3">
                                    <input class="form-control inputwire inputwireTextWhite" disabled wire:model='total_sans_taxe' type="text" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-light taxe_form">{{__('messages.taxe_amount')}} ({{getCurrency()->sigle}}):</th>
                            <td class="fw-semi-bold taxe_value text-light">
                                <div class="input-group mb-3">
                                    <input class="form-control inputwire inputwireTextWhite" disabled wire:model='taxe' type="text" />
                                </div>
                            </td>
                        </tr>

                        <tr class="border-top text-light border-top-2 fw-bolder  d-non">
                            <th class="text-light">{{__('messages.amount_to_paye')}} ({{getCurrency()->sigle}}):</th>
                            <td class="total_ttc text-light">
                                <div class="input-group mb-3">
                                    <input class="form-control inputwire inputwireTextWhite" disabled wire:model='total' type="text" />
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>

    </form>
</div>
