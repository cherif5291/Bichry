<div>
    <form wire:submit.prevent="update" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row col-md-12 d-flex justify-content-between gx-3 mb-3">
            <div class="d-flex mb-4 justify-content-between">
                <div class="col-md-5 d-flex justify-content-start">
                    <h4>{{__('messages.invoice')}} {{__('messages.no')}} </h4>
                        <input class="form-control inputwireWidth  text-primary inputwire" wire:model='numero_facture' disabled type="text"/>

                </div>
                <div>
                    <button type="submit" class="btn btn-success">{{__('messages.update')}} </button>
                    <button wire:click.prevent="confirmDeleteFacture({{$idFacture}})" class="btn btn-danger mr-2" type="button"><i id="trash" data-id="0" class="fa fa-trash text-light trash"></i>
                        {{__('messages.delete')}}
                    </button>
                    <button wire:click.prevent='closePopup' class="btn bg-line-chart-gradient text-light ">Fermer</button>
                </div>
            </div>
        </div>
        <div class="row col-md-12 d-flex justify-content-start gx-3 mb-3">
            <div class="col-md-3 col-6">
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
            <div class="col-md-2 col-6">
                <span class="form-check form-switch" style="margin-bottom: 0px !important">
                    <input class="form-check-input" id="flexSwitchCheckChecked" type="checkbox" checked="" />
                    <label style="margin-bottom: 0px !important" class="form-check-label"
                        for="flexSwitchCheckChecked">CC CCI (Send)</label>
                </span>
                <textarea class="form-control" wire:model="cc_cci" id="cc_cci" cols="30" rows="1"></textarea>
                @error('cc_cci') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-1 col-6 d-none d-md-block d-xl-block d-sm-block "></div>


            <div class="col-md-4 col-2 d-none d-md-block">


                <div class="text-algn">
                    <span class="text-algn">{{__('messages.amount_to_pay')}}:</span>
                    <h3 id="amount_commercial_facture_pay">
                        <div class="input-group mb-3">
                            <input class="form-control inputwire inputwireText" disabled wire:model='totalHaut' type="text" />
                        </div>
                    </h3>
                </div>
            </div>
        </div>

        <div class="row gx-3 col-md-12 d-flex justify-content-between mb-3">



            <div class="col-md-2 col-6">
                <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                    for="cardNumber">{{__('messages.payment_modality')}}</label>
                <select class="form-select mb-3" wire:model="paiements_modalite_id" id="paiements_modalite_id_facture"
                    aria-label="Default select example">
                    <option value="" hidden>{{__('messages.chose')}}</option>
                    @foreach ($data['Modalites'] as $key=>$Modalite)
                    <option value="{{$Modalite->id}}">{{$Modalite->nom}}</option>
                    @endforeach
                </select>
                @error('paiements_modalite_id') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-2 col-6">
                <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                    for="date_facturation">{{__('messages.invoice_date')}}</label>
                <input class="form-control datetimepicker" wire:model="date_facturation"
                    data-options='{"disableMobile":true}' id="date_facturation_facture"
                    value="{{ \Carbon\Carbon::now() }}" type="text" />
                @error('date_facturation') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-2 col-6">
                <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                    for="echeance">{{__('messages.due_date')}}</label>
                <input class="form-control datetimepicker" data-options='{"disableMobile":true}' wire:model="echeance"
                    id="echeance_facture" type="text" />
                @error('echeance') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-4 d-none d-md-block"></div>
            <input wire:model="type" value="facture" hidden />
            <div class="col-md-2 col-6">
                <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                    for="numero_facture">{{__('messages.invoice')}} {{__('messages.no')}}</label>
                <input class="form-control" id="numero_facture" wire:model="numero_facture" type="number" />
                @error('numero_facture') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

        </div>


        <div class="col-md-12">
            <div class="table-responsive scrollbar mt-4 fs--1">
                <table id="test-table" class="table table-striped border-bottom">
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
                    <tbody style="padding: 0px !important; margin: 0px !important">
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
                <input wire:click.prevent="addRow" class="btn btn-warning" type="button" value='+ Nouvelle ligne' />
            </div>
        </div>
        <div class="row gx-3 mt-3 col-md-12 d-flex justify-content-between mb-3">
            <div class="col-md-3 col-6">
                <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                    for="message">{{__('messages.msg_on_invoice')}}</label>
                <textarea wire:model="message" id="" class="form-control" cols="30" id="message" rows="4"> </textarea>
                @error('message') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-3 col-6">
                <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                    for="message_affiche">{{__('messages.msg_on_rapport')}}</label>
                <textarea wire:model="message_affiche" id="" class="form-control" cols="30" id="message_affiche"
                    rows="4"></textarea>
                @error('message_affiche') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-3 col-6">
                <div hidden>
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                        for="has_taxe">{{__('messages.amount_show_with')}}</label>
                    <select class="form-select mb-3" wire:model="has_taxe" id="has_taxe"
                        aria-label="Default select example">
                        <option>{{__('messages.taxe_not_inclued')}}</option>
                        <option>{{__('messages.taxe_inclued')}}</option>
                        <option>{{__('messages.no_taxe')}}</option>
                    </select>
                    @error('has_taxe') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mt-2">
                    <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                        for="cardNumber">{{__('messages.pj')}}</label>
                    <input class="form-control" wire:model="fichier" id="customFile" type="file" />
                    @error('fichier') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                @if ($updateMode)
                <button class="btn btn-primary mt-3" type="button" data-bs-toggle="modal"
                    data-bs-target="#staticBackdrop">{{__('messages.see_pj')}}</button>
                <div class="modal fade" id="staticBackdrop" data-bs-keyboard="false" data-bs-backdrop="static"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg mt-6" role="document">
                        <div class="modal-content shadow-lg">

                            <div class="modal-body  p-0 bg-light">
                                <div class="bg-light p-2 d-flex justify-content-between rounded-top-lg ">
                                    <h4 class="mb-1" id="staticBackdropLabel">Pièce jointe</h4>
                                    <button class=" btn btn-sm btn-danger d-flex flex-center " data-bs-dismiss="modal"
                                        aria-label="Close">{{__('messages.close')}}</button>
                                </div>
                                <div class="">
                                    <iframe id="pj_facture_factur" src="{{$pieceJointe}}" width="100%"
                                        height="600px"> </iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            <div class="col-md-3 col-6 bg-line-chart-gradient">
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


