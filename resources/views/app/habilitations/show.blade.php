@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('habilitations.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.habilitations.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.habilitations.inputs.user_id')</h5>
                    <span
                        >{{ optional($habilitation->user)->name ?? '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.habilitations.inputs.habilitation')</h5>
                    <span>{{ $habilitation->habilitation ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.habilitations.inputs.module_id')</h5>
                    <span
                        >{{ optional($habilitation->module)->nom ?? '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.habilitations.inputs.fonctionnalite_id')
                    </h5>
                    <span
                        >{{ optional($habilitation->fonctionnalite)->nom ?? '-'
                        }}</span
                    >
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('habilitations.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Habilitation::class)
                <a
                    href="{{ route('habilitations.create') }}"
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
