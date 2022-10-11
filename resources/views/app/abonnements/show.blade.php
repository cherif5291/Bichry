@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('abonnements.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.abonnements.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.abonnements.inputs.expiration')</h5>
                    <span>{{ $abonnement->expiration ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.abonnements.inputs.entreprise_id')</h5>
                    <span
                        >{{ optional($abonnement->entreprise)->nom_entreprise ??
                        '-' }}</span
                    >
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('abonnements.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Abonnement::class)
                <a
                    href="{{ route('abonnements.create') }}"
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
