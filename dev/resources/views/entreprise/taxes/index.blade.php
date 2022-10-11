@extends('layouts.entreprise.entreprise')

@section('content')
<div class="row">
    <div class="col-12">
        @include('layouts.entreprise.required.includes.alert')
    </div>
</div>
    <div class="grid grid-cols-12 gap-6 mt-8">
        <div class="col-span-12 lg:col-span-3 xxl:col-span-2">
            <!-- BEGIN: File Manager Menu -->
            <div class="intro-y box p-5 mt-0">
                <div class="">
                    <a href="#taxe" class="flex items-center px-3 py-2 rounded-md bg-theme-17 text-white font-medium"> <i class="w-4 h-4 mr-2" data-feather="image"></i> Taxe </a>
                    <a href="#transaction" class="flex items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 mr-2" data-feather="video"></i> Transactions </a>
                    <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 mr-2" data-feather="file"></i> Documents </a>
                    <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 mr-2" data-feather="users"></i> Shared </a>
                    <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 mr-2" data-feather="trash"></i> Trash </a>
                </div>
            </div>
            <!-- END: File Manager Menu -->
        </div>
        <div class="col-span-12 lg:col-span-9 xxl:col-span-10">
            <!-- BEGIN: File Manager Filter -->
            <div class="intro-y flex flex-col-reverse sm:flex-row items-center">
                <div class="w-full sm:w-auto relative mr-auto mt-3 sm:mt-0">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 ml-3 left-0 z-10 text-gray-700 dark:text-gray-300" data-feather="search"></i>
                    <input type="text" class="form-control w-full sm:w-64 box px-10 text-gray-700 dark:text-gray-300 placeholder-theme-8" placeholder="Recherche taxe">
                    <div class="inbox-filter dropdown absolute inset-y-0 mr-3 right-0 flex items-center" data-placement="bottom-start">
                        <i class="dropdown-toggle w-4 h-4 cursor-pointer text-gray-700 dark:text-gray-300" role="button" aria-expanded="false" data-feather="chevron-down"></i>
                        <div class="inbox-filter__dropdown-menu dropdown-menu pt-2">
                            <div class="dropdown-menu__content box p-5">
                                <div class="grid grid-cols-12 gap-4 gap-y-3">
                                    <div class="col-span-12 flex items-center mt-3">
                                        <button type="submit" class="btn btn-primary w-32 ml-2">recherche</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full sm:w-auto flex">
                    <a href="{{route('taxes.create')}}" class="btn btn-primary shadow-md mr-2"><i class="w-4 h-4" data-feather="plus"></i>Ajouter taxe</a>
                </div>
            </div>
            <!-- END: File Manager Filter -->
            <!-- BEGIN: Directory & Files -->
            <div class="intro-y grid grid-cols-12 gap-3 sm:gap-6 mt-5" id="taxe">
                @forelse($taxes as $taxe)
                <div class="intro-y col-span-6 sm:col-span-4 md:col-span-3 xxl:col-span-2">
                    <div class="file box rounded-md px-5 pt-8 pb-5 px-3 sm:px-5 relative zoom-in">

                        <a href="" class="w-3/5 file__icon file__icon--empty-directory mx-auto"></a> <a href="" class="block font-medium mt-4 text-center truncate">{{ $taxe->nom ?? '-' }}</a>
                        <div class="text-gray-600 text-xs text-center mt-0.5">{{ $taxe->taux ?? '-' }}</div>
                        <div class="absolute top-0 right-0 mr-2 mt-2 dropdown ml-auto">
                            <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false"> <i data-feather="more-vertical" class="w-5 h-5 text-gray-600"></i> </a>
                            <div class="dropdown-menu w-40">
                                <div class="dropdown-menu__content box dark:bg-dark-1 p-2">
                                    {{-- @can('update', $taxe) --}}
                                    <a href="{{ route('taxes.edit', $taxe->id) }}" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="edit" class="w-4 h-4 mr-2"></i> Modifier </a>
                                    {{-- @endcan
                                    @can('delete', $taxe) --}}
                                    <form
                                        action="{{ route('taxes.destroy', $taxe->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('{{ __('Voullez vous vraiment supprimer') }}')"
                                    >
                                        @csrf @method('DELETE')
                                    <button type="submit" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="trash" class="w-4 h-4 mr-2"></i> Supprimer </button>
                                </form>
                                {{-- @endcan --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <p>Pas de taxe disponible
                @endforelse
            </div>
            <!-- END: Directory & Files -->
            <!-- BEGIN: Pagination -->
            <div class="intro-y flex flex-wrap sm:flex-row sm:flex-nowrap items-center mt-6">
                {!! $taxes->render() !!}
            </div>
            <!-- END: Pagination -->
        </div>
    </div>
@endsection
