@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('all-modeles-devis.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.all_modeles_devis.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.all_modeles_devis.inputs.nom')</h5>
                    <span>{{ $modelesDevis->nom ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.all_modeles_devis.inputs.contenu')</h5>
                    <span>{{ $modelesDevis->contenu ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('all-modeles-devis.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\ModelesDevis::class)
                <a
                    href="{{ route('all-modeles-devis.create') }}"
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
