@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('recus-ventes.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.recus_ventes.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>
                        @lang('crud.recus_ventes.inputs.clients_entreprise_id')
                    </h5>
                    <span
                        >{{ optional($recusVente->clientsEntreprise)->nom ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.recus_ventes.inputs.cc_cci')</h5>
                    <span>{{ $recusVente->cc_cci ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.recus_ventes.inputs.adresse_livraison')</h5>
                    <span>{{ $recusVente->adresse_livraison ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.recus_ventes.inputs.date_recu_vente')</h5>
                    <span>{{ $recusVente->date_recu_vente ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.recus_ventes.inputs.reference')</h5>
                    <span>{{ $recusVente->reference ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.recus_ventes.inputs.numero_recu')</h5>
                    <span>{{ $recusVente->numero_recu ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.recus_ventes.inputs.article_id')</h5>
                    <span
                        >{{ optional($recusVente->article)->nom ?? '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.recus_ventes.inputs.paiements_mode_id')</h5>
                    <span
                        >{{ optional($recusVente->paiementsMode)->nom ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.recus_ventes.inputs.message_recu')</h5>
                    <span>{{ $recusVente->message_recu ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.recus_ventes.inputs.message_releve')</h5>
                    <span>{{ $recusVente->message_releve ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.recus_ventes.inputs.depose_sur')</h5>
                    <span>{{ $recusVente->depose_sur ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.recus_ventes.inputs.caisse_id')</h5>
                    <span>{{ optional($recusVente->caisse)->nom ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.recus_ventes.inputs.banque_id')</h5>
                    <span>{{ optional($recusVente->banque)->nom ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.recus_ventes.inputs.montant')</h5>
                    <span>{{ $recusVente->montant ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('recus-ventes.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\RecusVente::class)
                <a
                    href="{{ route('recus-ventes.create') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
