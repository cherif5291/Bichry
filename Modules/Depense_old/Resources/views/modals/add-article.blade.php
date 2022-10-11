<!-- Modal -->
<div class="modal bd-example-modal-lg" @if ($showModalArticle)style="display: block"@endif id="factureComPopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content shadow-lg">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('messages.add_a')}} Produit/service</h5>
                <button type="button" class="btn" wire:click="closeExpressModal('article')" aria-label="Close">
                    <i class="fas fa-times-circle"></i>
                </button>
            </div>
            <style media="screen">
            * {
                  box-sizing: border-box;
                }
                .tabs {
                  position: relative;
                  height: 14.75rem;
                }
                .tabs::before,
                .tabs::after {
                  content: "";
                  display: table;
                }
                .tabs::after {
                  clear: both;
                }
                .tab {
                  float: left;
                }
                .tab-switch {
                  display: none;
                }
                .tab-label {
                  position: relative;
                  display: block;
                  line-height: 2.75em;
                  height: 3em;
                  padding: 0 1.618em;
                  background-color: #1da1f2;
                  background-position: center;
                  border-right: 0.125rem solid #fff;
                  color: #024787;
                  cursor: pointer;
                  top: 0;
                  transition: all 0.25s;
                }
                .tab-label:hover {
                  top: -0.25rem;
                  transition: top 0.25s;
                }
                .tab-content {
                  /* height: 12rem; */
                  position: absolute;
                  z-index: 1;
                  top: 2.75em;
                  left: 0;
                  right: 0;
                  padding: 1.618rem;
                  background: #fff;
                  color: #2c3e50;
                  border-bottom: 0.25rem solid ##024787;
                  opacity: 0;
                  transition: all 0.35s;
                }
                .tab-switch:checked + .tab-label {
                  background: #fff;
                  color: #2c3e50;
                  border-bottom: 0;
                  border-right: 0.125rem solid #fff;
                  transition: all 0.35s;
                  z-index: 1;
                  top: -0.0625rem;
                }
                .tab-switch:checked + label + .tab-content {
                  z-index: 2;
                  opacity: 1;
                  transition: all 0.35s;
                }
            </style>

    <div class="wrapper">
      <div class="tabs">
        <div class="tab">
          <input type="radio" name="css-tabs" id="tab-1" checked class="tab-switch">
          <label for="tab-1" class="tab-label">Produits (hors stock)</label>
          <div class="tab-content">
            <form wire:submit.prevent='saveProduit_HS'>
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label" for="nom_produit">{{__('messages.name_of')}} Produit <span class="text-danger">*</span></label>
                            <input class="form-control" wire:model="nom_produit" id="nom_produit" type="text"/>
                            @error('nom_produit') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="type_produit"> Type <span class="text-danger">*</span></label>
                            <input class="form-control" id="type_produit"  disabled type="text" placeholder = "Produits"/>
                            @error('type_produit') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeExpressModal('article')">
                        {{__('messages.cancel')}}
                    </button>
                    <button type="submit" class="btn btn-primary">{{__('messages.save')}}</button>
                </div>
            </form>
          </div>
        </div>
        <div class="tab">
          <input type="radio" name="css-tabs" id="tab-2" class="tab-switch" >
          <label for="tab-2" class="tab-label">Services</label>
          <div class="tab-content">
            <form wire:submit.prevent='saveService'>
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label" for="nom">{{__('messages.name_of')}} Service <span class="text-danger">*</span></label>
                            <input class="form-control" wire:model="nom_service" id="nom_service" type="text" required="" />
                            @error('nom_service') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="type"> Type <span class="text-danger">*</span></label>
                            <input class="form-control" id="type_service" disabled  type="text" placeholder="Services"/>
                            @error('type_service') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeExpressModal('article')">
                        {{__('messages.cancel')}}
                    </button>
                    <button type="submit" class="btn btn-primary">{{__('messages.save')}}</button>
                </div>
            </form>
           </div>
        </div>
        <div class="tab">
          <input type="radio" name="css-tabs" id="tab-3" class="tab-switch">
          <label for="tab-3" class="tab-label">Stock</label>
          <div class="tab-content">
            <form wire:submit.prevent='saveStock'>
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label class="form-label" for="nom_stock">{{__('messages.name_of')}} de l'article <span class="text-danger">*</span></label>
                            <input class="form-control" wire:model="nom_stock" id="nom_stock" type="text"   />
                            @error('nom_stock') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label" for="type_stock"> Type <span class="text-danger">*</span></label>
                            <input class="form-control" id="type_stock" disabled  type="text" placeholder="Stock"/>
                            @error('type_stock') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label" for="comptes_comptable_default">{{__('messages.accounting_account')}} <span class="text-danger">*</span></label>
                            <select class="form-select" wire:model="comptes_comptable_default" id="comptes_comptable_default" disabled>
                            @foreach (getDataBySession()['ComptesComptablesDefault'] ->where('nom', 'Stock') as $cComptable)
                              {{ $this->comptes_comptable_default = $cComptable->id }}
                              <option value="{{$cComptable->id}}">{{$cComptable->numero_compte}} - {{$cComptable->nom}}</option>
                            @endforeach
                            </select>
                            @error('comptes_comptable_default') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                      <hr>

                      {{-- <div class="row">

                        <div class="col-md-6">
                            <label class="form-label" for="prix_achat">Prix d'achat</label>
                            <input class="form-control" wire:model="prix_achat" id="prix_achat" type="number"/>
                            @error('prix_achat') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="qte_stock">Quantité</label>
                            <input class="form-control" wire:model="qte_stock" id="qte_stock" type="number" />
                            @error('qte_stock') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                      </div> --}}
                      <br>
                      <div class="row">
                        <div class="col-md-6">
                            <label class="form-label" for="comptes_achat_id">Compte D'achat</label>
                            <select class="form-select" wire:model="comptes_achat_id" id="comptes_achat_id" disabled >
                            @foreach (getDataBySession()['ComptesComptablesDefault'] ->where('nom', 'Achats') as $cComptable)
                              {{ $this->comptes_achat_id = $cComptable->id }}
                            <option value="{{$cComptable->id}}" selected>{{$cComptable->numero_compte}} - {{$cComptable->nom}}</option>
                            @endforeach
                            </select>
                          @error('comptes_achat_id') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="comptes_vente_id">Compte de vente</label>
                            <select class="form-select" wire:model="comptes_vente_id" id="comptes_vente_id" disabled>
                            @foreach (getDataBySession()['ComptesComptablesDefault'] ->where('nom', 'Vente de marchandises') as $cComptable)
                              {{ $this->comptes_vente_id = $cComptable->id }}
                            <option value="{{$cComptable->id}}" selected>{{ $cComptable->numero_compte }} - {{ $cComptable->nom }}</option>
                            @endforeach
                            </select>
                         @error('comptes_vente_id') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                      </div>
                      <br>
                      <br>
                      <hr>
                      {{-- <label class="form-label" for="prix_unitaire_stock">Prix unitaire</label> --}}

                      <input type="checkbox" wire:model="according"  value="1"><b> Solde d'ouverture </b>
                      {{-- {{ $this->cocher }} --}}
                      <br><br>

                      <div class="row">
                        <div class="col-md-4" >
                            <label class="form-label" for="qte_initiale">Quantité initiale</label>
                            <input class="form-control" wire:model="qte_initiale" id="qte_initiale" type="number" {{ $this->case }}/>
                            @error('qte_initiale') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label" for="prix_unitaire_stock">Prix unitaire</label>
                            <input class="form-control" wire:model="prix_unitaire_stock" id="prix_unitaire_stock" type="number" {{ $this->case }}/>
                            @error('prix_unitaire_stock') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label" for="date_debut_stock"> En date de </label>
                            <input class="form-control datetimepicker" wire:model="date_debut_stock" id="date_debut_stock" type="Date" {{ $this->case }}/>
                            @error('date_debut_stock') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <br><br>


                  {{-- <div class="accordion mt-4 mb-4" id="accordionExample2" disabled>
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="heading2">
                          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="true" aria-controls="collapse2">Solde d'ouverture</button>
                        </h2>
                        <div class="accordion-collapse collapse {{ $this->affiche }}" id="collapse2" aria-labelledby="heading2" data-bs-parent="#accordionExample2">
                          <div class="accordion-body">
                            <div class="row">
                              <div class="col-md-4" >
                                  <label class="form-label" for="qte_initiale">Quantité initiale</label>
                                  <input class="form-control" wire:model="qte_initiale" id="qte_initiale" type="number" {{ $this->case }}/>
                                  @error('qte_initiale') <span class="text-danger">{{ $message }}</span> @enderror
                              </div>

                              <div class="col-md-4">
                                  <label class="form-label" for="prix_unitaire_stock">Prix unitaire</label>
                                  <input class="form-control" wire:model="prix_unitaire_stock" id="prix_unitaire_stock" type="number" {{ $this->case }}/>
                                  @error('prix_unitaire_stock') <span class="text-danger">{{ $message }}</span> @enderror
                              </div>

                              <div class="col-md-4">
                                  <label class="form-label" for="date_debut_stock"> En date de </label>
                                  <input class="form-control datetimepicker" wire:model="date_debut_stock" id="date_debut_stock" type="Date" {{ $this->case }}/>
                                  @error('date_debut_stock') <span class="text-danger">{{ $message }}</span> @enderror
                              </div>

                          </div>
                          <br>

                          </div>
                        </div>
                      </div>
                    </div> --}}

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeExpressModal('article')">
                        {{__('messages.cancel')}}
                    </button>
                    <button type="submit" class="btn btn-primary">{{__('messages.save')}}</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>

        </div>
    </div>
</div>
