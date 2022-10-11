@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">@lang('crud.all_devis.index_title')</h4>
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
                        @can('create', App\Models\Devis::class)
                        <a
                            href="{{ route('all-devis.create') }}"
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
                                @lang('crud.all_devis.inputs.entreprise_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.all_devis.inputs.clients_entreprise_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.all_devis.inputs.cc_cci')
                            </th>
                            <th class="text-left">
                                @lang('crud.all_devis.inputs.adresse_facturation')
                            </th>
                            <th class="text-left">
                                @lang('crud.all_devis.inputs.expiration')
                            </th>
                            <th class="text-left">
                                @lang('crud.all_devis.inputs.numero_devis')
                            </th>
                            <th class="text-left">
                                @lang('crud.all_devis.inputs.message_devis')
                            </th>
                            <th class="text-left">
                                @lang('crud.all_devis.inputs.message_releve')
                            </th>
                            <th class="text-left">
                                @lang('crud.all_devis.inputs.status')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($allDevis as $devis)
                        <tr>
                            <td>
                                {{ optional($devis->entreprise)->nom_entreprise
                                ?? '-' }}
                            </td>
                            <td>
                                {{ optional($devis->clientsEntreprise)->nom ??
                                '-' }}
                            </td>
                            <td>{{ $devis->cc_cci ?? '-' }}</td>
                            <td>{{ $devis->adresse_facturation ?? '-' }}</td>
                            <td>{{ $devis->expiration ?? '-' }}</td>
                            <td>{{ $devis->numero_devis ?? '-' }}</td>
                            <td>{{ $devis->message_devis ?? '-' }}</td>
                            <td>{{ $devis->message_releve ?? '-' }}</td>
                            <td>{{ $devis->status ?? '-' }}</td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $devis)
                                    <a
                                        href="{{ route('all-devis.edit', $devis) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $devis)
                                    <a
                                        href="{{ route('all-devis.show', $devis) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $devis)
                                    <form
                                        action="{{ route('all-devis.destroy', $devis) }}"
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
                            <td colspan="10">{!! $allDevis->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
