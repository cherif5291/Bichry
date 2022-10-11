@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('modeles-recus.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.modeles_recus.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.modeles_recus.inputs.nom')</h5>
                    <span>{{ $modelesRecu->nom ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.modeles_recus.inputs.contenu')</h5>
                    <span>{{ $modelesRecu->contenu ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('modeles-recus.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\ModelesRecu::class)
                <a
                    href="{{ route('modeles-recus.create') }}"
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
