@extends('layouts.entreprise.entreprise')

@section('content')

<div class="grid grid-cols-12 gap-6">
    <!-- BEGIN: Profile Menu -->
    <div class="col-span-12 lg:col-span-4 xxl:col-span-3 flex lg:block flex-col-reverse">
        <div class="intro-y box mt-5">
            <div class="relative flex items-center p-5">
                <div class="w-12 h-12 image-fit">
                    <img alt="Icewall Tailwind HTML Admin Template" class="rounded-full" src="{{asset('assets/entreprise/images/profile-10.jpg')}}">
                </div>
                <div class="ml-4 mr-auto">
                    <div class="font-medium text-base">Brad Pitt</div>
                    <div class="text-gray-600">role user</div>
                </div>

            </div>
            <div class="p-5 border-t border-gray-200 dark:border-dark-5">
                <a class="flex items-center text-theme-17 dark:text-gray-300 font-medium" href=""> <i data-feather="activity" class="w-4 h-4 mr-2"></i>Informations personnelles</a>
                <a class="flex items-center mt-5" href=""> <i data-feather="box" class="w-4 h-4 mr-2"></i>Information de compte</a>
                <a class="flex items-center mt-5" href=""> <i data-feather="lock" class="w-4 h-4 mr-2"></i> Changement de mot de passe</a>
                <a class="flex items-center mt-5" href=""> <i data-feather="settings" class="w-4 h-4 mr-2"></i>Parametre de langue</a>
            </div>
            <div class="p-5 border-t border-gray-200 dark:border-dark-5">
                <a class="flex items-center" href=""> <i data-feather="activity" class="w-4 h-4 mr-2"></i>Changer email </a>

            </div>
            <div class="p-5 border-t border-gray-200 dark:border-dark-5 flex">
                <button type="button" class="btn btn-dark py-1 px-2">Désactiver</button>
                <button type="button" class="btn btn-outline-danger py-1 px-2 ml-auto">Déconnexion</button>
            </div>
        </div>
    </div>
    <!-- END: Profile Menu -->
    <div class="col-span-12 lg:col-span-8 xxl:col-span-9">
        <!-- BEGIN: Change Password -->
        <div class="intro-y box lg:mt-5">
            <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
                <h2 class="font-medium text-base mr-auto">
                    Informations de compte
                </h2>
            </div>
            <div class="p-5">
                <div>
                    <label for="" class="form-label">Prénom</label>
                    <input id="" type="text" class="form-control" placeholder="Input text">
                </div>
                <div class="mt-3">
                    <label for="" class="form-label">Nom</label>
                    <input id="" type="text" class="form-control" placeholder="Input text">
                </div>

                <div class="mt-3">
                    <label for="" class="form-label">Téléphone</label>
                    <input id="" type="text" class="form-control" placeholder="Input text">
                </div>
                <div class="mt-3">
                    <label for="" class="form-label">Portable</label>
                    <input id="" type="text" class="form-control" placeholder="Input text">
                </div>
                <div class="mt-3">
                    <label for="" class="form-label">Adresse</label>
                    <input id="" type="text" class="form-control" placeholder="Input text">
                </div>
                <div class="mt-3">
                    <label for="" class="form-label">Genre</label>
                    </select> <select class="form-select mt-2 sm:mr-2" aria-label="Default select example">
                        <option>Choisir</option>
                        <option>Homme </option>
                        <option>Femme</option>
                    </select>
                </div>

                <div class="mt-3">
                    <label for="" class="form-label">Nom</label>
                    <input id="" type="text" class="form-control" placeholder="Input text">
                </div>
                <button type="button" class="btn btn-primary mt-4">Mettre à jour</button>
            </div>
        </div>
        <!-- END: Change Password -->
    </div>
</div>
@endsection
