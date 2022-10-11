@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('banques.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.banques.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.banques.inputs.nom')</h5>
                    <span>{{ $banque->nom ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.banques.inputs.numero_compte')</h5>
                    <span>{{ $banque->numero_compte ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.banques.inputs.logo_banque')</h5>
                    <span>{{ $banque->logo_banque ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.banques.inputs.entreprise_id')</h5>
                    <span
                        >{{ optional($banque->entreprise)->nom_entreprise ?? '-'
                        }}</span
                    >
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('banques.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Banque::class)
                <a href="{{ route('banques.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
