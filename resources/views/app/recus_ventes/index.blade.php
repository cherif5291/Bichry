@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">
                    @lang('crud.recus_ventes.index_title')
                </h4>
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
                        @can('create', App\Models\RecusVente::class)
                        <a
                            href="{{ route('recus-ventes.create') }}"
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
                                @lang('crud.recus_ventes.inputs.clients_entreprise_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.recus_ventes.inputs.cc_cci')
                            </th>
                            <th class="text-left">
                                @lang('crud.recus_ventes.inputs.adresse_livraison')
                            </th>
                            <th class="text-left">
                                @lang('crud.recus_ventes.inputs.date_recu_vente')
                            </th>
                            <th class="text-left">
                                @lang('crud.recus_ventes.inputs.reference')
                            </th>
                            <th class="text-left">
                                @lang('crud.recus_ventes.inputs.numero_recu')
                            </th>
                            <th class="text-left">
                                @lang('crud.recus_ventes.inputs.article_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.recus_ventes.inputs.paiements_mode_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.recus_ventes.inputs.message_recu')
                            </th>
                            <th class="text-left">
                                @lang('crud.recus_ventes.inputs.message_releve')
                            </th>
                            <th class="text-left">
                                @lang('crud.recus_ventes.inputs.depose_sur')
                            </th>
                            <th class="text-left">
                                @lang('crud.recus_ventes.inputs.caisse_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.recus_ventes.inputs.banque_id')
                            </th>
                            <th class="text-right">
                                @lang('crud.recus_ventes.inputs.montant')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recusVentes as $recusVente)
                        <tr>
                            <td>
                                {{ optional($recusVente->clientsEntreprise)->nom
                                ?? '-' }}
                            </td>
                            <td>{{ $recusVente->cc_cci ?? '-' }}</td>
                            <td>{{ $recusVente->adresse_livraison ?? '-' }}</td>
                            <td>{{ $recusVente->date_recu_vente ?? '-' }}</td>
                            <td>{{ $recusVente->reference ?? '-' }}</td>
                            <td>{{ $recusVente->numero_recu ?? '-' }}</td>
                            <td>
                                {{ optional($recusVente->article)->nom ?? '-' }}
                            </td>
                            <td>
                                {{ optional($recusVente->paiementsMode)->nom ??
                                '-' }}
                            </td>
                            <td>{{ $recusVente->message_recu ?? '-' }}</td>
                            <td>{{ $recusVente->message_releve ?? '-' }}</td>
                            <td>{{ $recusVente->depose_sur ?? '-' }}</td>
                            <td>
                                {{ optional($recusVente->caisse)->nom ?? '-' }}
                            </td>
                            <td>
                                {{ optional($recusVente->banque)->nom ?? '-' }}
                            </td>
                            <td>{{ $recusVente->montant ?? '-' }}</td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $recusVente)
                                    <a
                                        href="{{ route('recus-ventes.edit', $recusVente) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $recusVente)
                                    <a
                                        href="{{ route('recus-ventes.show', $recusVente) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $recusVente)
                                    <form
                                        action="{{ route('recus-ventes.destroy', $recusVente) }}"
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
                            <td colspan="15">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="15">{!! $recusVentes->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
