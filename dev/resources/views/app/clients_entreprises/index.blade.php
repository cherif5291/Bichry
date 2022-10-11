@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">
                    @lang('crud.clients_entreprises.index_title')
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
                        @can('create', App\Models\ClientsEntreprise::class)
                        <a
                            href="{{ route('clients-entreprises.create') }}"
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
                                @lang('crud.clients_entreprises.inputs.entreprise_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.clients_entreprises.inputs.nom')
                            </th>
                            <th class="text-left">
                                @lang('crud.clients_entreprises.inputs.prenom')
                            </th>
                            <th class="text-left">
                                @lang('crud.clients_entreprises.inputs.entreprise')
                            </th>
                            <th class="text-left">
                                @lang('crud.clients_entreprises.inputs.email')
                            </th>
                            <th class="text-left">
                                @lang('crud.clients_entreprises.inputs.telephone')
                            </th>
                            <th class="text-left">
                                @lang('crud.clients_entreprises.inputs.portable')
                            </th>
                            <th class="text-left">
                                @lang('crud.clients_entreprises.inputs.nom_pro')
                            </th>
                            <th class="text-left">
                                @lang('crud.clients_entreprises.inputs.nom_chequier')
                            </th>
                            <th class="text-left">
                                @lang('crud.clients_entreprises.inputs.titre')
                            </th>
                            <th class="text-left">
                                @lang('crud.clients_entreprises.inputs.telecopie')
                            </th>
                            <th class="text-left">
                                @lang('crud.clients_entreprises.inputs.website')
                            </th>
                            <th class="text-left">
                                @lang('crud.clients_entreprises.inputs.adresse')
                            </th>
                            <th class="text-left">
                                @lang('crud.clients_entreprises.inputs.ville')
                            </th>
                            <th class="text-left">
                                @lang('crud.clients_entreprises.inputs.province')
                            </th>
                            <th class="text-left">
                                @lang('crud.clients_entreprises.inputs.code_postale')
                            </th>
                            <th class="text-left">
                                @lang('crud.clients_entreprises.inputs.pays')
                            </th>
                            <th class="text-left">
                                @lang('crud.clients_entreprises.inputs.note')
                            </th>
                            <th class="text-left">
                                @lang('crud.clients_entreprises.inputs.paiements_mode_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.clients_entreprises.inputs.paiements_modalite_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.clients_entreprises.inputs.devises_monetaire_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.clients_entreprises.inputs.logo')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($clientsEntreprises as $clientsEntreprise)
                        <tr>
                            <td>
                                {{
                                optional($clientsEntreprise->entreprise)->nom_entreprise
                                ?? '-' }}
                            </td>
                            <td>{{ $clientsEntreprise->nom ?? '-' }}</td>
                            <td>{{ $clientsEntreprise->prenom ?? '-' }}</td>
                            <td>{{ $clientsEntreprise->entreprise ?? '-' }}</td>
                            <td>{{ $clientsEntreprise->email ?? '-' }}</td>
                            <td>{{ $clientsEntreprise->telephone ?? '-' }}</td>
                            <td>{{ $clientsEntreprise->portable ?? '-' }}</td>
                            <td>{{ $clientsEntreprise->nom_pro ?? '-' }}</td>
                            <td>
                                {{ $clientsEntreprise->nom_chequier ?? '-' }}
                            </td>
                            <td>{{ $clientsEntreprise->titre ?? '-' }}</td>
                            <td>{{ $clientsEntreprise->telecopie ?? '-' }}</td>
                            <td>{{ $clientsEntreprise->website ?? '-' }}</td>
                            <td>{{ $clientsEntreprise->adresse ?? '-' }}</td>
                            <td>{{ $clientsEntreprise->ville ?? '-' }}</td>
                            <td>{{ $clientsEntreprise->province ?? '-' }}</td>
                            <td>
                                {{ $clientsEntreprise->code_postale ?? '-' }}
                            </td>
                            <td>{{ $clientsEntreprise->pays ?? '-' }}</td>
                            <td>{{ $clientsEntreprise->note ?? '-' }}</td>
                            <td>
                                {{
                                optional($clientsEntreprise->paiementsMode)->nom
                                ?? '-' }}
                            </td>
                            <td>
                                {{
                                optional($clientsEntreprise->paiementsModalite)->id
                                ?? '-' }}
                            </td>
                            <td>
                                {{
                                optional($clientsEntreprise->devisesMonetaire)->nom
                                ?? '-' }}
                            </td>
                            <td>{{ $clientsEntreprise->logo ?? '-' }}</td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $clientsEntreprise)
                                    <a
                                        href="{{ route('clients-entreprises.edit', $clientsEntreprise) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $clientsEntreprise)
                                    <a
                                        href="{{ route('clients-entreprises.show', $clientsEntreprise) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $clientsEntreprise)
                                    <form
                                        action="{{ route('clients-entreprises.destroy', $clientsEntreprise) }}"
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
                            <td colspan="23">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="23">
                                {!! $clientsEntreprises->render() !!}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
