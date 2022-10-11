@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('reglements.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.reglements.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>
                        @lang('crud.reglements.inputs.clients_entreprise_id')
                    </h5>
                    <span
                        >{{ optional($reglement->clientsEntreprise)->nom ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.reglements.inputs.facture_id')</h5>
                    <span
                        >{{ optional($reglement->facture)->cc_cci ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.reglements.inputs.paiements_mode_id')</h5>
                    <span
                        >{{ optional($reglement->paiementsMode)->nom ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.reglements.inputs.reference')</h5>
                    <span>{{ $reglement->reference ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.reglements.inputs.cc_cci')</h5>
                    <span>{{ $reglement->cc_cci ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.reglements.inputs.approvisionnememnt')</h5>
                    <span>{{ $reglement->approvisionnememnt ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.reglements.inputs.banque_id')</h5>
                    <span>{{ optional($reglement->banque)->nom ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.reglements.inputs.caisse_id')</h5>
                    <span>{{ optional($reglement->caisse)->nom ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.reglements.inputs.montant_recu')</h5>
                    <span>{{ $reglement->montant_recu ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.reglements.inputs.note')</h5>
                    <span>{{ $reglement->note ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('reglements.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Reglement::class)
                <a
                    href="{{ route('reglements.create') }}"
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
