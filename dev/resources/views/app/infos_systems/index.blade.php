@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">
                    @lang('crud.infos_systems.index_title')
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
                        @can('create', App\Models\InfosSystem::class)
                        <a
                            href="{{ route('infos-systems.create') }}"
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
                                @lang('crud.infos_systems.inputs.nom_plateforme')
                            </th>
                            <th class="text-left">
                                @lang('crud.infos_systems.inputs.description')
                            </th>
                            <th class="text-left">
                                @lang('crud.infos_systems.inputs.website')
                            </th>
                            <th class="text-left">
                                @lang('crud.infos_systems.inputs.telephone')
                            </th>
                            <th class="text-left">
                                @lang('crud.infos_systems.inputs.portable')
                            </th>
                            <th class="text-left">
                                @lang('crud.infos_systems.inputs.logo_couleur')
                            </th>
                            <th class="text-left">
                                @lang('crud.infos_systems.inputs.logo_blanc')
                            </th>
                            <th class="text-left">
                                @lang('crud.infos_systems.inputs.fav_icon')
                            </th>
                            <th class="text-left">
                                @lang('crud.infos_systems.inputs.email_contact')
                            </th>
                            <th class="text-left">
                                @lang('crud.infos_systems.inputs.email_support')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($infosSystems as $infosSystem)
                        <tr>
                            <td>{{ $infosSystem->nom_plateforme ?? '-' }}</td>
                            <td>{{ $infosSystem->description ?? '-' }}</td>
                            <td>{{ $infosSystem->website ?? '-' }}</td>
                            <td>{{ $infosSystem->telephone ?? '-' }}</td>
                            <td>{{ $infosSystem->portable ?? '-' }}</td>
                            <td>{{ $infosSystem->logo_couleur ?? '-' }}</td>
                            <td>{{ $infosSystem->logo_blanc ?? '-' }}</td>
                            <td>{{ $infosSystem->fav_icon ?? '-' }}</td>
                            <td>{{ $infosSystem->email_contact ?? '-' }}</td>
                            <td>{{ $infosSystem->email_support ?? '-' }}</td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $infosSystem)
                                    <a
                                        href="{{ route('infos-systems.edit', $infosSystem) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $infosSystem)
                                    <a
                                        href="{{ route('infos-systems.show', $infosSystem) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $infosSystem)
                                    <form
                                        action="{{ route('infos-systems.destroy', $infosSystem) }}"
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
                            <td colspan="11">
                                {!! $infosSystems->render() !!}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
