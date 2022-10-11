@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('contrats.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.contrats.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.contrats.inputs.status')</h5>
                    <span>{{ $contrat->status ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.contrats.inputs.signature1')</h5>
                    <span>{{ $contrat->signature1 ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.contrats.inputs.signature2')</h5>
                    <span>{{ $contrat->signature2 ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.contrats.inputs.entreprise_id')</h5>
                    <span
                        >{{ optional($contrat->entreprise)->nom_entreprise ??
                        '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.contrats.inputs.clients_entreprise_id')</h5>
                    <span
                        >{{ optional($contrat->clientsEntreprise)->nom ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.contrats.inputs.employes_entreprise_id')
                    </h5>
                    <span
                        >{{ optional($contrat->employesEntreprise)->prenom ??
                        '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.contrats.inputs.facture_id')</h5>
                    <span
                        >{{ optional($contrat->facture)->cc_cci ?? '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.contrats.inputs.project_id')</h5>
                    <span>{{ optional($contrat->project)->nom ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.contrats.inputs.fournisseur_id')</h5>
                    <span
                        >{{ optional($contrat->fournisseur)->prenom ?? '-'
                        }}</span
                    >
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('contrats.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Contrat::class)
                <a href="{{ route('contrats.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
