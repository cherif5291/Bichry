<div class="card-header">
    <div class="row flex-between-end">
        <div class="col-auto align-self-center">
            <h4>
                {{$PageName ?? "no page name (Déclarer la variable PageName sur le controlleur de cette view avec le
                nom de la page.)"}}
            </h4>
        </div>
        <div class="col-auto ms-auto">
            <div class="nav nav-pills nav-pills-falcon flex-grow-1" role="tablist">


                @if (Auth::user()->habilitation->fonctionnalites->where('module_id', 1)->first()->voir == "yes")
                <a href="{{route('entreprise.fournisseurs.list')}}" class="btn btn-dark text-light mr-2"
                    style="margin-right: 1em ">{{__('messages.vendors')}}</a>

                @endif

                @if (Auth::user()->habilitation->fonctionnalites->where('module_id', 4)->first()->ajouter == "yes")
                <div class="btn-group" role="group">
                    <button class="btn bg-line-chart-gradient text-light dropdown-toggle" id="btnGroupVerticalDrop1"
                        type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">{{__('messages.add_invoice')}}</button>
                    <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">
                        <button class="dropdown-item" class="cd-popup-trigger" wire:click="selectItem('0', 'addFacture')">{{__('messages.invoice')}}</button>
                        <button class="dropdown-item" class="cd-popup-trigger" wire:click="selectItem('0', 'addRecu')">{{__('messages.receipt')}}</button>


                    </div>
                </div>
                @else
                @include('layouts.admin.required.includes.controle.accessDeniedBtnAdd')
                @endif


            </div>
        </div>
    </div>
</div>
