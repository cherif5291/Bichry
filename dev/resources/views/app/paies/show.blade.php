@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('paies.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.paies.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.paies.inputs.employes_entreprise_id')</h5>
                    <span
                        >{{ optional($paie->employesEntreprise)->prenom ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.paies.inputs.date')</h5>
                    <span>{{ $paie->date ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.paies.inputs.montant_paye')</h5>
                    <span>{{ $paie->montant_paye ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.paies.inputs.restant')</h5>
                    <span>{{ $paie->restant ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('paies.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Paie::class)
                <a href="{{ route('paies.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
