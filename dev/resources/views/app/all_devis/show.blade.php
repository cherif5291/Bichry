@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('all-devis.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.all_devis.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.all_devis.inputs.entreprise_id')</h5>
                    <span
                        >{{ optional($devis->entreprise)->nom_entreprise ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.all_devis.inputs.clients_entreprise_id')
                    </h5>
                    <span
                        >{{ optional($devis->clientsEntreprise)->nom ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.all_devis.inputs.cc_cci')</h5>
                    <span>{{ $devis->cc_cci ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.all_devis.inputs.adresse_facturation')</h5>
                    <span>{{ $devis->adresse_facturation ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.all_devis.inputs.expiration')</h5>
                    <span>{{ $devis->expiration ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.all_devis.inputs.numero_devis')</h5>
                    <span>{{ $devis->numero_devis ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.all_devis.inputs.message_devis')</h5>
                    <span>{{ $devis->message_devis ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.all_devis.inputs.message_releve')</h5>
                    <span>{{ $devis->message_releve ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.all_devis.inputs.status')</h5>
                    <span>{{ $devis->status ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('all-devis.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Devis::class)
                <a href="{{ route('all-devis.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
