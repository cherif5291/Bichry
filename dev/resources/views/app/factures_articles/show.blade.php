@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('factures-articles.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.factures_articles.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.factures_articles.inputs.article_id')</h5>
                    <span
                        >{{ optional($facturesArticle->article)->nom ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.factures_articles.inputs.qte')</h5>
                    <span>{{ $facturesArticle->qte ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.factures_articles.inputs.taux')</h5>
                    <span>{{ $facturesArticle->taux ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.factures_articles.inputs.total')</h5>
                    <span>{{ $facturesArticle->total ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.factures_articles.inputs.taxe_id')</h5>
                    <span
                        >{{ optional($facturesArticle->taxe)->nom ?? '-'
                        }}</span
                    >
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('factures-articles.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\FacturesArticle::class)
                <a
                    href="{{ route('factures-articles.create') }}"
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
