<div>
    <div class="cd-popup-container  " >
        <div class="card-body" style="height: 100vh !important">
            <form wire:submit.prevent='save' method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row col-md-12 d-flex justify-content-between gx-3 mb-3">
                    <div class="d-flex mb-4 justify-content-between">
                        <div class="col-md-5 d-flex justify-content-start">
                            <h4>{{__('messages.invoice_to_pay')}} {{__('messages.no')}}</h4>
                            <input class="form-control inputwireWidth  text-primary inputwire" wire:model='numero_facture'
                                disabled type="text" />
                        </div>
                        <div>
                            <button type="submit" class="btn btn-success mr-1" style="margin-right: 1em !important">{{__('messages.save')}}</button>
                            <a href="#0" class="btn bg-line-chart-gradient text-light cd-popup-close">Fermer</a>
                        </div>
                    </div>
                </div>

                <input hidden class="form-control" wire:model="type" id="type" type="text" value="facture" />

                <div class="row gx-3 col-md-12 d-flex justify-content-between mb-3">
                    <div class="col-md-4 col-6">
                        <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                            for="fournisseur">{{__('messages.vendors')}}</label>
                            <div class="d-flex justify-content-start">
                                <select class="form-select mb-3" wire:model="fournisseur" id="fournisseur"
                            aria-label="Default select example">
                            <option value="" hidden>{{__('messages.chose')}}</option>
                             @foreach ($data['Fournisseurs'] as $fournisseur)
                                @php
                                $value = "F".$fournisseur->id;
                                @endphp
                                <option value="{{$value}}">{{$fournisseur->entreprise}}</option>
                            @endforeach
                        </select>
                        @error('fournisseur') <span class="text-danger">{{ $message }}</span> @enderror
                        <button class="col-md-6 addbtn text-light btn btn-sm bg-line-chart-gradient" wire:click.prevent="openModalExpress('client')"><span class="fas fa-plus me-1" data-fa-transform="shrink-3"></span>Ajouter Fournisseurs</button>
                          </div>
                    </div>

                    <div class="col-md-4 col-6 d-none d-md-block  d-xl-block d-sm-block">
                        <div class="text-algn">
                            <span class="text-algn" >{{__('messages.amount_to_pay')}}:</span>
                            <h3 id="amount_commercial_facture_pay">
                                <div class="input-group mb-3">
                                    <input class="form-control inputwire inputwireText " disabled wire:model='totalHaut'
                                        type="text" />
                                </div>
                            </h3>
                        </div>
                    </div>

                </div>

                <div class="row gx-3 col-md-12  mb-3">
                    <div class="col-md-2 col-6" hidden>
                        <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                            for="has_taxe">{{__('messages.amount_show_with')}}</label>
                        <select class="form-select mb-3" id="has_taxe"
                            aria-label="Default select example">
                            <option>{{__('messages.taxe_not_inclued')}}</option>
                            <option>{{__('messages.taxe_inclued')}}</option>
                            <option>{{__('messages.no_taxe')}}</option>
                        </select>
                    </div>
                    <div class="col-md-2 col-6">
                        <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                            for="cardNumber">{{__('messages.modality')}}</label>
                            <select class="form-select mb-3" wire:model="paiements_modalite_id" id="paiements_modalite_id"
                                aria-label="Default select example">
                                <option value="">{{__('messages.chose')}}</option>
                                @foreach ($data['Modalites'] as $Modalite)
                                <option value="{{$Modalite->id}}" >{{$Modalite->nom}}</option>
                                @endforeach
                            </select>
                    </div>
                    <div class="col-md-2 col-6">
                        <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                            for="date_facturation">{{__('messages.invoice_date')}}</label>
                        <input class="form-control datetimepicker" wire:model="date_facturation" id="date_facturation" data-options='{"disableMobile":true}' type="text" />
                    </div>
                    <div class="col-md-2 col-6">
                        <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                            for="echeance">{{__('messages.du_date')}}</label>
                        <input class="form-control datetimepicker" data-options='{"disableMobile":true}' wire:model="echeance" id="echeance" type="text"/>
                    </div>
                    <div class="col-md-2 d-none d-md-block"></div>
                    <div class="col-md-2 col-6">
                        <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                            for="numero_facture">{{__('messages.invoice_to_pay')}} {{__('messages.no')}}</label>
                        <input class="form-control" id="numero_facture" wire:model="numero_facture" type="number"/>
                    </div>
                </div>

                <div class="accordion mt-4 mb-4" id="accordionExample">
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="heading1">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">Détails</button>
                      </h2>
                      <div class="accordion-collapse collapse show" id="collapse1" aria-labelledby="heading1" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="col-md-12 ">
                                <div class="table-responsive scrollbar fs--1">
                                    <table class="table table-striped border-bottom">
                                        <thead class="light">
                                          <tr class="bg-line-chart-gradient text-white dark__bg-1000">
                                              <th class="border-0">{{__('messages.produits_services')}}</th>
                                              <th class="border-0">{{__('messages.accounting_account')}}</th>
                                              <th class="border-0">{{__('messages.description')}}</th>
                                              <th class="border-0">{{__('messages.quantity')}}</th>
                                              <th class="border-0">{{__('messages.prix_achat')}}</th>
                                              <th class="border-0">{{__('messages.taxe')}}</th>
                                              <th class="border-0">{{__('messages.total_amount')}}</th>
                                              <th class="border-0">-</th>
                                          </tr>
                                        </thead>
                                        <tbody  style="padding: 0px !important; margin: 0px !important">

                                            @foreach ($rowCompte as $index => $row)
                                            <tr style="padding: 0px !important; ">
                                              <td>
                                                <div class="d-flex justify-content-between">
                                                  <select class="form-select mb-3 cartArt ml-4" wire:model="rowCompte.{{$index}}.article_id"
                                                      aria-label="Default select example">
                                                      <option value="">{{__('messages.chose_produits_services')}}</option>
                                                      @foreach ($data['Articles'] as $Article)
                                                      <option value="{{$Article->id}}">
                                                        {{$Article->nom}}</option>
                                                      @endforeach
                                                  </select>
                                                  <button class="addbtn text-light btn btn-sm bg-line-chart-gradient" wire:click.prevent="openModalExpress('article')"><span class="fas fa-plus me-1" data-fa-transform="shrink-3"></span></button>
                                                </div>
                                              </td>

                                              <td>
                                                <div class="d-flex justify-content-between">
                                                  
                                                  <select class="form-select mb-3 cartArt" wire:model="rowCompte.{{$index}}.compte_comptable_id"
                                                  @if (array_key_exists($index,$this->line))
                                                    {{ $this->line[$index][$index] ?? '' }}
                                                   @else'' @endif
                                                      aria-label="Default select example">
                                                      <option value="">{{__('messages.chose_category')}}</option>
                                                      @foreach ($data['ComptesComptablesDefault'] as $ComptesComptables)
                                                      <option value="{{$ComptesComptables->id}}">
                                                        {{$ComptesComptables->numero_compte}} - {{$ComptesComptables->nom}}</option>
                                                      @endforeach
                                                  </select>
                                                  <button class="addbtn text-light btn btn-sm bg-line-chart-gradient" wire:click.prevent="openModalExpress('compte')"><span class="fas fa-plus me-1" data-fa-transform="shrink-3"></span></button>
                                                </div>
                                              </td>
                                                <td>
                                                    <input class="form-control" wire:model="rowCompte.{{$index}}.description"
                                                        placeholder="description" type="text" />
                                                </td>
                                                <td>
                                                    <input class="form-control" wire:model="rowCompte.{{$index}}.qte"
                                                        placeholder="{{$this->stock_tmp[$index] ?? ''}}" type="number" />
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
                </div>

                <div class="row gx-3 col-md-12 d-flex justify-content-between mb-3">
                    <div class="col-md-3 col-12">
                        <div class="mt-2">
                            <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                            for="note">{{__('messages.memo')}}</label>
                            <textarea wire:model="note" class="form-control" cols="30" id="note" rows="4"> </textarea>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="">
                            <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 fs--1"
                            for="cardNumber">{{__('messages.pj')}}</label>
                            <input  class="form-control" wire:model="fichier" id="customFile" type="file" />
                        </div>
                    </div>

                    <div class=" col-md-3 col-12 bg-line-chart-gradient">
                       <div class="col-auto mt-3">
                           <table class="table table-sm table-borderless fs--1 ">
                               <tr>
                                   <th class="text-light">{{__('messages.sub_total')}} ({{getCurrency()->sigle}}):</th>
                                   <td class="fw-semi-bold text-light">
                                           <input class="form-control inputwire inputwireTextWhite text-end" disabled wire:model='total_sans_taxe' type="text" />
                                   </td>
                               </tr>
                               <tr>
                                   <th class="text-light taxe_form text-start">{{__('messages.taxe_amount')}} ({{getCurrency()->sigle}}):</th>
                                   <td class="fw-semi-bold taxe_value">
                                           <input class="form-control inputwire inputwireTextWhite text-end" disabled wire:model='taxe' type="text" />
                                   </td>
                               </tr>
                               <tr class="border-top text-light border-top-2 fw-bolder  d-non">
                                   <th class="text-light text-start">{{__('messages.amount_to_paye')}} ({{getCurrency()->sigle}}):</th>
                                   <td class="total_ttc text-light">
                                           <input class="form-control inputwire inputwireTextWhite text-end" disabled wire:model='total' type="text"/>
                                   </td>
                               </tr>
                           </table>
                       </div>
                   </div>

                    {{-- <div class=" col-md-3 col-12 bg-line-chart-gradient">
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
                    </div> --}}
                </div>
            </form>
        </div>
    </div>
</div>
