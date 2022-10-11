@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">
                    @lang('crud.fonctionnalites.index_title')
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
                        @can('create', App\Models\Fonctionnalite::class)
                        <a
                            href="{{ route('fonctionnalites.create') }}"
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
                                @lang('crud.fonctionnalites.inputs.module_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.fonctionnalites.inputs.nom')
                            </th>
                            <th class="text-left">
                                @lang('crud.fonctionnalites.inputs.description')
                            </th>
                            <th class="text-left">
                                @lang('crud.fonctionnalites.inputs.voir')
                            </th>
                            <th class="text-left">
                                @lang('crud.fonctionnalites.inputs.ajouter')
                            </th>
                            <th class="text-left">
                                @lang('crud.fonctionnalites.inputs.supprimer')
                            </th>
                            <th class="text-left">
                                @lang('crud.fonctionnalites.inputs.modifier')
                            </th>
                            <th class="text-left">
                                @lang('crud.fonctionnalites.inputs.exporter')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($fonctionnalites as $fonctionnalite)
                        <tr>
                            <td>
                                {{ optional($fonctionnalite->module)->nom ?? '-'
                                }}
                            </td>
                            <td>{{ $fonctionnalite->nom ?? '-' }}</td>
                            <td>{{ $fonctionnalite->description ?? '-' }}</td>
                            <td>{{ $fonctionnalite->voir ?? '-' }}</td>
                            <td>{{ $fonctionnalite->ajouter ?? '-' }}</td>
                            <td>{{ $fonctionnalite->supprimer ?? '-' }}</td>
                            <td>{{ $fonctionnalite->modifier ?? '-' }}</td>
                            <td>{{ $fonctionnalite->exporter ?? '-' }}</td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $fonctionnalite)
                                    <a
                                        href="{{ route('fonctionnalites.edit', $fonctionnalite) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $fonctionnalite)
                                    <a
                                        href="{{ route('fonctionnalites.show', $fonctionnalite) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $fonctionnalite)
                                    <form
                                        action="{{ route('fonctionnalites.destroy', $fonctionnalite) }}"
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
                            <td colspan="9">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="9">
                                {!! $fonctionnalites->render() !!}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
