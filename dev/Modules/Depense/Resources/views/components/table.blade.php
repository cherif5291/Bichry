<table id="example" class="table table-hover table-striped overflow-hidden" style="width:100%">
    <thead class="text-light" style="background-color: #232e3c">
        <tr>
            <th>{{__('messages.date')}}</th>
            <th>{{__('messages.type')}}</th>
            <th>{{__('messages.beneficiary')}}</th>
            <th>{{__('messages.no')}}</th>
            <th>{{__('messages.note')}}</th>
            <th>{{__('messages.sub_total')}}</th>
            <th>{{__('messages.taxes')}}</th>
            <th>{{__('messages.total')}}</th>
            <th style="width: 2%">{{__('messages.action')}}</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($Depenses->where('status', '!=', "draft") as $depense)


        <tr>
            <td>{{$depense->created_at->format('d M Y')}}</td>

            @if ($depense->type == "credit")
            <td>{{__('messages.vendors_credit')}}</td>
            @elseif ($depense->type == "facture")
            <td>{{__('messages.invoice')}}</td>
            @elseif ($depense->type == "depense")
            <td>{{__('messages.expense')}}</td>
            @elseif ($depense->type == "cheque")
            <td>{{__('messages.check')}}</td>
            @endif
            @if ($depense->fournisseur_id)
            <td>{{$depense->fournisseur->entreprise??"ff"}}</td>

            @elseif ($depense->clients_entreprise_id)
            <td>{{$depense->clientsEntreprise->entreprise}}</td>

            @endif
            @if ($depense->type == "facture")
            <td>{{$depense->facture->numero_facture ??"-- "}}</td>
            @elseif ($depense->type == "depense")
            <td>{{$depense->depensesSimple->reference ??"--"}}</td>
            @elseif ($depense->type == "cheque")
            <td>{{$depense->cheque->numero_cheque??"--"}}</td>
            @elseif ($depense->type == "credit")
            <td>{{$depense->fournisseursCredit->note ??""}}</td>
            @endif
            @if ($depense->type == "facture")
            <td>{{$depense->message}}</td>
            @elseif ($depense->type == "depense")
            <td>{{$depense->note}}</td>
            @elseif ($depense->type == "cheque")
            <td>{{$depense->note}}</td>
            @elseif ($depense->type == "credit")
            <td>{{$depense->note}}</td>
            @endif
            <td>{!! formatpriceth($depense->total_sans_taxe??0, getCurrency()) !!}</td>
            <td>{!! formatpriceth($depense->taxe??0, getCurrency()) !!}</td>
            <td>{!! formatpriceth($depense->total??0, getCurrency()) !!}</td>
            @if (Auth::user()->habilitation->fonctionnalites->where('module_id', 6)->first()->modifier == "yes")
            <td>
                <button class="btn btn-primary bg-line-chart-gradient btn-edit-facture" wire:click="openUpdateDepenseModal({{ $depense->id }}, '{{$depense->type}}')"
                    >{{__('messages.edit')}}
                </button>
            </td>
            @else
            @include('layouts.admin.required.includes.controle.accessDeniedBtnEdit')
            @endif

        </tr>
        @endforeach


    </tbody>
    <!-- <tfoot>
        <tr>
            <th>{{__('messages.date')}}</th>
            <th>{{__('messages.type')}}</th>
            <th>{{__('messages.beneficiary')}}</th>
            <th>{{__('messages.no')}}</th>
            <th>{{__('messages.note')}}</th>
            <th>{{__('messages.sub_total')}}</th>
            <th>{{__('messages.taxes')}}</th>
            <th>{{__('messages.total')}}</th>
            <th style="width: 2%">{{__('messages.action')}}</th>

        </tr>
    </tfoot> -->
</table>
