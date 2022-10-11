<script>
    var navbarStyle = localStorage.getItem("navbarStyle");
    if (navbarStyle && navbarStyle !== 'transparent') {
        document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
    }

</script>
<div class="d-flex align-items-center">
    <div class="toggle-icon-wrapper">

        <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip"
            data-bs-placement="left" title="Toggle Navigation"><span class="navbar-toggle-icon"><span
                    class="toggle-line"></span></span></button>

    </div><a class="navbar-brand" href="index.html">
        <div class="d-flex align-items-center py-3"><img class="me-2" src="{{asset('logowhite.png')}}"
                alt="" width="140" />
        </div>
    </a>
</div>
<div class="collapse navbar-collapse" id="navbarVerticalCollapse">
    <div class="navbar-vertical-content scrollbar" style="background-image: linear-gradient(-45deg, #004362, #0183d0); !important">
        <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
            <li class="nav-item">
                <div class="d-flex mt-2 mb-3 justify-content-center col-md-12 row">
                    <div class="col-md-12 text-center d-flex justify-content-center">
                        <img class="rounded-circle ml-3" src="{{asset(getCompanyInfo()->logo ?? 'assets/no-image.jpg')}}" style="width: 70px !important; height: 70px !important; margin-left:2em! important" alt="" />

                    </div>
                    <div class="col-md-12 mt-2 text-left">
                        <strong>
                            <small class="text-light">{{getAuthByControl()->prenom ?? Auth::user()->prenom}} {{getAuthByControl()->nom ?? Auth::user()->nom}}</small> <br>

                        <small class="text-light">{{getAuthByControl()->email ?? Auth::user()->email}}</small>
                        <br>
                            <span class="text-light">{{getCompanyInfo()->nom_entreprise}}</span>
                        </strong>

                    </div>
                </div>

            </li>

            <li class="nav-item">
                <a class="nav-link " href="{{route('entreprise')}}" role="button" aria-controls="dashboard">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                class="fas fa-chart-pie"></span></span><span class="nav-link-text ps-1">{{__('messages.dashboard')}}</span>
                    </div>
                </a>

            </li>
            <li class="nav-item">
                <!-- label-->

            @if (Auth::user()->role == "cabinet" && $Session == 0 )
                <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                    <div class="col-auto navbar-vertical-label text-white">{{__('messages.companies')}}
                    </div>
                    <div class="col ps-0">
                        <hr class="mb-0 navbar-vertical-divider" />
                    </div>
                </div>


                    @if (getControls())
                        <a class="nav-link dropdown-indicator" href="#control" role="button" data-bs-toggle="collapse"
                        aria-expanded="false" aria-controls="events">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                    class="far fa-building"></span></span><span
                                class="nav-link-text ps-1">{{__('messages.companies')}}</span>
                        </div>
                        </a>
                        <ul class="nav collapse false" id="control">
                            @foreach (getControls() as $control)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('entreprise.session.new', $control->id)}}"
                                        aria-expanded="false">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">{{getEntreprises()->find($control->entreprise_controled_id)->nom_entreprise}}</span>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif

                @endif

                @if ($ModuleEntreprise->where('module_id', 2)->first() && $ModuleEntreprise->where('module_id', 6)->first())
                <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                    <div class="col-auto navbar-vertical-label text-white">{{__('messages.expenses')}} & {{__('Achats')}}
                    </div>
                    <div class="col ps-0">
                        <hr class="mb-0 navbar-vertical-divider" />
                    </div>
                </div>
                @endif

               <!-- @if ($ModuleEntreprise->where('module_id', 6)->first() && Auth::user()->habilitation->fonctionnalites->where('module_id', 6)->first()->voir == "yes")
                <a class="nav-link" href="{{route('depenses.index')}}" role="button" aria-expanded="false">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                class="fas fa-money-bill-wave-alt"></span></span><span class="nav-link-text ps-1">{{__('messages.expenses')}}</span>
                    </div>
                </a>
                @endif-->

                @if ($ModuleEntreprise->where('module_id', 4)->first() &&  Auth::user()->habilitation->fonctionnalites->where('module_id', 4)->first()->voir == "yes")

                <a class="nav-link" href="https://dev.bilan-pro.com/depenses" role="button" aria-expanded="false">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                class="fas fa-shopping-cart"></span></span><span class="nav-link-text ps-1">Dépenses & Achats</span>
                    </div>
                </a>
                <a class="nav-link" href="{{route('factures.index')}}" role="button" aria-expanded="false">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                class="fa fa-list"></span></span><span class="nav-link-text ps-1">Journals des achats</span>
                    </div>
                </a>
                @endif


                @if ($ModuleEntreprise->where('module_id', 2)->first() && Auth::user()->habilitation->fonctionnalites->where('module_id', 2)->first()->voir == "yes")


                 <a class="nav-link dropdown-indicator" href="#vendors" role="button" data-bs-toggle="collapse"
                    aria-expanded="false" aria-controls="vendors">
                    <div class="d-flex align-items-center">
                        <span class="nav-link-icon">
                            <span class="fas fa-users"></span></span><span
                            class="nav-link-text ps-1">{{__('messages.vendors')}}</span>
                    </div>
                </a>
                <ul class="nav collapse false" id="vendors">
                    <li class="nav-item"><a class="nav-link" href="{{route('entreprise.fournisseur.addnew')}}"
                            aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">{{__('messages.add_vendor')}}</span>
                            </div>
                        </a>

                    </li>
                    {{-- <li class="nav-item"><a class="nav-link" href="{{route('entreprise.client.add')}}"
                            aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">{{__('messages.pay_vendor')}}</span>
                            </div>
                        </a>

                    </li> --}}

                    <li class="nav-item"><a class="nav-link" href="{{route('entreprise.fournisseurs.list')}}"
                        aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">{{__('messages.vendors_list')}}</span>
                        </div>
                    </a>

                    </li>
                    <!--li class="nav-item"><a class="nav-link" href="{{route('factures.index')}}"
                        aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">{{__('messages.invoices_to_pay')}}</span>
                        </div>
                    </a>

                    </li-->

                </ul>
                @endif

                @if ($ModuleEntreprise->where('module_id', 1)->first() OR $ModuleEntreprise->where('module_id', 4)->first() OR $ModuleEntreprise->where('module_id', 3)->first() OR $ModuleEntreprise->where('module_id', 10)->first())
                <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                    <div class="col-auto navbar-vertical-label text-white">{{__('messages.commercial')}}
                    </div>
                    <div class="col ps-0">
                        <hr class="mb-0 navbar-vertical-divider" />
                    </div>
                </div>

                @endif


                @if ($ModuleEntreprise->where('module_id', 1)->first() &&  Auth::user()->habilitation->fonctionnalites->where('module_id', 1)->first()->voir == "yes")
                <a class="nav-link" href="{{route('factures.index')}}" role="button" aria-expanded="false">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                class="fas fa-money-bill-wave-alt"></span></span><span class="nav-link-text ps-1">{{__('Facturer Client')}}</span>
                    </div>
                </a>
                <a class="nav-link dropdown-indicator" href="#events" role="button" data-bs-toggle="collapse"
                    aria-expanded="false" aria-controls="events">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                class="fas fa-users"></span></span><span
                            class="nav-link-text ps-1">{{__('messages.clients')}}</span>
                    </div>
                </a>
                <ul class="nav collapse false" id="events">
                    <li class="nav-item"><a class="nav-link" href="{{route('entreprise.clients')}}"
                            aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">{{__('messages.clients_list')}}</span>
                            </div>
                        </a>

                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{route('entreprise.client.add')}}"
                            aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">{{__('messages.client_add')}}</span>
                            </div>
                        </a>

                    </li>

                </ul>

                @endif




                @if ($ModuleEntreprise->where('module_id', 3)->first() && Auth::user()->habilitation->fonctionnalites->where('module_id', 3)->first()->voir == "yes")
                <a class="nav-link dropdown-indicator" href="#e-commerce" role="button" data-bs-toggle="collapse"
                    aria-expanded="false" aria-controls="e-commerce">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                class="fas fa-shopping-cart"></span></span><span class="nav-link-text ps-1">{{__('messages.products_services')}}</span>
                    </div>
                </a>
                <ul class="nav collapse false" id="e-commerce">


                    <li class="nav-item"><a class="nav-link" href="{{route('entreprise.commerciale.produits')}}"
                            aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">{{__('messages.products')}}</span>
                            </div>
                        </a>

                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{route('entreprise.commerciale.services')}}"
                            aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">{{__('messages.services')}}</span>
                            </div>
                        </a>

                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{route('entreprise.commerciale.categories')}}"
                            aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">{{__('messages.categories')}}</span>
                            </div>
                        </a>

                    </li>

                </ul>

                @endif





                @if ($ModuleEntreprise->where('module_id', 10)->first())
                <a class="nav-link dropdown-indicator" href="#social" role="button" data-bs-toggle="collapse"
                aria-expanded="false" aria-controls="social">
                <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                            class="fas fa-file-signature"></span></span><span class="nav-link-text ps-1">{{__('messages.contracts')}}</span>
                </div>
                </a>
                <ul class="nav collapse false" id="social">
                    <li class="nav-item"><a class="nav-link" href="{{route('entreprise.contrats.liste')}}"
                            aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">{{__('messages.contracts_list')}}</span>
                            </div>
                        </a>

                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{route('entreprise.type-contrat.liste')}}"
                            aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">{{__('messages.contracts_types')}}</span>
                            </div>
                        </a>

                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{route('entreprise.models-contrat.liste')}}"
                            aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">{{__('messages.contracts_models')}}</span>
                            </div>
                        </a>

                    </li>

                </ul>

                <a class="nav-link" href="https://dev.bilan-pro.com/entreprise/inventaire/stocks/index" role="button" aria-expanded="false">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                class="fa fa-clipboard"></span></span><span class="nav-link-text ps-1">Gestion D'inventaire</span>
                    </div>
                </a>

                @endif







            </li>

            <li class="nav-item">
                <!-- label-->
                {{-- @if ($ModuleEntreprise->where('module_id', 7)->first() OR $ModuleEntreprise->where('module_id', 8)->first()) --}}
                <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                    <div class="col-auto navbar-vertical-label text-white">{{__('Finances')}}
                    </div>
                    <div class="col ps-0">
                        <hr class="mb-0 navbar-vertical-divider" />
                    </div>
                </div>
                {{-- @endif --}}

                @if ($ModuleEntreprise->where('module_id', 9)->first())
                <a class="nav-link" href="{{route('entreprise.finances')}}" role="button" aria-expanded="false">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                class="far fa-money-bill-alt"></span></span><span class="nav-link-text ps-1">{{__('messages.bank_cash')}}</span>
                    </div>
                </a>
                @endif


                <a class="nav-link dropdown-indicator" href="#plan" role="button" data-bs-toggle="collapse"
                aria-expanded="false" aria-controls="plan">
                <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                            class="fas fa-file-invoice"></span></span><span class="nav-link-text ps-1">{{__('messages.accounting_plan')}}</span>
                </div>
                </a>
                <ul class="nav collapse false" id="plan">


                    <!--li class="nav-item"><a class="nav-link" href="{{route('entreprise.compte-comptable.defaults')}}"
                            aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">{{__('messages.proposed_plan')}}</span>
                            </div>
                        </a>

                    </li-->
                    <li class="nav-item"><a class="nav-link" href="{{route('entreprise.compte-comptable')}}"
                            aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">{{__('messages.customized_plan')}}</span>
                            </div>
                        </a>

                    </li>


                </ul>



                @if ($ModuleEntreprise->where('module_id', 11)->first())
                <a class="nav-link dropdown-indicator" href="#rapports" role="button" data-bs-toggle="collapse"
                    aria-expanded="false" aria-controls="rapports">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                class="fas fa-toilet-paper"></span></span><span class="nav-link-text ps-1">{{__('messages.rapports')}}</span>
                    </div>
                </a>

                <ul class="nav collapse false" id="rapports">

                    <li class="nav-item"><a class="nav-link" href="{{route('entreprise.rapports')}}"
                            aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">{{__('messages.rapports')}}</span>
                            </div>
                        </a>
                    </li>

                    <li class="nav-item"><a class="nav-link" href="{{route('entreprise.rapport.overview')}}"
                        aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">{{__('messages.overview')}}</span>
                        </div>
                    </a>
                </li>



                </ul>
                @endif





            </li>


            <li class="nav-item">
                <!-- label-->
                @if ($ModuleEntreprise->where('module_id', 7)->first() OR $ModuleEntreprise->where('module_id', 8)->first())
                <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                    <div class="col-auto navbar-vertical-label text-white">{{__('messages.hr')}}
                    </div>
                    <div class="col ps-0">
                        <hr class="mb-0 navbar-vertical-divider" />
                    </div>
                </div>
                @endif


                @if ($ModuleEntreprise->where('module_id', 7)->first())
                <a class="nav-link" href="{{route('entreprise.employes')}}" role="button" aria-expanded="false">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                class="fas fa-user-tie"></span></span><span class="nav-link-text ps-1">{{__('messages.employers')}}</span>
                    </div>
                </a>
                @endif

                {{-- @if ($ModuleEntreprise->where('module_id', 8)->first())
                <a class="nav-link" href="{{route('depenses.index')}}" role="button" aria-expanded="false">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                class="fas fa-vote-yea"></span></span><span class="nav-link-text ps-1">Paie</span>
                    </div>
                </a>
                @endif --}}

                {{-- @if ($ModuleEntreprise->where('module_id', 3)->first()) --}}
                {{-- <a class="nav-link" href="{{route('depenses.index')}}" role="button" aria-expanded="false">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                class="fas fa-ticket-alt"></span></span><span class="nav-link-text ps-1">Taxe</span>
                    </div>
                </a> --}}
                {{-- @endif --}}

                @if ($ModuleEntreprise->where('module_id', 14)->first())
                <a class="nav-link dropdown-indicator" href="#comptable" role="button" data-bs-toggle="collapse"
                aria-expanded="false" aria-controls="comptable">
                <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                            class="fas fa-user-shield"></span></span><span class="nav-link-text ps-1">{{__('messages.my_accountant')}}</span>
                </div>
                </a>

                <ul class="nav collapse false" id="comptable">

                    <li class="nav-item"><a class="nav-link" href="{{route('entreprise.comptable')}}"
                            aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">{{__('messages.firm')}}</span>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{route('entreprise.invitations.crearte')}}"
                            aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">{{__('messages.invitation')}}</span>
                            </div>
                        </a>

                    </li>


                </ul>
                @endif





            </li>

            <li class="nav-item">
                <!-- label-->
                <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                    <div class="col-auto navbar-vertical-label text-white">{{__('messages.settings')}}
                    </div>
                    <div class="col ps-0">
                        <hr class="mb-0 navbar-vertical-divider" />
                    </div>
                </div>



                {{-- @if ($ModuleEntreprise->where('module_id', 14)->first()) --}}
                <a class="nav-link dropdown-indicator" href="#reglage" role="button" data-bs-toggle="collapse"
                aria-expanded="false" aria-controls="reglage">
                <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                            class="fas fa-cog"></span></span><span class="nav-link-text ps-1">{{__('messages.config')}}
                        </span>
                </div>
                </a>

                <ul class="nav collapse false" id="reglage">

                    <li class="nav-item"><a class="nav-link" href="{{route('entreprise.taxe.liste')}}"
                            aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">{{__('messages.taxes')}}</span>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{route('entreprise.mode-paiement.liste')}}"
                            aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">{{__('messages.payment_mode')}}</span>
                            </div>
                        </a>

                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{route('entreprise.modalite-paiement.liste')}}"
                        aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">{{__('messages.payment_modality')}}</span>
                        </div>
                        </a>

                    </li>


                        <li class="nav-item"><a class="nav-link" href="{{route('entreprise.utilisateurs')}}"
                                aria-expanded="false">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">{{__('messages.users')}}</span>
                                </div>
                            </a>

                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{route('entreprise.infos')}}"
                            aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">{{__('messages.company_info')}}</span>
                            </div>
                        </a>

                        </li>

                        <li class="nav-item"><a class="nav-link" href="{{route('entreprise.habilitations')}}"
                            aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">{{__('messages.roles')}}</span>
                            </div>
                        </a>

                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{route('entreprise.monCompte')}}"
                        aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">{{__('messages.my_account')}}</span>
                        </div>
                    </a>

                    </li>


                </ul>
                {{-- @endif --}}






            </li>
        </ul>

        <div class="settings mb-3">
            <div class="card alert m-2 p-0 shadow-none" role="alert">

                <div class="d-grid">
                    <a class="btn btn-sm btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                        {{__('messages.logout')}}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
