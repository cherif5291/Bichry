@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('documents.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.documents.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.documents.inputs.entreprise_id')</h5>
                    <span
                        >{{ optional($document->entreprise)->nom_entreprise ??
                        '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.documents.inputs.doc')</h5>
                    <span>{{ $document->doc ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.documents.inputs.cabinet_id')</h5>
                    <span>{{ $document->cabinet_id ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.documents.inputs.documents_type_id')</h5>
                    <span
                        >{{ optional($document->documentsType)->nom ?? '-'
                        }}</span
                    >
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('documents.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Document::class)
                <a href="{{ route('documents.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
