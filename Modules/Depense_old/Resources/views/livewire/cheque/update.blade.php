<div>
    <div class="cd-popup-container">
        <div class="card-body ">
            <form wire:submit.prevent='update' method="POST" enctype="multipart/form-data">@csrf
                <div class="row col-md-12 d-flex justify-content-between gx-3 mb-3">
                    <div class="d-flex mb-4 justify-content-between">
                        <div class="col-md-5 d-flex justify-content-start">
                            <h4>{{__('messages.check')}} {{__('messages.no')}}</h4>
                            <input class="form-control inputwireWidth  text-primary inputwire" wire:model='numero_cheque'
                                disabled type="text" />
                        </div>
                        <div>
                            <button class="btn btn-success btn-recu-submit">{{__('messages.update')}} </button>
                            <button class="btn btn-danger" type="button" wire:click.prevent="confirmDeleteFacture">
                                <i class="fa fa-trash text-light trash"></i>
                                {{__('messages.delete')}}
                            </button>
                            <button wire:click.prevent='closePopup'
                                class="btn bg-line-chart-gradient text-light ">Fermer</button>
                        </div>
                    </div>
                </div>
                <div class="row gx-3 col-md-12 d-flex justify-content-start mb-3">
                    <div  class="col-md-2 col-6">
                        <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                            for="fournisseur">{{__('messages.vendors')}}</label>

                            <div class="d-flex justify-content-start">

                                <select class="form-select mb-3" wire:model="fournisseur" id="fournisseur"
                                aria-label="Default select example">
                                <option hidden>{{__('messages.chose')}}</option>
                                @foreach ($data['Fournisseurs'] as $fournisseur)
                                @php
                                $value = "F".$fournisseur->id;
                                @endphp
                                <option value="{{$value}}">{{$fournisseur->entreprise}}</option>
                                @endforeach
                            </select>
                            @error('fournisseur') <span class="text-danger">{{ $message }}</span> @enderror
                            <button class="addbtn text-light btn btn-sm bg-line-chart-gradient"
                                wire:click.prevent="openModalExpress('client')"><span class="fas fa-plus me-1"
                                    data-fa-transform="shrink-3"></span></button>
                               </div>

                    </div>
                    <div class="col-md-6 col-6 d-md-block d-none"></div>
                    <div class="col-md-4 col-6 d-none d-md-block  d-xl-block d-sm-block">
                        <div class="text-algn">
                            <span class="text-algn">{{__('messages.amount_to_pay')}}:</span>
                        <h3 id="amount_commercial_facture_pay">
                            <div class="input-group mb-3">
                                <input class="form-control inputwire inputwireText " disabled wire:model='totalHaut'
                                    type="text" />
                            </div>
                        </h3>
                        </div>
                    </div>

                </div>

                <input hidden type="text" wire:model="type" value="cheque">

                <div class="row gx-3 col-md-12 d-flex justify-content-between mb-3">
                    <div class="col-md-2 col-6">
                        <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                            for="paiementsource_id">{{__('messages.payment_source')}}</label>
                        <select class="form-select mb-3" wire:model="paiementsource_id" id="paiementsource_id"
                            aria-label="Default select example">
                            @foreach ($data['SourcesPaiement'] as $source)
                            <option value="{{$source->id}}" >({{$source->type}}) {{$source->nom}}</option>
                            @endforeach
                        </select>
                        @error('paiementsource_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-2 col-6">
                        <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                            for="date_paiement">{{__('messages.payment_date')}}</label>
                        <input class="form-control datetimepicker" wire:model="date_paiement" id="date_paiement" type="text" />
                        @error('date_paiement') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-6 col-6 d-none d-md-block"></div>

                    <div class="col-md-2 col-6">
                        <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1" for="numero_cheque">{{__('messages.check')}} {{__('messages.no')}}</label>
                        <input class="form-control" id="numero_cheque" wire:model="numero_cheque" type="number"  />
                        @error('numero_cheque') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="accordion mt-4 mb-4" id="accordionExample">
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="heading1">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">{{__('messages.accounting_account')}}</button>
                          </h2>
                          <div class="accordion-collapse collapse show" id="collapse1" aria-labelledby="heading1" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="col-md-12 ">
                                    <div class="table-responsive scrollbar fs--1">
                                        <table id="test-table" class="table table-striped border-bottom">
                                            <thead class="light">
                                                <tr class="bg-line-chart-gradient text-white dark__bg-1000">
                                                    <th class="border-0">{{__('messages.categorie')}}</th>
                                                    <th class="border-0">{{__('messages.description')}}</th>
                                                    <th class="border-0">{{__('messages.amount')}}</th>
                                                    <th class="border-0">{{__('messages.taxe')}}</th>
                                                    <th class="border-0">{{__('messages.total_amount')}}</th>
                                                    <th class="border-0">-</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($allCompteFetched as $compte)
                                                    @if ($compte->comptes_comptable_id != null)
                                                        <tr style="padding: 0px !important; ">
                                                            <td style="margin-left: 0px !important; padding-left:0px !important">
                                                                <select class="form-select mb-3 cartArt" aria-label="Default select example" disabled>
                                                                    <option value="" hidden>{{__('messages.chose_category')}}</option>
                                                                    @foreach ($data['ComptesComptables'] as $CompteComptable)
                                                                    <option value="{{$CompteComptable->id}}" {{ $CompteComptable->id == $compte->comptes_comptable_id ?
                                                                        'selected' : ''}}>
                                                                        {{$CompteComptable->nom}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input class="form-control" value="{{ $compte->description}}" placeholder="description"
                                                                    type="text" disabled />
                                                            </td>
                                                            <td>
                                                                <input class="form-control montantt" placeholder="Montant" type="number"
                                                                    value="{{ $compte->montant}}" disabled />
                                                            </td>
                                                            <td>
                                                                <select class="form-select mb-3" aria-label="Default select example" disabled>
                                                                    <option value="-1" hidden>{{__('messages.no_taxe')}}</option>
                                                                    @foreach ($data['Taxes'] as $taxe)
                                                                    <option value="{{$taxe->id}}" {{ $taxe->id == $compte->taxe_id ? 'selected' :
                                                                        ''}}>{{$taxe->nom}}
                                                                        ({{$taxe->taux}}%)</option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input class="form-control ttc" value="{{ $compte->total}}" placeholder="Montant TTC"
                                                                    type="text" disabled />
                                                            </td>
                                                            <td>
                                                                <button wire:click.prevent="confirmDeleteCompte({{ $compte->id }})" class="btn btn-round">
                                                                    <i class="fa fa-trash text-danger trash"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                                @foreach ($rowCompte as $index => $row)
                                                <tr style="padding: 0px !important; ">
                                                    <td class="d-flex justify-content-between">
                                                        <select class="form-select mb-3 cartArt ml-4" wire:model="rowCompte.{{$index}}.compte_comptable_id"
                                                            aria-label="Default select example">
                                                            <option value="" hidden>{{__('messages.chose_category')}}</option>
                                                            @foreach ($data['ComptesComptables'] as $Article)
                                                            <option value="{{$Article->id}}">
                                                                {{$Article->nom}}</option>
                                                            @endforeach
                                                        </select>
                                                        <button class="addbtn text-light btn btn-sm bg-line-chart-gradient" wire:click.prevent="openModalExpress('compte')"><span class="fas fa-plus me-1" data-fa-transform="shrink-3"></span></button>
                                                    </td>
                                                    <td>
                                                        <input class="form-control" wire:model="rowCompte.{{$index}}.description"
                                                            placeholder="description" type="text" />
                                                    </td>
                                                    <td hidden>
                                                        <input class="form-control" wire:model="rowCompte.{{$index}}.qte"
                                                            placeholder="quantité" type="number" value="1" />
                                                    </td>
                                                    <td>
                                                        <input class="form-control montant_ht" wire:model="rowCompte.{{$index}}.montant"
                                                            placeholder="Montant" type="number" step=".001"/>
                                                    </td>
                                                    <td>
                                                        <select class="form-select mb-3" wire:model="rowCompte.{{$index}}.taxe_id"
                                                            aria-label="Default select example">
                                                            <option value="-1"  selected>{{__('messages.no_taxe')}}</option>
                                                            @foreach ($data['Taxes'] as $taxe)
                                                            <option value="{{$taxe->id}}">{{$taxe->nom}}
                                                                ({{$taxe->taux}}%)</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input class="form-control montant_ttc" wire:model="rowCompte.{{$index}}.total"
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
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item mt-2" >
                          <h2 class="accordion-header" id="heading2">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="true" aria-controls="collapse2">{{__('messages.products_services')}}</button>
                          </h2>
                          <div class="accordion-collapse collapse show" id="collapse2" aria-labelledby="heading2" data-bs-parent="#accordionExample">
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
                                                    <th class="border-0">{{__('messages.taxe')}}</th>
                                                    <th class="border-0">{{__('messages.total_amount')}}</th>
                                                    <th class="border-0">-</th>
                                                  </tr>
                                            </thead>
                                            <tbody style="padding: 0px !important; margin: 0px !important">
                                                @foreach ($allArticleFetched as $article)
                                                @if ($article->article_id != null)


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
                                                @endif
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
                                                        <button class="addbtn text-light btn btn-sm bg-line-chart-gradient" wire:click.prevent="openModalExpress('article')"><span class="fas fa-plus me-1" data-fa-transform="shrink-3"></span></button>
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
                                                        <button class="btn btn-round" wire:click.prevent="deleteArticleRow({{$index}})">
                                                            <i class="fa fa-trash text-danger trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <input  wire:click.prevent="addArticleRow" class="btn btn-warning" type="button" value='+ Nouvelle ligne' />
                                    </div>
                                </div>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4 gx-3 col-md-12 d-flex justify-content-between mb-3">
                    <div class="col-md-3 col-6">
                        <div class="mt-2">
                            <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                            for="note">{{__('messages.memo')}}</label>
                            <textarea wire:model="note" id="" class="form-control" cols="30" id="note" rows="4"></textarea>
                            @error('note') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="">
                            <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                            for="cardNumber">{{__('messages.pj')}}</label>
                            <input  class="form-control" wire:model="fichier" id="customFile" type="file" />
                            @error('fichier') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <button class="btn btn-primary mt-3" type="button" data-bs-toggle="modal" data-bs-target="#pjcheque">{{__('messages.see_pj')}}</button>
                        <div class="modal fade" id="pjcheque" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg mt-6" role="document">
                                <div class="modal-content shadow-lg">
                                <div class="modal-body  p-0 bg-light" >
                                    <div class="bg-light p-2 d-flex justify-content-between rounded-top-lg ">
                                    <h4 class="mb-1" id="staticBackdropLabel">Pièce jointe</h4>
                                    <button class=" btn btn-sm btn-danger d-flex flex-center " data-bs-dismiss="modal" aria-label="Close">{{__('messages.close')}}</button>
                                    </div>
                                    <div class="">
                                        <iframe src="{{$pieceJointe}}" width="100%" height="600px"> </iframe>
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
    </div>
</div>
