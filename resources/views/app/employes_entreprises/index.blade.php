@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">
                    @lang('crud.employes_entreprises.index_title')
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
                        @can('create', App\Models\EmployesEntreprise::class)
                        <a
                            href="{{ route('employes-entreprises.create') }}"
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
                                @lang('crud.employes_entreprises.inputs.entreprise_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.employes_entreprises.inputs.user_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.employes_entreprises.inputs.prenom')
                            </th>
                            <th class="text-left">
                                @lang('crud.employes_entreprises.inputs.nom')
                            </th>
                            <th class="text-left">
                                @lang('crud.employes_entreprises.inputs.initial')
                            </th>
                            <th class="text-left">
                                @lang('crud.employes_entreprises.inputs.email')
                            </th>
                            <th class="text-left">
                                @lang('crud.employes_entreprises.inputs.telephone')
                            </th>
                            <th class="text-left">
                                @lang('crud.employes_entreprises.inputs.data_embauche')
                            </th>
                            <th class="text-left">
                                @lang('crud.employes_entreprises.inputs.interval_paiement')
                            </th>
                            <th class="text-right">
                                @lang('crud.employes_entreprises.inputs.duree_interval')
                            </th>
                            <th class="text-right">
                                @lang('crud.employes_entreprises.inputs.remuneration')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($employesEntreprises as $employesEntreprise)
                        <tr>
                            <td>
                                {{
                                optional($employesEntreprise->entreprise)->nom_entreprise
                                ?? '-' }}
                            </td>
                            <td>
                                {{ optional($employesEntreprise->user)->name ??
                                '-' }}
                            </td>
                            <td>{{ $employesEntreprise->prenom ?? '-' }}</td>
                            <td>{{ $employesEntreprise->nom ?? '-' }}</td>
                            <td>{{ $employesEntreprise->initial ?? '-' }}</td>
                            <td>{{ $employesEntreprise->email ?? '-' }}</td>
                            <td>{{ $employesEntreprise->telephone ?? '-' }}</td>
                            <td>
                                {{ $employesEntreprise->data_embauche ?? '-' }}
                            </td>
                            <td>
                                {{ $employesEntreprise->interval_paiement ?? '-'
                                }}
                            </td>
                            <td>
                                {{ $employesEntreprise->duree_interval ?? '-' }}
                            </td>
                            <td>
                                {{ $employesEntreprise->remuneration ?? '-' }}
                            </td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $employesEntreprise)
                                    <a
                                        href="{{ route('employes-entreprises.edit', $employesEntreprise) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $employesEntreprise)
                                    <a
                                        href="{{ route('employes-entreprises.show', $employesEntreprise) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $employesEntreprise)
                                    <form
                                        action="{{ route('employes-entreprises.destroy', $employesEntreprise) }}"
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
                            <td colspan="12">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="12">
                                {!! $employesEntreprises->render() !!}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
