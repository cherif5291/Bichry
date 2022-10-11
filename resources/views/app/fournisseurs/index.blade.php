@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">
                    @lang('crud.fournisseurs.index_title')
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
                        @can('create', App\Models\Fournisseur::class)
                        <a
                            href="{{ route('fournisseurs.create') }}"
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
                                @lang('crud.fournisseurs.inputs.entreprise_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.fournisseurs.inputs.prenom')
                            </th>
                            <th class="text-left">
                                @lang('crud.fournisseurs.inputs.nom')
                            </th>
                            <th class="text-left">
                                @lang('crud.fournisseurs.inputs.entreprise')
                            </th>
                            <th class="text-left">
                                @lang('crud.fournisseurs.inputs.nom_pro')
                            </th>
                            <th class="text-left">
                                @lang('crud.fournisseurs.inputs.nom_chequier')
                            </th>
                            <th class="text-left">
                                @lang('crud.fournisseurs.inputs.email')
                            </th>
                            <th class="text-left">
                                @lang('crud.fournisseurs.inputs.telephone')
                            </th>
                            <th class="text-left">
                                @lang('crud.fournisseurs.inputs.portable')
                            </th>
                            <th class="text-left">
                                @lang('crud.fournisseurs.inputs.telecopie')
                            </th>
                            <th class="text-left">
                                @lang('crud.fournisseurs.inputs.website')
                            </th>
                            <th class="text-left">
                                @lang('crud.fournisseurs.inputs.titre')
                            </th>
                            <th class="text-left">
                                @lang('crud.fournisseurs.inputs.adresse')
                            </th>
                            <th class="text-left">
                                @lang('crud.fournisseurs.inputs.ville')
                            </th>
                            <th class="text-left">
                                @lang('crud.fournisseurs.inputs.province')
                            </th>
                            <th class="text-left">
                                @lang('crud.fournisseurs.inputs.code_postal')
                            </th>
                            <th class="text-left">
                                @lang('crud.fournisseurs.inputs.pays')
                            </th>
                            <th class="text-left">
                                @lang('crud.fournisseurs.inputs.note')
                            </th>
                            <th class="text-left">
                                @lang('crud.fournisseurs.inputs.paiements_modalite_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.fournisseurs.inputs.numero_compte')
                            </th>
                            <th class="text-left">
                                @lang('crud.fournisseurs.inputs.comptescomptable_id')
                            </th>
                            <th class="text-right">
                                @lang('crud.fournisseurs.inputs.solde_ouverture')
                            </th>
                            <th class="text-left">
                                @lang('crud.fournisseurs.inputs.date_ouverture')
                            </th>
                            <th class="text-left">
                                @lang('crud.fournisseurs.inputs.devises_monetaire_id')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($fournisseurs as $fournisseur)
                        <tr>
                            <td>
                                {{
                                optional($fournisseur->entreprise)->nom_entreprise
                                ?? '-' }}
                            </td>
                            <td>{{ $fournisseur->prenom ?? '-' }}</td>
                            <td>{{ $fournisseur->nom ?? '-' }}</td>
                            <td>{{ $fournisseur->entreprise ?? '-' }}</td>
                            <td>{{ $fournisseur->nom_pro ?? '-' }}</td>
                            <td>{{ $fournisseur->nom_chequier ?? '-' }}</td>
                            <td>{{ $fournisseur->email ?? '-' }}</td>
                            <td>{{ $fournisseur->telephone ?? '-' }}</td>
                            <td>{{ $fournisseur->portable ?? '-' }}</td>
                            <td>{{ $fournisseur->telecopie ?? '-' }}</td>
                            <td>{{ $fournisseur->website ?? '-' }}</td>
                            <td>{{ $fournisseur->titre ?? '-' }}</td>
                            <td>{{ $fournisseur->adresse ?? '-' }}</td>
                            <td>{{ $fournisseur->ville ?? '-' }}</td>
                            <td>{{ $fournisseur->province ?? '-' }}</td>
                            <td>{{ $fournisseur->code_postal ?? '-' }}</td>
                            <td>{{ $fournisseur->pays ?? '-' }}</td>
                            <td>{{ $fournisseur->note ?? '-' }}</td>
                            <td>
                                {{ optional($fournisseur->paiementsModalite)->id
                                ?? '-' }}
                            </td>
                            <td>{{ $fournisseur->numero_compte ?? '-' }}</td>
                            <td>
                                {{ optional($fournisseur->comptescomptable)->nom
                                ?? '-' }}
                            </td>
                            <td>{{ $fournisseur->solde_ouverture ?? '-' }}</td>
                            <td>{{ $fournisseur->date_ouverture ?? '-' }}</td>
                            <td>
                                {{ optional($fournisseur->devisesMonetaire)->nom
                                ?? '-' }}
                            </td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $fournisseur)
                                    <a
                                        href="{{ route('fournisseurs.edit', $fournisseur) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $fournisseur)
                                    <a
                                        href="{{ route('fournisseurs.show', $fournisseur) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $fournisseur)
                                    <form
                                        action="{{ route('fournisseurs.destroy', $fournisseur) }}"
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
                            <td colspan="25">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="25">
                                {!! $fournisseurs->render() !!}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
