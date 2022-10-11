@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('factures.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.factures.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.factures.inputs.clients_entreprise_id')</h5>
                    <span
                        >{{ optional($facture->clientsEntreprise)->nom ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.factures.inputs.paiements_modalite_id')</h5>
                    <span
                        >{{ optional($facture->paiementsModalite)->id ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.factures.inputs.factures_article_id')</h5>
                    <span
                        >{{ optional($facture->facturesArticle)->id ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.factures.inputs.cc_cci')</h5>
                    <span>{{ $facture->cc_cci ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.factures.inputs.echeance')</h5>
                    <span>{{ $facture->echeance ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.factures.inputs.adresse_facturation')</h5>
                    <span>{{ $facture->adresse_facturation ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.factures.inputs.numero_facture')</h5>
                    <span>{{ $facture->numero_facture ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.factures.inputs.messsage')</h5>
                    <span>{{ $facture->messsage ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.factures.inputs.message_affiche')</h5>
                    <span>{{ $facture->message_affiche ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.factures.inputs.has_taxe')</h5>
                    <span>{{ $facture->has_taxe ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.factures.inputs.fournisseur_id')</h5>
                    <span
                        >{{ optional($facture->fournisseur)->prenom ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.factures.inputs.type')</h5>
                    <span>{{ $facture->type ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('factures.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Facture::class)
                <a href="{{ route('factures.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
