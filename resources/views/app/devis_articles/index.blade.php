@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">
                    @lang('crud.devis_articles.index_title')
                </h4>
            </div>

            <div class="searchbar mt-4 mb-5">
                <div class="row">
                    <div class="col-md-6">
                        <form>
                            <div class="input-group">
                                <input
                                    id="indexSearch"
                                    type="text"
                                    name="search"
                                    placeholder="{{ __('crud.common.search') }}"
                                    value="{{ $search ?? '' }}"
                                    class="form-control"
                                    autocomplete="off"
                                />
                                <div class="input-group-append">
                                    <button
                                        type="submit"
                                        class="btn btn-primary"
                                    >
                                        <i class="icon ion-md-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 text-right">
                        @can('create', App\Models\DevisArticle::class)
                        <a
                            href="{{ route('devis-articles.create') }}"
                            class="btn btn-primary"
                        >
                            <i class="icon ion-md-add"></i>
                            @lang('crud.common.create')
                        </a>
                        @endcan
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th class="text-left">
                                @lang('crud.devis_articles.inputs.devis_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.devis_articles.inputs.taxe_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.devis_articles.inputs.article_id')
                            </th>
                            <th class="text-right">
                                @lang('crud.devis_articles.inputs.qte')
                            </th>
                            <th class="text-right">
                                @lang('crud.devis_articles.inputs.taux')
                            </th>
                            <th class="text-right">
                                @lang('crud.devis_articles.inputs.total')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($devisArticles as $devisArticle)
                        <tr>
                            <td>
                                {{ optional($devisArticle->devis)->cc_cci ?? '-'
                                }}
                            </td>
                            <td>
                                {{ optional($devisArticle->taxe)->nom ?? '-' }}
                            </td>
                            <td>
                                {{ optional($devisArticle->article)->nom ?? '-'
                                }}
                            </td>
                            <td>{{ $devisArticle->qte ?? '-' }}</td>
                            <td>{{ $devisArticle->taux ?? '-' }}</td>
                            <td>{{ $devisArticle->total ?? '-' }}</td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $devisArticle)
                                    <a
                                        href="{{ route('devis-articles.edit', $devisArticle) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $devisArticle)
                                    <a
                                        href="{{ route('devis-articles.show', $devisArticle) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $devisArticle)
                                    <form
                                        action="{{ route('devis-articles.destroy', $devisArticle) }}"
                                        method="POST"
                                        onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"
                                    >
                                        @csrf @method('DELETE')
                                        <button
                                            type="submit"
                                            class="btn btn-light text-danger"
                                        >
                                            <i class="icon ion-md-trash"></i>
                                        </button>
                                    </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="7">
                                {!! $devisArticles->render() !!}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
