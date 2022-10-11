@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">@lang('crud.reglements.index_title')</h4>
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
                        @can('create', App\Models\Reglement::class)
                        <a
                            href="{{ route('reglements.create') }}"
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
                                @lang('crud.reglements.inputs.clients_entreprise_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.reglements.inputs.facture_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.reglements.inputs.paiements_mode_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.reglements.inputs.reference')
                            </th>
                            <th class="text-left">
                                @lang('crud.reglements.inputs.cc_cci')
                            </th>
                            <th class="text-left">
                                @lang('crud.reglements.inputs.approvisionnememnt')
                            </th>
                            <th class="text-left">
                                @lang('crud.reglements.inputs.banque_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.reglements.inputs.caisse_id')
                            </th>
                            <th class="text-right">
                                @lang('crud.reglements.inputs.montant_recu')
                            </th>
                            <th class="text-left">
                                @lang('crud.reglements.inputs.note')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($reglements as $reglement)
                        <tr>
                            <td>
                                {{ optional($reglement->clientsEntreprise)->nom
                                ?? '-' }}
                            </td>
                            <td>
                                {{ optional($reglement->facture)->cc_cci ?? '-'
                                }}
                            </td>
                            <td>
                                {{ optional($reglement->paiementsMode)->nom ??
                                '-' }}
                            </td>
                            <td>{{ $reglement->reference ?? '-' }}</td>
                            <td>{{ $reglement->cc_cci ?? '-' }}</td>
                            <td>{{ $reglement->approvisionnememnt ?? '-' }}</td>
                            <td>
                                {{ optional($reglement->banque)->nom ?? '-' }}
                            </td>
                            <td>
                                {{ optional($reglement->caisse)->nom ?? '-' }}
                            </td>
                            <td>{{ $reglement->montant_recu ?? '-' }}</td>
                            <td>{{ $reglement->note ?? '-' }}</td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $reglement)
                                    <a
                                        href="{{ route('reglements.edit', $reglement) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $reglement)
                                    <a
                                        href="{{ route('reglements.show', $reglement) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $reglement)
                                    <form
                                        action="{{ route('reglements.destroy', $reglement) }}"
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
                            <td colspan="11">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="11">{!! $reglements->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
