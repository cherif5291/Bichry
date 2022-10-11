@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('fonctionnalites.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.fonctionnalites.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.fonctionnalites.inputs.module_id')</h5>
                    <span
                        >{{ optional($fonctionnalite->module)->nom ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.fonctionnalites.inputs.nom')</h5>
                    <span>{{ $fonctionnalite->nom ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.fonctionnalites.inputs.description')</h5>
                    <span>{{ $fonctionnalite->description ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.fonctionnalites.inputs.voir')</h5>
                    <span>{{ $fonctionnalite->voir ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.fonctionnalites.inputs.ajouter')</h5>
                    <span>{{ $fonctionnalite->ajouter ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.fonctionnalites.inputs.supprimer')</h5>
                    <span>{{ $fonctionnalite->supprimer ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.fonctionnalites.inputs.modifier')</h5>
                    <span>{{ $fonctionnalite->modifier ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.fonctionnalites.inputs.exporter')</h5>
                    <span>{{ $fonctionnalite->exporter ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('fonctionnalites.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Fonctionnalite::class)
                <a
                    href="{{ route('fonctionnalites.create') }}"
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
