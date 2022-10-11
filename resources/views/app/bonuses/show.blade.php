@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('bonuses.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.bonuses.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.bonuses.inputs.type')</h5>
                    <span>{{ $bonus->type ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.bonuses.inputs.duree')</h5>
                    <span>{{ $bonus->duree ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.bonuses.inputs.abonnement_id')</h5>
                    <span
                        >{{ optional($bonus->abonnement)->expiration ?? '-'
                        }}</span
                    >
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('bonuses.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Bonus::class)
                <a href="{{ route('bonuses.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
