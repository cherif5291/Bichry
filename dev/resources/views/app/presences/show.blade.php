@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('presences.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.presences.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>
                        @lang('crud.presences.inputs.employes_entreprise_id')
                    </h5>
                    <span
                        >{{ optional($presence->employesEntreprise)->prenom ??
                        '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.presences.inputs.date')</h5>
                    <span>{{ $presence->date ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.presences.inputs.heure_arrive')</h5>
                    <span>{{ $presence->heure_arrive ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.presences.inputs.heure_depard')</h5>
                    <span>{{ $presence->heure_depard ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.presences.inputs.temps_absence')</h5>
                    <span>{{ $presence->temps_absence ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.presences.inputs.est_present')</h5>
                    <span>{{ $presence->est_present ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('presences.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Presence::class)
                <a href="{{ route('presences.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
