@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('ruptures.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.ruptures.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.ruptures.inputs.invitation_id')</h5>
                    <span>{{ optional($rupture->invitation)->id ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.ruptures.inputs.entreprise_id')</h5>
                    <span
                        >{{ optional($rupture->entreprise)->nom_entreprise ??
                        '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.ruptures.inputs.status')</h5>
                    <span>{{ $rupture->status ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('ruptures.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Rupture::class)
                <a href="{{ route('ruptures.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
