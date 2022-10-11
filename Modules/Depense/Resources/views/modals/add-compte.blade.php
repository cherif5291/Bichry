<!-- Modal -->
<div class="modal bd-example-modal-md" @if ($showModalCompte)style="display: block"@endif id="factureComPopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content shadow-lg">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('messages.accounting_account_add')}}</h5>
                <button type="button" class="btn" wire:click="closeExpressModal('compte')" aria-label="Close">
                    <i class="fas fa-times-circle"></i>
                </button>
            </div>
            <form wire:submit.prevent='saveCompteComptable'>
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label" for="nom">{{__('messages.name')}}</label>
                            <input class="form-control" wire:model="nom" id="nom" type="text"  required />
                            @error('nom') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="numero_compte">{{__('messages.account_number')}}</label>
                            <input class="form-control" wire:model="numero_compte" id="numero_compte" type="number" min="1" value="1"  required="" />
                            @error('numero_compte') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                          <label class="form-label" for="type_compteID">Type compte</label>
                          <select class="form-control" id="type_compteID" wire:model="type_compteID" required>
                            <option  selected>Choisir Type Compte</option>
                            @foreach ($type_compte as $type_cpt)
                              <option value="{{$type_cpt}}">{{ $type_cpt }}</option>
                            @endforeach
                          </select>
                          @error('type_compte') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
                      <div class="col-md-6">
                          <label class="form-label" for="sous_type_compteID">Sous Type </label>
                          <select class="form-control" id="sous_type_compteID" wire:model="sous_type_compteID" required>
                            <option selected>Choisir Sous type</option>
                            @foreach ($sous_type_compte as $sous_type_cpt)
                              <option value="{{$sous_type_cpt}}">{{ $sous_type_cpt }}</option>
                            @endforeach
                          </select>
                          @error('type_compte') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
                  </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeExpressModal('compte')">
                        {{__('messages.cancel')}}
                    </button>
                    <button type="submit" class="btn btn-primary">{{__('messages.save')}}</button>
                </div>

            </form>
        </div>
    </div>
</div>
