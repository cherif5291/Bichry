@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">@lang('crud.contrats.index_title')</h4>
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
                        @can('create', App\Models\Contrat::class)
                        <a
                            href="{{ route('contrats.create') }}"
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
                                @lang('crud.contrats.inputs.status')
                            </th>
                            <th class="text-left">
                                @lang('crud.contrats.inputs.signature1')
                            </th>
                            <th class="text-left">
                                @lang('crud.contrats.inputs.signature2')
                            </th>
                            <th class="text-left">
                                @lang('crud.contrats.inputs.entreprise_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.contrats.inputs.clients_entreprise_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.contrats.inputs.employes_entreprise_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.contrats.inputs.facture_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.contrats.inputs.project_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.contrats.inputs.fournisseur_id')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($contrats as $contrat)
                        <tr>
                            <td>{{ $contrat->status ?? '-' }}</td>
                            <td>{{ $contrat->signature1 ?? '-' }}</td>
                            <td>{{ $contrat->signature2 ?? '-' }}</td>
                            <td>
                                {{
                                optional($contrat->entreprise)->nom_entreprise
                                ?? '-' }}
                            </td>
                            <td>
                                {{ optional($contrat->clientsEntreprise)->nom ??
                                '-' }}
                            </td>
                            <td>
                                {{
                                optional($contrat->employesEntreprise)->prenom
                                ?? '-' }}
                            </td>
                            <td>
                                {{ optional($contrat->facture)->cc_cci ?? '-' }}
                            </td>
                            <td>
                                {{ optional($contrat->project)->nom ?? '-' }}
                            </td>
                            <td>
                                {{ optional($contrat->fournisseur)->prenom ??
                                '-' }}
                            </td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $contrat)
                                    <a
                                        href="{{ route('contrats.edit', $contrat) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $contrat)
                                    <a
                                        href="{{ route('contrats.show', $contrat) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $contrat)
                                    <form
                                        action="{{ route('contrats.destroy', $contrat) }}"
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
                            <td colspan="10">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="10">{!! $contrats->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
