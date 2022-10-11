@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('comptescomptables.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.comptescomptables.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.comptescomptables.inputs.nom')</h5>
                    <span>{{ $comptescomptable->nom ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.comptescomptables.inputs.numero_compte')
                    </h5>
                    <span>{{ $comptescomptable->numero_compte ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.comptescomptables.inputs.entreprise_id')
                    </h5>
                    <span
                        >{{
                        optional($comptescomptable->entreprise)->nom_entreprise
                        ?? '-' }}</span
                    >
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('comptescomptables.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Comptescomptable::class)
                <a
                    href="{{ route('comptescomptables.create') }}"
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
