<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item"><a href="{{route('admin.parametres')}}" class="nav-link @if ($Is_selected == 1)  active @endif" id="home-tab"  role="tab" aria-controls="tab-home" aria-selected="@if ($Is_selected == 1)  true @else false @endif">Général</a></li>
    {{-- <li class="nav-item"><a class="nav-link @if ($Is_selected == 2)  active @endif" id="profile-tab"  role="tab" aria-controls="tab-profile" aria-selected="@if ($Is_selected == 2)  true @else false @endif">Paiements</a></li> --}}
    <li class="nav-item"><a href="{{route('admin.parametres.packages')}}"  class="nav-link @if ($Is_selected == 3)  active @endif" id="contact-tab"  role="tab" aria-controls="tab-contact" aria-selected="@if ($Is_selected == 3)  true @else false @endif">Packages</a></li>
    <li class="nav-item"><a href="{{route('admin.website')}}"  class="nav-link @if ($Is_selected == 5)  active @endif" id="website-tab"  role="tab" aria-controls="tab-website" aria-selected="@if ($Is_selected == 5)  true @else false @endif">Website</a></li>

    <li class="nav-item"><a href="{{route('admin.parametres.utilisateurs')}}"  class="nav-link @if ($Is_selected == 4)  active @endif" id="tab-utilisateurs"  role="tab" aria-controls="tab-utilisateurs" aria-selected="@if ($Is_selected == 4)  true @else false @endif">Utilisateurs</a></li>
</ul>
