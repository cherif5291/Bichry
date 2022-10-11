@extends('layouts.entreprise.entreprise')

@section('content')

@if (Auth::user()->role == "entreprise" OR Auth::user()->role == "admin" OR Auth::user()->role == "cabinet")
@php
$PackageEntreprise = $Abonnement->where('entreprise_id', Auth::user()->entreprise_id)->first()->package_id;
// $PackageEntreprise = $Packages::where('package_id', $AbonnementEntreprise->package_id)->first();
$ModuleEntreprise = $ModulePack->where('package_id', $PackageEntreprise);
@endphp
@endif


<div class="row">
    <div class="col-12">
        @include('layouts.entreprise.required.includes.alert')
    </div>
</div>
<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Liste d'articles
    </h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        <a href="{{ route('articles.create') }}" class="btn btn-primary shadow-md mr-2"><i data-feather="plus" class="w-4 h-4 mr-2"></i>Ajouter article</a>
    </div>
</div>
<!-- BEGIN: HTML Table Data -->
<div class="intro-y box p-5 mt-5">
    <div class="flex flex-col sm:flex-row sm:items-end xl:items-start">
        <form id="tabulator-html-filter-form" class="xl:flex sm:mr-auto">
            <div class="sm:flex items-center sm:mr-4 mt-2 xl:mt-0">
                <input id="tabulator-html-filter-value" type="text" class="form-control sm:w-40 xxl:w-full mt-2 sm:mt-0"
                    placeholder="Search...">
            </div>
            <div class="mt-2 xl:mt-0">
                <button id="tabulator-html-filter-go" type="button"
                    class="btn btn-primary w-full sm:w-16">Chercher</button>
                <button id="tabulator-html-filter-reset" type="button"
                    class="btn btn-secondary w-full sm:w-16 mt-2 sm:mt-0 sm:ml-1">Annuler</button>
            </div>
        </form>
        <div class="flex mt-5 sm:mt-0">
            <button id="tabulator-print" class="btn btn-outline-secondary w-1/2 sm:w-auto mr-2"> <i
                    data-feather="printer" class="w-4 h-4 mr-2"></i> Imprimer </button>
            <div class="dropdown w-1/2 sm:w-auto">
                <button class="dropdown-toggle btn btn-outline-secondary w-full sm:w-auto" aria-expanded="false"> <i
                        data-feather="file-text" class="w-4 h-4 mr-2"></i> Exporter <i data-feather="chevron-down"
                        class="w-4 h-4 ml-auto sm:ml-2"></i> </button>
                <div class="dropdown-menu w-40">
                    <div class="dropdown-menu__content box dark:bg-dark-1 p-2">
                        <a id="tabulator-export-csv" href="javascript:;"
                            class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                            <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export CSV </a>
                        <a id="tabulator-export-json" href="javascript:;"
                            class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                            <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export JSON </a>
                        <a id="tabulator-export-xlsx" href="javascript:;"
                            class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                            <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export XLSX </a>
                        <a id="tabulator-export-html" href="javascript:;"
                            class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                            <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export HTML </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="overflow-x-auto scrollbar-hidden">
        <div id="tabulator1" class="mt-5 table-report table-report--tabulator">
            <div class="overflow-x-auto">
                <table class="table">
                    <thead>
                        <tr class="bg-gray-700 dark:bg-dark-1 text-white">
                            <th class="whitespace-nowrap">#SN</th>
                            <th class="whitespace-nowrap">Image</th>
                            <th class="whitespace-nowrap">Nom</th>
                            <th class="whitespace-nowrap">Prix unitaire</th>
                            <th class="whitespace-nowrap">Quantite</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($articles as $article)
                        <tr>
                            <td class="text-center">{{ $article->id ?? '-' }}</td>
                            <td class="w-40">
                                <div class="w-10 h-10 image-fit zoom-in">
                                    <img alt="image" class="tooltip rounded-full" src="{{asset( $article->image ?? 'assets/entreprise/images/preview-11.jpg')}}">
                                </div>
                            </td>
                            <td>
                                {{ $article->nom ?? '-' }}
                            </td>
                            <td>
                                {{ $article->prix_unitaire ?? '-' }}
                            </td>
                            <td>
                                {{ $article->quantite ?? '-' }}
                            </td>
                            <td style="display: flex; justify-content: center">
                                <a href="{{ route('articles.edit', $article->id)}}" class="btn btn-info"
                                    title="Edit"><i data-feather="edit"></i></a>
                                <form
                                    action="{{ route('articles.destroy', $article) }}"
                                    method="POST"
                                    onsubmit="return confirm('{{ __('Voullez vous vraiment supprimer') }}')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="btn btn-danger js-sweetalert dltBtn ml-2" title="Delete"><i
                                        data-feather="trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <tr>Pas d'articles disponible</tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5">
                                {!! $articles->render() !!}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
