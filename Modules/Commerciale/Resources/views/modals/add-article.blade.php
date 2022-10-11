<!-- Modal -->
<div class="modal bd-example-modal-lg" @if ($showModalArticle)style="display: block"@endif id="factureComPopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content shadow-lg">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('messages.add_a')}} produit/service</h5>
                <button type="button" class="btn" wire:click="closeModal('article')" aria-label="Close">
                    <i class="fas fa-times-circle"></i>
                </button>
            </div>
            <form wire:submit.prevent='saveCategorie'>
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label" for="nom">{{__('messages.name_of')}}produit/service <span class="text-danger">*</span></label>
                            <input class="form-control" wire:model="nom" id="nom" type="text"   />
                            @error('nom') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-md-3">
                            <label class="form-label" for="stock">{{__('messages.stock')}}</label>
                            <input class="form-control" wire:model="stock" id="stock" type="number" min="1" value="1"  required="" />
                            @error('stock') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-md-3">
                            <label class="form-label" for="type">Type <span class="text-danger">*</span> </label>
                            <select class="form-select" wire:model="type" id="type" >
                                <option hidden value="">{{__('messages.chose')}}</option>
                                <option value="produit">Produit</option>
                                <option value="service">Service</option>
                            </select>
                            @error('type') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="comptes_comptable_id">{{__('messages.accounting_account')}} <span class="text-danger">*</span></label>
                            <select class="form-select" wire:model="comptes_comptable_id" id="comptes_comptable_id" >
                                <option hidden value="">{{__('messages.chose')}}</option>
                            @foreach (getDataBySession()['ComptesComptables'] as $cComptable)
                            <option value="{{$cComptable->id}}">{{$cComptable->nom}}</option>
                            @endforeach
                            </select>
                            @error('comptes_comptable_id') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="prix_unitaire">{{__('messages.amount')}} </label>
                            <input class="form-control" wire:model="prix_unitaire" id="prix_unitaire" value="0" min="0" type="number"  />
                            @error('prix_unitaire') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-md-6" hidden>
                            <label class="form-label" for="taxe_id">{{__('messages.use_with_taxe')}}</label>
                            <select class="form-select" wire:model="taxe_id" id="taxe_id" >
                                <option hidden value="">{{__('messages.chose')}}</option>
                            @foreach (getDataBySession()['Taxes'] as $taxe)
                            <option value="{{$taxe->id}}">{{$taxe->nom}} ({{$taxe->taux}}%)</option>
                            @endforeach
                            </select>
                            @error('taxe_id') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                    </div>
                   <div class="row">
                    <div class="col-md-12" hidden>
                        <label class="form-label" for="description">{{__('messages.description_of')}} produit/service</label>
                        <textarea wire:model="description" class="form-control" id="description" cols="30" rows="3"></textarea>
                        @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    {{-- <div class="col-md-12">
                        <label class="form-label" for="customFile">{{__('messages.image_of')}} produit/service</label>
                        <input wire:model="image" class="form-control" id="customFile" type="file" />
                        @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                    </div> --}}
                   </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal('article')">
                        {{__('messages.cancel')}}
                    </button>
                    <button type="submit" class="btn btn-primary">{{__('messages.save')}}</button>
                </div>

            </form>
        </div>
    </div>
</div>
