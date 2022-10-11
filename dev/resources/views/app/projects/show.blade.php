@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('projects.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.projects.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.projects.inputs.entreprise_id')</h5>
                    <span
                        >{{ optional($project->entreprise)->nom_entreprise ??
                        '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.projects.inputs.clients_entreprise_id')</h5>
                    <span
                        >{{ optional($project->clientsEntreprise)->nom ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.projects.inputs.nom')</h5>
                    <span>{{ $project->nom ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.projects.inputs.description')</h5>
                    <span>{{ $project->description ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.projects.inputs.cout')</h5>
                    <span>{{ $project->cout ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.projects.inputs.dead_line')</h5>
                    <span>{{ $project->dead_line ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('projects.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Project::class)
                <a href="{{ route('projects.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
