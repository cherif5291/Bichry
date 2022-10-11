@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('devis-articles.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.devis_articles.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.devis_articles.inputs.devis_id')</h5>
                    <span
                        >{{ optional($devisArticle->devis)->cc_cci ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.devis_articles.inputs.taxe_id')</h5>
                    <span>{{ optional($devisArticle->taxe)->nom ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.devis_articles.inputs.article_id')</h5>
                    <span
                        >{{ optional($devisArticle->article)->nom ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.devis_articles.inputs.qte')</h5>
                    <span>{{ $devisArticle->qte ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.devis_articles.inputs.taux')</h5>
                    <span>{{ $devisArticle->taux ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.devis_articles.inputs.total')</h5>
                    <span>{{ $devisArticle->total ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('devis-articles.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\DevisArticle::class)
                <a
                    href="{{ route('devis-articles.create') }}"
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
