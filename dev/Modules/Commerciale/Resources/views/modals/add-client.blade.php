<div class="modal  bd-example-modal-lg " id="exampleModal" @if ($showModalClient) style="display: block" @endif
    id="clientModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content shadow-lg">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('messages.add_a')}} Client</h5>
                <button type="button" class="btn" wire:click="closeModal('fournisseur')" aria-label="Close">
                    <i class="fas fa-times-circle"></i>
                </button>
            </div>
            <form wire:submit.prevent='saveArticleFacture'>
                @csrf
                <div class="modal-body">
                    <div class="row mb-2">
                        <div class="col-md-4">
                            <label class="form-label" for="entreprise">{{__('messages.client_name')}} <span
                                    class="text-danger">*</span></label>
                            <input class="form-control" wire:model="entreprise" id="entreprise" type="text"
                                required="" />
                            @error('entreprise') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-md-4" >
                            <label class="form-label" for="email">{{__('messages.email')}} <span
                                    class="text-danger">*</span></label>
                            <input class="form-control" wire:model="email" id="email" required type="email" />
                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-md-4" >
                            <label class="form-label" for="telephone">{{__('messages.telephone')}} <span
                                    class="text-danger">*</span></label>
                            <input class="form-control" wire:model="telephone" id="telephone" type="tel" required="" />
                            @error('telephone') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="row mb-2" hidden>
                        <div class="col-md-4">
                            <label class="form-label" for="prenom">{{__('messages.vendor_user_first_name')}} <span
                                    class="text-danger">*</span></label>
                            <input class="form-control" wire:model="prenom" id="prenom" type="text" />
                            @error('prenom') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-md-4" >
                            <label class="form-label" for="nom">{{__('messages.vendor_user_last_name')}} <span
                                    class="text-danger">*</span></label>
                            <input class="form-control" wire:model="nom" id="nom" type="text" />
                            @error('nom') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="titre">{{__('messages.vendor_user_position')}}</label>
                            <input class="form-control" wire:model="titre" id="titre" type="text" />
                            @error('titre') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="row mb-2" hidden>
                        <div class="col-md-4">
                            <label class="form-label" for="adresse">{{__('messages.address')}}</label>
                            <input class="form-control" wire:model="adresse" id="adresse" type="text" />
                            @error('adresse') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="ville">{{__('messages.town')}}</label>
                            <input class="form-control" id="ville" wire:model="ville" type="text" />
                            @error('ville') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="pays">{{__('messages.country')}} <span
                                    class="text-danger">*</span></label>
                            <select class="form-select js-example-basic-single" id="example-select" wire:model="pays"
                                id="pays">
                                <option hidden value="">{{__('messages.chose')}}</option>
                                @foreach (getPays() as $key=>$pays)
                                <option value="{{$pays->nom}}">{{$pays->nom}}</option>
                                @endforeach

                            </select>
                            @error('pays') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-4" hidden>
                            <label class="form-label" for="paiements_modalite_id">{{__('messages.payment_modality')}}
                                <span class="text-danger">*</span>
                            </label>
                            <select class="form-select" wire:model="paiements_modalite_id" id="paiements_modalite_id">
                                <option hidden value="">{{__('messages.chose')}}</option>

                                @foreach (getDataBySession()['Modalites'] as $key=>$modalite)
                                <option value="{{$modalite->id}}" {{$key==1 ? 'selected' : '' }}>{{$modalite->nom}}
                                </option>
                                @endforeach
                            </select>
                            @error('paiements_modalite_id') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-md-4" hidden>
                            <label class="form-label" for="devises_monetaire_id">{{__('messages.currency')}} <span
                                    class="text-danger">*</span></label>
                            <select class="form-select" readonly wire:model="devises_monetaire_id"
                                id="devises_monetaire_id">
                                <option value="" hidden>{{__('messages.chose')}}</option>
                                @foreach (getDataBySession()['DevisesMonetaires'] as $devise)

                                <option value="{{$devise->id}}" @if ($devise->id ==1) selected @endif>{{$devise->nom}}
                                    ({{$devise->sigle}})</option>
                                @endforeach

                            </select>
                            @error('devises_monetaire_id') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-md-4" hidden>
                            <label class="form-label" for="paiements_mode_id">{{__('messages.payment_mode')}} <span
                                    class="text-danger">*</span>
                            </label>
                            <select class="form-select" wire:model="paiements_mode_id" id="paiements_mode_id">
                                <option value="" hidden>{{__('messages.chose')}}</option>

                                @foreach (getDataBySession()['ModesPaiements'] as $pmode)
                                <option value="{{$pmode->id}}">{{$pmode->nom}}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">{{__('messages.you_must_field_this_case')}}</div>
                            @error('paiements_mode_id') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal('fournisseur')">
                        {{__('messages.cancel')}}
                    </button>
                    <button type="submit" class="btn btn-primary">{{__('messages.save')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
