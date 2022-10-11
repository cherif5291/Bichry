@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('infos-systems.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.infos_systems.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.infos_systems.inputs.nom_plateforme')</h5>
                    <span>{{ $infosSystem->nom_plateforme ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.infos_systems.inputs.description')</h5>
                    <span>{{ $infosSystem->description ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.infos_systems.inputs.website')</h5>
                    <span>{{ $infosSystem->website ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.infos_systems.inputs.telephone')</h5>
                    <span>{{ $infosSystem->telephone ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.infos_systems.inputs.portable')</h5>
                    <span>{{ $infosSystem->portable ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.infos_systems.inputs.logo_couleur')</h5>
                    <span>{{ $infosSystem->logo_couleur ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.infos_systems.inputs.logo_blanc')</h5>
                    <span>{{ $infosSystem->logo_blanc ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.infos_systems.inputs.fav_icon')</h5>
                    <span>{{ $infosSystem->fav_icon ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.infos_systems.inputs.email_contact')</h5>
                    <span>{{ $infosSystem->email_contact ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.infos_systems.inputs.email_support')</h5>
                    <span>{{ $infosSystem->email_support ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('infos-systems.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\InfosSystem::class)
                <a
                    href="{{ route('infos-systems.create') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
