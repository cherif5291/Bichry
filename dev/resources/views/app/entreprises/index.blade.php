@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">
                    @lang('crud.entreprises.index_title')
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
                        @can('create', App\Models\Entreprise::class)
                        <a
                            href="{{ route('entreprises.create') }}"
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
                                @lang('crud.entreprises.inputs.user_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.entreprises.inputs.nom_entreprise')
                            </th>
                            <th class="text-left">
                                @lang('crud.entreprises.inputs.a_propos')
                            </th>
                            <th class="text-left">
                                @lang('crud.entreprises.inputs.email')
                            </th>
                            <th class="text-left">
                                @lang('crud.entreprises.inputs.telephone')
                            </th>
                            <th class="text-left">
                                @lang('crud.entreprises.inputs.portable')
                            </th>
                            <th class="text-left">
                                @lang('crud.entreprises.inputs.adresse')
                            </th>
                            <th class="text-right">
                                @lang('crud.entreprises.inputs.capital')
                            </th>
                            <th class="text-left">
                                @lang('crud.entreprises.inputs.logo')
                            </th>
                            <th class="text-left">
                                @lang('crud.entreprises.inputs.modeles_devis_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.entreprises.inputs.modeles_facture_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.entreprises.inputs.modeles_recu_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.entreprises.inputs.devises_monetaire_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.entreprises.inputs.couleur_primaire')
                            </th>
                            <th class="text-left">
                                @lang('crud.entreprises.inputs.couleur_secondaire')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($entreprises as $entreprise)
                        <tr>
                            <td>
                                {{ optional($entreprise->user)->name ?? '-' }}
                            </td>
                            <td>{{ $entreprise->nom_entreprise ?? '-' }}</td>
                            <td>{{ $entreprise->a_propos ?? '-' }}</td>
                            <td>{{ $entreprise->email ?? '-' }}</td>
                            <td>{{ $entreprise->telephone ?? '-' }}</td>
                            <td>{{ $entreprise->portable ?? '-' }}</td>
                            <td>{{ $entreprise->adresse ?? '-' }}</td>
                            <td>{{ $entreprise->capital ?? '-' }}</td>
                            <td>{{ $entreprise->logo ?? '-' }}</td>
                            <td>
                                {{ optional($entreprise->modelesDevis)->nom ??
                                '-' }}
                            </td>
                            <td>
                                {{ optional($entreprise->modelesFacture)->nom ??
                                '-' }}
                            </td>
                            <td>
                                {{ optional($entreprise->modelesRecu)->nom ??
                                '-' }}
                            </td>
                            <td>
                                {{ optional($entreprise->devisesMonetaire)->nom
                                ?? '-' }}
                            </td>
                            <td>{{ $entreprise->couleur_primaire ?? '-' }}</td>
                            <td>
                                {{ $entreprise->couleur_secondaire ?? '-' }}
                            </td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $entreprise)
                                    <a
                                        href="{{ route('entreprises.edit', $entreprise) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $entreprise)
                                    <a
                                        href="{{ route('entreprises.show', $entreprise) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $entreprise)
                                    <form
                                        action="{{ route('entreprises.destroy', $entreprise) }}"
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
                            <td colspan="16">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="16">{!! $entreprises->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
