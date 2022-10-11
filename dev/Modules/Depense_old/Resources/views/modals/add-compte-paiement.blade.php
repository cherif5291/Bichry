<div class="modal  bd-example-modal-lg" id="" @if ($showModalPaiement) style="display: block" @endif
    id="" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php
    if ($showModalPaiement != '') {
        $this->solde = 0;
        $this->entreprise_id = 0;
        $this->type = 'cpt_paiement';
    }
    ?>
    <div class="modal-dialog modal-dialog-scrollable" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('messages.accounting_paiement_add') }}</h5>
                    <button type="button" class="btn" wire:click="closeExpressModal('paiement')" aria-label="Close">
                        <i class="fas fa-times-circle"></i>
                    </button>
                </div>
                <form wire:submit.prevent='saveComptePaiement'>
                    <div class="modal-body">
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <label class="form-label" for="nom">Nom {{-- <span
                      class="text-danger">*</span> --}}</label>
                                <input class="form-control" wire:model="nom" id="nom" type="text" />
                                @error('nom')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <input class="form-control" wire:model="entreprise_id" id="entreprise_id" type="hidden"
                                    required />
                                @error('entreprise')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                {{-- <label class="form-label" for="type">Type </label> --}}
                                <input class="form-control" wire:model="type" id="type" type="hidden" />
                                @error('type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                {{-- <label class="form-label" for="solde">Solde</label> --}}
                                <input class="form-control" wire:model="solde" id="solde" type="hidden" />
                                @error('solde')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                {{-- <label class="form-label" for="numero_compte">Numero Compte </label> --}}
                                <input class="form-control" wire:model="numero_compte" id="numero_compte"
                                    type="hidden" />
                                @error('numero_compte')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                {{-- <label class="form-label" for="is_default">Is default </label> --}}
                                <input class="form-control" wire:model="is_default" id="is_default" value=""
                                    type="hidden" />
                                @error('is_default')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeExpressModal('paiement')">
                        {{ __('messages.cancel') }}
                    </button>
                    <button type="submit" class="btn btn-primary">{{ __('messages.save') }}</button>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
