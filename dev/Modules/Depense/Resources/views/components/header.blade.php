<div class="card-header">
    <div class="row flex-between-end">
      <div class="col-auto align-self-center">
        {{-- <h5 class="mb-0" data-anchor="data-anchor">Example</h5> --}}
        <h4 >
          {{$PageName ?? "no page name (Déclarer la variable PageName sur le controlleur de cette view avec le nom de la page.)"}}
      </h4>

      </div>
      <div class="col-auto ms-auto">
        <div class="nav nav-pills nav-pills-falcon flex-grow-1" role="tablist">
          @if (Auth::user()->habilitation->fonctionnalites->where('module_id', 2)->first()->voir == "yes")
          <a href="{{route('entreprise.fournisseurs.list')}}" class="btn btn-dark text-light mr-2" style="margin-right: 1em ">Fournisseurs</a>
          @endif
          @if (Auth::user()->habilitation->fonctionnalites->where('module_id', 6)->first()->ajouter == "yes")
          <div class="btn-group" role="group">
              <button class="btn btn-primary bg-line-chart-gradient text-light dropdown-toggle" id="btnGroupVerticalDrop1" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ajouter une dépenses</button>
              <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">

                 <button class="dropdown-item" wire:click.prevent="openAddDepenseModal('facture')">{{__('messages.invoice_to_pay')}}</button>
                 <button class="dropdown-item" wire:click.prevent="openAddDepenseModal('depense')">{{__('messages.expense')}}</button>
                 <button class="dropdown-item" wire:click.prevent="openAddDepenseModal('cheque')">{{__('messages.check')}}</button>
                 <button class="dropdown-item" wire:click.prevent="openAddDepenseModal('credit')">{{__('messages.vendor_credit')}}</button>

              </div>
            </div>
          @else
              @include('layouts.admin.required.includes.controle.accessDeniedBtnAdd')
          @endif


         </div>
      </div>
    </div>
  </div>
