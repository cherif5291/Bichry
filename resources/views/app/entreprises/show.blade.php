@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('entreprises.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.entreprises.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.entreprises.inputs.user_id')</h5>
                    <span>{{ optional($entreprise->user)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.entreprises.inputs.nom_entreprise')</h5>
                    <span>{{ $entreprise->nom_entreprise ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.entreprises.inputs.a_propos')</h5>
                    <span>{{ $entreprise->a_propos ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.entreprises.inputs.email')</h5>
                    <span>{{ $entreprise->email ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.entreprises.inputs.telephone')</h5>
                    <span>{{ $entreprise->telephone ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.entreprises.inputs.portable')</h5>
                    <span>{{ $entreprise->portable ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.entreprises.inputs.adresse')</h5>
                    <span>{{ $entreprise->adresse ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.entreprises.inputs.capital')</h5>
                    <span>{{ $entreprise->capital ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.entreprises.inputs.logo')</h5>
                    <span>{{ $entreprise->logo ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.entreprises.inputs.modeles_devis_id')</h5>
                    <span
                        >{{ optional($entreprise->modelesDevis)->nom ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.entreprises.inputs.modeles_facture_id')</h5>
                    <span
                        >{{ optional($entreprise->modelesFacture)->nom ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.entreprises.inputs.modeles_recu_id')</h5>
                    <span
                        >{{ optional($entreprise->modelesRecu)->nom ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.entreprises.inputs.devises_monetaire_id')
                    </h5>
                    <span
                        >{{ optional($entreprise->devisesMonetaire)->nom ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.entreprises.inputs.couleur_primaire')</h5>
                    <span>{{ $entreprise->couleur_primaire ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.entreprises.inputs.couleur_secondaire')</h5>
                    <span>{{ $entreprise->couleur_secondaire ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('entreprises.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Entreprise::class)
                <a
                    href="{{ route('entreprises.create') }}"
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
