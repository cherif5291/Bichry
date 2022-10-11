@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('langues.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.langues.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.langues.inputs.nom')</h5>
                    <span>{{ $langue->nom ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.langues.inputs.traduction')</h5>
                    <span>{{ $langue->traduction ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('langues.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Langue::class)
                <a href="{{ route('langues.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
