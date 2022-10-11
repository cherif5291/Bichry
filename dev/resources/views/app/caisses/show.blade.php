@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('caisses.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.caisses.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.caisses.inputs.entreprise_id')</h5>
                    <span
                        >{{ optional($caisse->entreprise)->nom_entreprise ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.caisses.inputs.nom')</h5>
                    <span>{{ $caisse->nom ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.caisses.inputs.solde')</h5>
                    <span>{{ $caisse->solde ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('caisses.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Caisse::class)
                <a href="{{ route('caisses.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
