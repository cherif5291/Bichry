<table id="example" class="table table-hover table-striped " style="width:100%">
    <thead class="text-light" style="background-color: #232e3c">
        <tr>
            <th>{{__('messages.no')}}</th>
            <th>{{__('messages.type')}}</th>
            <th>{{__('messages.beneficiary')}}</th>
            <th>{{__('messages.note')}}</th>
            <th>{{__('messages.sub_total')}}</th>
            <th>{{__('messages.taxe')}}</th>
            <th>{{__('messages.total')}}</th>
            <th>{{__('messages.date')}}</th>
            <th style="width: 5%">{{__('messages.action')}}</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($Factures->where('type', '!=', 'depense') as $facture)
        <tr>
            <td>
                @if ($facture->numero_facture)
                {{$facture->numero_facture}}
                @elseif ($facture->reference)
                {{$facture->reference}}
                @endif
            </td>
            <td>{{$facture->type}}</td>
            <td>
                @if ($facture->clients_entreprise_id)
                {{Clients()->find($facture->clients_entreprise_id)->entreprise ?? ''}}
                @elseif ($facture->fournisseur_id)
                {{Fournisseurs()->find($facture->fournisseur_id)->entreprise ?? ''}}
                @endif
            </td>
            <td>{{$facture->message}}</td>
            <td>{!! formatpriceth($facture->total_sans_taxe, getCurrency()) !!}</td>
            <td>{!! formatpriceth($facture->taxe, getCurrency()) !!}</td>
            <td>{!! formatpriceth($facture->total, getCurrency()) !!}</td>
            <td>{{$facture->created_at->format('d M Y')}}</td>
            <td>
                <small>
                    <div class="btn-group">
                        <button class="btn btn-dark btn-sm dropdown-toggle" type="button"
                            data-bs-toggle="dropdown" data-display="static" aria-haspopup="true"
                            aria-expanded="false"><i class="fas fa-grip-vertical"></i>
                            Option
                        </button>
                        <div class="dropdown-menu dropdown-menu-end fixed-top">

                            @if (Auth::user()->habilitation->fonctionnalites->where('module_id',4)->first()->supprimer == "yes")
                            @if ($facture->type == "facture")
                                {{-- <button class="dropdown-item btn-paid-facture"
                                    wire:click="selectItem({{ $facture->id }}, 'PaiementfacturePopup')"
                                    onclick="openpopup('PaiementfacturePopup')"
                                    facture-id="{{ $facture->id ?? '' }}">
                                    <i class="fab fa-cc-visa"></i> Effectuer paiement facture
                                </button> --}}
                            @elseif ($facture->type == "recu")
                                {{-- <button class="dropdown-item btn-paid-recu"
                                    wire:click="selectItem({{ $facture->id }}, 'PaiementRecuPopup')"
                                    onclick="openpopup('PaiementRecuPopup')"
                                    recu-id="{{ $facture->id ?? '' }}" >
                                    <i class="fab fa-cc-visa"></i>
                                    {{__('messages.make_payment')}}
                                </button> --}}
                            @endif
                                <a class="dropdown-item"
                                    href="{{route('entreprise.factures.facture', $facture->id)}}">
                                    <i class="far fa-file-pdf"></i> {{__('messages.see_invoice')}}
                                </a>
                            @else
                                @include('layouts.admin.required.includes.controle.accessDeniedBtnDelete')
                            @endif

                            @if (Auth::user()->habilitation->fonctionnalites->where('module_id', 4)->first()->modifier == "yes")
                                <div class="dropdown-divider"></div>
                            @if ($facture->type == "facture")
                                <button class="dropdown-item btn-edit-facture" facture-id="{{ $facture->id ?? '' }}"
                                    class="cd-popup-trigger btn btn-info"
                                    wire:click="selectItem({{ $facture->id }}, 'factureComPopup')"
                                    {{-- onclick="openpopup('factureComPopup')" --}}>
                                    <i class="fa fa-edit"></i> {{__('messages.edit')}}
                                </button>
                            @elseif ($facture->type == "recu")
                                <button class="dropdown-item btn-edit-recu" recu-id="{{ $facture->id ?? '' }}"
                                    class="cd-popup-trigger btn btn-success"
                                    wire:click="selectItem({{ $facture->id }}, 'recuPopup')"
                                    {{-- onclick="openpopup('recuPopup')" --}}>
                                    <i class="fa fa-edit"></i> {{__('messages.edit')}}
                                </button>
                            @endif
                            @else
                                @include('layouts.admin.required.includes.controle.accessDeniedBtnEdit')
                            @endif

                        </div>
                    </div>
                </small>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
