@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('employes-entreprises.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.employes_entreprises.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>
                        @lang('crud.employes_entreprises.inputs.entreprise_id')
                    </h5>
                    <span
                        >{{
                        optional($employesEntreprise->entreprise)->nom_entreprise
                        ?? '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.employes_entreprises.inputs.user_id')</h5>
                    <span
                        >{{ optional($employesEntreprise->user)->name ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.employes_entreprises.inputs.prenom')</h5>
                    <span>{{ $employesEntreprise->prenom ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.employes_entreprises.inputs.nom')</h5>
                    <span>{{ $employesEntreprise->nom ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.employes_entreprises.inputs.initial')</h5>
                    <span>{{ $employesEntreprise->initial ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.employes_entreprises.inputs.email')</h5>
                    <span>{{ $employesEntreprise->email ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.employes_entreprises.inputs.telephone')</h5>
                    <span>{{ $employesEntreprise->telephone ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.employes_entreprises.inputs.data_embauche')
                    </h5>
                    <span>{{ $employesEntreprise->data_embauche ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.employes_entreprises.inputs.interval_paiement')
                    </h5>
                    <span
                        >{{ $employesEntreprise->interval_paiement ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.employes_entreprises.inputs.duree_interval')
                    </h5>
                    <span
                        >{{ $employesEntreprise->duree_interval ?? '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.employes_entreprises.inputs.remuneration')
                    </h5>
                    <span>{{ $employesEntreprise->remuneration ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('employes-entreprises.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\EmployesEntreprise::class)
                <a
                    href="{{ route('employes-entreprises.create') }}"
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
