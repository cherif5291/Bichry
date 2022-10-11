@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('depenses.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.depenses.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.depenses.inputs.client_id')</h5>
                    <span
                        >{{ optional($depense->client)->nom_entreprise ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.depenses.inputs.paiements_mode_id')</h5>
                    <span
                        >{{ optional($depense->paiementsMode)->nom ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.depenses.inputs.reference')</h5>
                    <span>{{ $depense->reference ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.depenses.inputs.note')</h5>
                    <span>{{ $depense->note ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.depenses.inputs.source')</h5>
                    <span>{{ $depense->source ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('depenses.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Depense::class)
                <a href="{{ route('depenses.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
