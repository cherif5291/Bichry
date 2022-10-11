@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('devises-monetaires.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.devises_monetaires.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.devises_monetaires.inputs.nom')</h5>
                    <span>{{ $devisesMonetaire->nom ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.devises_monetaires.inputs.sigle')</h5>
                    <span>{{ $devisesMonetaire->sigle ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.devises_monetaires.inputs.taux_echange')
                    </h5>
                    <span>{{ $devisesMonetaire->taux_echange ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('devises-monetaires.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\DevisesMonetaire::class)
                <a
                    href="{{ route('devises-monetaires.create') }}"
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
