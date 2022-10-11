@extends('layouts.entreprise.entreprise')

@section('content')

<div class="grid grid-cols-12 gap-6">
    <!-- BEGIN: Profile Menu -->
    <div class="col-span-12 lg:col-span-4 xxl:col-span-3 flex lg:block flex-col-reverse">
        <div class="intro-y box mt-5">
            @include('entreprise.compte.sidemenu')
        </div>
    </div>
    <!-- END: Profile Menu -->
    <div class="col-span-12 lg:col-span-8 xxl:col-span-9">
        <!-- BEGIN: Change Password -->
        <div class="intro-y box lg:mt-5">
            <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
                <h2 class="font-medium text-base mr-auto">
                    Mes adresse emails
                </h2>
            </div>
            <div class="p-5">
                <form action="">
                {{-- //avec comme value les actuels infos sur la base --}}
                    <div>
                        <label for="" class="form-label">Email de connexion</label>
                        <input id="" type="text" class="form-control" placeholder="Input text">
                    </div>
                    <div class="mt-3">
                        <label for="" class="form-label">Email de recupération</label>
                        <input id="" type="text" class="form-control" placeholder="Input text">
                    </div>
                    <button type="button" class="btn btn-primary mt-4">Mettre à jour</button>
                </form>
            </div>
        </div>
        <!-- END: Change Password -->
    </div>
</div>
@endsection
