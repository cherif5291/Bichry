@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">@lang('crud.factures.index_title')</h4>
            </div>

            <div class="searchbar mt-4 mb-5">
                <div class="row">
                    <div class="col-md-6">
                        <form>
                            <div class="input-group">
                                <input
                                    id="indexSearch"
                                    type="text"
                                    name="search"
                                    placeholder="{{ __('crud.common.search') }}"
                                    value="{{ $search ?? '' }}"
                                    class="form-control"
                                    autocomplete="off"
                                />
                                <div class="input-group-append">
                                    <button
                                        type="submit"
                                        class="btn btn-primary"
                                    >
                                        <i class="icon ion-md-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 text-right">
                        @can('create', App\Models\Facture::class)
                        <a
                            href="{{ route('factures.create') }}"
                            class="btn btn-primary"
                        >
                            <i class="icon ion-md-add"></i>
                            @lang('crud.common.create')
                        </a>
                        @endcan
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th class="text-left">
                                @lang('crud.factures.inputs.clients_entreprise_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.factures.inputs.paiements_modalite_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.factures.inputs.factures_article_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.factures.inputs.cc_cci')
                            </th>
                            <th class="text-left">
                                @lang('crud.factures.inputs.echeance')
                            </th>
                            <th class="text-left">
                                @lang('crud.factures.inputs.adresse_facturation')
                            </th>
                            <th class="text-left">
                                @lang('crud.factures.inputs.numero_facture')
                            </th>
                            <th class="text-left">
                                @lang('crud.factures.inputs.messsage')
                            </th>
                            <th class="text-left">
                                @lang('crud.factures.inputs.message_affiche')
                            </th>
                            <th class="text-left">
                                @lang('crud.factures.inputs.has_taxe')
                            </th>
                            <th class="text-left">
                                @lang('crud.factures.inputs.fournisseur_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.factures.inputs.type')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($factures as $facture)
                        <tr>
                            <td>
                                {{ optional($facture->clientsEntreprise)->nom ??
                                '-' }}
                            </td>
                            <td>
                                {{ optional($facture->paiementsModalite)->id ??
                                '-' }}
                            </td>
                            <td>
                                {{ optional($facture->facturesArticle)->id ??
                                '-' }}
                            </td>
                            <td>{{ $facture->cc_cci ?? '-' }}</td>
                            <td>{{ $facture->echeance ?? '-' }}</td>
                            <td>{{ $facture->adresse_facturation ?? '-' }}</td>
                            <td>{{ $facture->numero_facture ?? '-' }}</td>
                            <td>{{ $facture->messsage ?? '-' }}</td>
                            <td>{{ $facture->message_affiche ?? '-' }}</td>
                            <td>{{ $facture->has_taxe ?? '-' }}</td>
                            <td>
                                {{ optional($facture->fournisseur)->prenom ??
                                '-' }}
                            </td>
                            <td>{{ $facture->type ?? '-' }}</td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $facture)
                                    <a
                                        href="{{ route('factures.edit', $facture) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $facture)
                                    <a
                                        href="{{ route('factures.show', $facture) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $facture)
                                    <form
                                        action="{{ route('factures.destroy', $facture) }}"
                                        method="POST"
                                        onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"
                                    >
                                        @csrf @method('DELETE')
                                        <button
                                            type="submit"
                                            class="btn btn-light text-danger"
                                        >
                                            <i class="icon ion-md-trash"></i>
                                        </button>
                                    </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="13">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="13">{!! $factures->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
