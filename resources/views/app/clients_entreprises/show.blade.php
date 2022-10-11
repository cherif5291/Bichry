@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('clients-entreprises.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.clients_entreprises.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>
                        @lang('crud.clients_entreprises.inputs.entreprise_id')
                    </h5>
                    <span
                        >{{
                        optional($clientsEntreprise->entreprise)->nom_entreprise
                        ?? '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.clients_entreprises.inputs.nom')</h5>
                    <span>{{ $clientsEntreprise->nom ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.clients_entreprises.inputs.prenom')</h5>
                    <span>{{ $clientsEntreprise->prenom ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.clients_entreprises.inputs.entreprise')</h5>
                    <span>{{ $clientsEntreprise->entreprise ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.clients_entreprises.inputs.email')</h5>
                    <span>{{ $clientsEntreprise->email ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.clients_entreprises.inputs.telephone')</h5>
                    <span>{{ $clientsEntreprise->telephone ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.clients_entreprises.inputs.portable')</h5>
                    <span>{{ $clientsEntreprise->portable ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.clients_entreprises.inputs.nom_pro')</h5>
                    <span>{{ $clientsEntreprise->nom_pro ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.clients_entreprises.inputs.nom_chequier')
                    </h5>
                    <span>{{ $clientsEntreprise->nom_chequier ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.clients_entreprises.inputs.titre')</h5>
                    <span>{{ $clientsEntreprise->titre ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.clients_entreprises.inputs.telecopie')</h5>
                    <span>{{ $clientsEntreprise->telecopie ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.clients_entreprises.inputs.website')</h5>
                    <span>{{ $clientsEntreprise->website ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.clients_entreprises.inputs.adresse')</h5>
                    <span>{{ $clientsEntreprise->adresse ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.clients_entreprises.inputs.ville')</h5>
                    <span>{{ $clientsEntreprise->ville ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.clients_entreprises.inputs.province')</h5>
                    <span>{{ $clientsEntreprise->province ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.clients_entreprises.inputs.code_postale')
                    </h5>
                    <span>{{ $clientsEntreprise->code_postale ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.clients_entreprises.inputs.pays')</h5>
                    <span>{{ $clientsEntreprise->pays ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.clients_entreprises.inputs.note')</h5>
                    <span>{{ $clientsEntreprise->note ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.clients_entreprises.inputs.paiements_mode_id')
                    </h5>
                    <span
                        >{{ optional($clientsEntreprise->paiementsMode)->nom ??
                        '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.clients_entreprises.inputs.paiements_modalite_id')
                    </h5>
                    <span
                        >{{ optional($clientsEntreprise->paiementsModalite)->id
                        ?? '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.clients_entreprises.inputs.devises_monetaire_id')
                    </h5>
                    <span
                        >{{ optional($clientsEntreprise->devisesMonetaire)->nom
                        ?? '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.clients_entreprises.inputs.logo')</h5>
                    <span>{{ $clientsEntreprise->logo ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('clients-entreprises.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\ClientsEntreprise::class)
                <a
                    href="{{ route('clients-entreprises.create') }}"
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
