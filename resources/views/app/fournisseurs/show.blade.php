@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('fournisseurs.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.fournisseurs.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.fournisseurs.inputs.entreprise_id')</h5>
                    <span
                        >{{ optional($fournisseur->entreprise)->nom_entreprise
                        ?? '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.fournisseurs.inputs.prenom')</h5>
                    <span>{{ $fournisseur->prenom ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.fournisseurs.inputs.nom')</h5>
                    <span>{{ $fournisseur->nom ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.fournisseurs.inputs.entreprise')</h5>
                    <span>{{ $fournisseur->entreprise ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.fournisseurs.inputs.nom_pro')</h5>
                    <span>{{ $fournisseur->nom_pro ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.fournisseurs.inputs.nom_chequier')</h5>
                    <span>{{ $fournisseur->nom_chequier ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.fournisseurs.inputs.email')</h5>
                    <span>{{ $fournisseur->email ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.fournisseurs.inputs.telephone')</h5>
                    <span>{{ $fournisseur->telephone ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.fournisseurs.inputs.portable')</h5>
                    <span>{{ $fournisseur->portable ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.fournisseurs.inputs.telecopie')</h5>
                    <span>{{ $fournisseur->telecopie ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.fournisseurs.inputs.website')</h5>
                    <span>{{ $fournisseur->website ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.fournisseurs.inputs.titre')</h5>
                    <span>{{ $fournisseur->titre ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.fournisseurs.inputs.adresse')</h5>
                    <span>{{ $fournisseur->adresse ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.fournisseurs.inputs.ville')</h5>
                    <span>{{ $fournisseur->ville ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.fournisseurs.inputs.province')</h5>
                    <span>{{ $fournisseur->province ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.fournisseurs.inputs.code_postal')</h5>
                    <span>{{ $fournisseur->code_postal ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.fournisseurs.inputs.pays')</h5>
                    <span>{{ $fournisseur->pays ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.fournisseurs.inputs.note')</h5>
                    <span>{{ $fournisseur->note ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.fournisseurs.inputs.paiements_modalite_id')
                    </h5>
                    <span
                        >{{ optional($fournisseur->paiementsModalite)->id ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.fournisseurs.inputs.numero_compte')</h5>
                    <span>{{ $fournisseur->numero_compte ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.fournisseurs.inputs.comptescomptable_id')
                    </h5>
                    <span
                        >{{ optional($fournisseur->comptescomptable)->nom ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.fournisseurs.inputs.solde_ouverture')</h5>
                    <span>{{ $fournisseur->solde_ouverture ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.fournisseurs.inputs.date_ouverture')</h5>
                    <span>{{ $fournisseur->date_ouverture ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.fournisseurs.inputs.devises_monetaire_id')
                    </h5>
                    <span
                        >{{ optional($fournisseur->devisesMonetaire)->nom ?? '-'
                        }}</span
                    >
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('fournisseurs.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Fournisseur::class)
                <a
                    href="{{ route('fournisseurs.create') }}"
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
