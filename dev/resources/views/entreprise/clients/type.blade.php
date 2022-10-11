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
    <a class="flex items-center mt-5" href="{{route('entreprise.user.account')}}"> <i data-feather="box" class="w-4 h-4 mr-2"></i>Information de compte</a>
    <a class="flex items-center mt-5" href="{{route('entreprise.user.password')}}"> <i data-feather="lock" class="w-4 h-4 mr-2"></i> Changement de mot de passe</a>
    <a class="flex items-center mt-5" href=""> <i data-feather="settings" class="w-4 h-4 mr-2"></i>Parametre de langue</a>
</div>
<div class="p-5 border-t border-gray-200 dark:border-dark-5">
    <a class="flex items-center" href="{{route('entreprise.user.emails')}}"> <i data-feather="activity" class="w-4 h-4 mr-2"></i>Changer email </a>

</div>
<div class="p-5 border-t border-gray-200 dark:border-dark-5 flex">
    <button type="button" class="btn btn-dark py-1 px-2">Désactiver</button>
    <button type="button" class="btn btn-outline-danger py-1 px-2 ml-auto">Déconnexion</button>
</div>
