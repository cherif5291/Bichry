<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm p-2">
    <div class="container">

        <a class="navbar-brand text-primary font-weight-bold text-uppercase" href="{{ url('/') }}">
            Showcase_taif-Comptabilite
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Dashboard</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Apps <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @can('view-any', App\Models\Abonnement::class)
                            <a class="dropdown-item" href="{{ route('abonnements.index') }}">Abonnements</a>
                            @endcan
                            @can('view-any', App\Models\Article::class)
                            <a class="dropdown-item" href="{{ route('articles.index') }}">Articles</a>
                            @endcan
                            @can('view-any', App\Models\Bonus::class)
                            <a class="dropdown-item" href="{{ route('bonuses.index') }}">Bonuses</a>
                            @endcan
                            @can('view-any', App\Models\Banque::class)
                            <a class="dropdown-item" href="{{ route('banques.index') }}">Banques</a>
                            @endcan
                            @can('view-any', App\Models\Caisse::class)
                            <a class="dropdown-item" href="{{ route('caisses.index') }}">Caisses</a>
                            @endcan
                            @can('view-any', App\Models\ClientsEntreprise::class)
                            <a class="dropdown-item" href="{{ route('clients-entreprises.index') }}">Clients Entreprises</a>
                            @endcan
                            @can('view-any', App\Models\Comptescomptable::class)
                            <a class="dropdown-item" href="{{ route('comptescomptables.index') }}">Comptescomptables</a>
                            @endcan
                            @can('view-any', App\Models\User::class)
                            <a class="dropdown-item" href="{{ route('users.index') }}">Users</a>
                            @endcan
                            @can('view-any', App\Models\Contrat::class)
                            <a class="dropdown-item" href="{{ route('contrats.index') }}">Contrats</a>
                            @endcan
                            @can('view-any', App\Models\ContratsModel::class)
                            <a class="dropdown-item" href="{{ route('contrats-models.index') }}">Contrats Models</a>
                            @endcan
                            @can('view-any', App\Models\ContratsType::class)
                            <a class="dropdown-item" href="{{ route('contrats-types.index') }}">Contrats Types</a>
                            @endcan
                            @can('view-any', App\Models\DepensesPanier::class)
                            <a class="dropdown-item" href="{{ route('depenses-paniers.index') }}">Depenses Paniers</a>
                            @endcan
                            @can('view-any', App\Models\DevisArticle::class)
                            <a class="dropdown-item" href="{{ route('devis-articles.index') }}">Devis Articles</a>
                            @endcan
                            @can('view-any', App\Models\Devis::class)
                            <a class="dropdown-item" href="{{ route('all-devis.index') }}">All Devis</a>
                            @endcan
                            @can('view-any', App\Models\DevisesMonetaire::class)
                            <a class="dropdown-item" href="{{ route('devises-monetaires.index') }}">Devises Monetaires</a>
                            @endcan
                            @can('view-any', App\Models\Document::class)
                            <a class="dropdown-item" href="{{ route('documents.index') }}">Documents</a>
                            @endcan
                            @can('view-any', App\Models\FacturesArticle::class)
                            <a class="dropdown-item" href="{{ route('factures-articles.index') }}">Factures Articles</a>
                            @endcan
                            @can('view-any', App\Models\DocumentsType::class)
                            <a class="dropdown-item" href="{{ route('documents-types.index') }}">Documents Types</a>
                            @endcan
                            @can('view-any', App\Models\Entreprise::class)
                            <a class="dropdown-item" href="{{ route('entreprises.index') }}">Entreprises</a>
                            @endcan
                            @can('view-any', App\Models\Habilitation::class)
                            <a class="dropdown-item" href="{{ route('habilitations.index') }}">Habilitations</a>
                            @endcan
                            @can('view-any', App\Models\Fournisseur::class)
                            <a class="dropdown-item" href="{{ route('fournisseurs.index') }}">Fournisseurs</a>
                            @endcan
                            @can('view-any', App\Models\Impot::class)
                            <a class="dropdown-item" href="{{ route('impots.index') }}">Impots</a>
                            @endcan
                            @can('view-any', App\Models\InfosSystem::class)
                            <a class="dropdown-item" href="{{ route('infos-systems.index') }}">Infos Systems</a>
                            @endcan
                            @can('view-any', App\Models\Invitation::class)
                            <a class="dropdown-item" href="{{ route('invitations.index') }}">Invitations</a>
                            @endcan
                            @can('view-any', App\Models\ModelesFacture::class)
                            <a class="dropdown-item" href="{{ route('modeles-factures.index') }}">Modeles Factures</a>
                            @endcan
                            @can('view-any', App\Models\Langue::class)
                            <a class="dropdown-item" href="{{ route('langues.index') }}">Langues</a>
                            @endcan
                            @can('view-any', App\Models\ModelesDevis::class)
                            <a class="dropdown-item" href="{{ route('all-modeles-devis.index') }}">All Modeles Devis</a>
                            @endcan
                            @can('view-any', App\Models\ModelesRecu::class)
                            <a class="dropdown-item" href="{{ route('modeles-recus.index') }}">Modeles Recus</a>
                            @endcan
                            @can('view-any', App\Models\Module::class)
                            <a class="dropdown-item" href="{{ route('modules.index') }}">Modules</a>
                            @endcan
                            @can('view-any', App\Models\Package::class)
                            <a class="dropdown-item" href="{{ route('packages.index') }}">Packages</a>
                            @endcan
                            @can('view-any', App\Models\ModulePack::class)
                            <a class="dropdown-item" href="{{ route('module-packs.index') }}">Module Packs</a>
                            @endcan
                            @can('view-any', App\Models\Paie::class)
                            <a class="dropdown-item" href="{{ route('paies.index') }}">Paies</a>
                            @endcan
                            @can('view-any', App\Models\PaiementsModalite::class)
                            <a class="dropdown-item" href="{{ route('paiements-modalites.index') }}">Paiements Modalites</a>
                            @endcan
                            @can('view-any', App\Models\PaiementsMode::class)
                            <a class="dropdown-item" href="{{ route('paiements-modes.index') }}">Paiements Modes</a>
                            @endcan
                            @can('view-any', App\Models\PiecesJointe::class)
                            <a class="dropdown-item" href="{{ route('pieces-jointes.index') }}">Pieces Jointes</a>
                            @endcan
                            @can('view-any', App\Models\Project::class)
                            <a class="dropdown-item" href="{{ route('projects.index') }}">Projects</a>
                            @endcan
                            @can('view-any', App\Models\Recurrence::class)
                            <a class="dropdown-item" href="{{ route('recurrences.index') }}">Recurrences</a>
                            @endcan
                            @can('view-any', App\Models\Regle::class)
                            <a class="dropdown-item" href="{{ route('regles.index') }}">Regles</a>
                            @endcan
                            @can('view-any', App\Models\Rupture::class)
                            <a class="dropdown-item" href="{{ route('ruptures.index') }}">Ruptures</a>
                            @endcan
                            @can('view-any', App\Models\Taxe::class)
                            <a class="dropdown-item" href="{{ route('taxes.index') }}">Taxes</a>
                            @endcan
                            @can('view-any', App\Models\Revenu::class)
                            <a class="dropdown-item" href="{{ route('revenus.index') }}">Revenus</a>
                            @endcan
                            @can('view-any', App\Models\EmployesEntreprise::class)
                            <a class="dropdown-item" href="{{ route('employes-entreprises.index') }}">Employes Entreprises</a>
                            @endcan
                            @can('view-any', App\Models\Fonctionnalite::class)
                            <a class="dropdown-item" href="{{ route('fonctionnalites.index') }}">Fonctionnalites</a>
                            @endcan
                            @can('view-any', App\Models\Presence::class)
                            <a class="dropdown-item" href="{{ route('presences.index') }}">Presences</a>
                            @endcan
                            @can('view-any', App\Models\RecusVente::class)
                            <a class="dropdown-item" href="{{ route('recus-ventes.index') }}">Recus Ventes</a>
                            @endcan
                            @can('view-any', App\Models\Reglement::class)
                            <a class="dropdown-item" href="{{ route('reglements.index') }}">Reglements</a>
                            @endcan
                            @can('view-any', App\Models\Transaction::class)
                            <a class="dropdown-item" href="{{ route('transactions.index') }}">Transactions</a>
                            @endcan
                            @can('view-any', App\Models\Depense::class)
                            <a class="dropdown-item" href="{{ route('depenses.index') }}">Depenses</a>
                            @endcan
                            @can('view-any', App\Models\Facture::class)
                            <a class="dropdown-item" href="{{ route('factures.index') }}">Factures</a>
                            @endcan
                        </div>

                    </li>
                    @if (Auth::user()->can('view-any', Spatie\Permission\Models\Role::class) ||
                        Auth::user()->can('view-any', Spatie\Permission\Models\Permission::class))
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Access Management <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @can('view-any', Spatie\Permission\Models\Role::class)
                            <a class="dropdown-item" href="{{ route('roles.index') }}">Roles</a>
                            @endcan

                            @can('view-any', Spatie\Permission\Models\Permission::class)
                            <a class="dropdown-item" href="{{ route('permissions.index') }}">Permissions</a>
                            @endcan
                        </div>
                    </li>
                    @endif
                @endauth
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                               Se Déconnecter
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
