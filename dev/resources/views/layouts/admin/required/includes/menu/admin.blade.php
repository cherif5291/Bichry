<script>
    var navbarStyle = localStorage.getItem("navbarStyle");
    if (navbarStyle && navbarStyle !== 'transparent') {
      document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
    }
  </script>
  <div class="d-flex align-items-center">
    <div class="toggle-icon-wrapper">

      <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>

    </div><a class="navbar-brand" href="index.html">
      <div class="d-flex align-items-center py-3"><img class="me-2" src="{{asset('logowhite.png')}}" alt="" width="140" />
      </div>
    </a>
  </div>
  <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
    <div class="navbar-vertical-content scrollbar">
      <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
        <li class="nav-item">
          <!-- parent pages--><a class="nav-link " href="{{route('admin')}}" role="button"  aria-controls="dashboard">
            <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-chart-pie"></span></span><span class="nav-link-text ps-1">Tableau de bord</span>
            </div>
          </a>

        </li>
        <li class="nav-item">
          <!-- label-->
          <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
            <div class="col-auto navbar-vertical-label">Clients
            </div>
            <div class="col ps-0">
              <hr class="mb-0 navbar-vertical-divider" />
            </div>
          </div>
          <li class="nav-item">
            <!-- parent pages--><a class="nav-link" href="{{route('admin.clients.abonnements')}}" role="button"  aria-controls="dashboard">
              <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-chart-pie"></span></span><span class="nav-link-text ps-1">Abonnement</span>
              </div>
            </a>

          </li>
          <li class="nav-item">
            <!-- parent pages--><a class="nav-link" href="{{route('admin.clients.entreprises')}}" role="button"  aria-controls="dashboard">
              <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-chart-pie"></span></span><span class="nav-link-text ps-1">Entreprise</span>
              </div>
            </a>

          </li>
          <li class="nav-item">
            <!-- parent pages--><a class="nav-link"  href="{{route('admin.clients.cabinets')}}" role="button"  aria-controls="dashboard">
              <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-chart-pie"></span></span><span class="nav-link-text ps-1">Cabinet</span>
              </div>
            </a>

          </li>

          <li class="nav-item">
            <!-- parent pages--><a class="nav-link"  href="{{route('admin.compte-comptable.default')}}" role="button"  aria-controls="dashboard">
              <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-chart-pie"></span></span><span class="nav-link-text ps-1">Plans comptable</span>
              </div>
            </a>

          </li>
          {{-- <!-- parent pages--><a class="nav-link" href="app/calendar.html" role="button" aria-expanded="false">
            <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-calendar-alt"></span></span><span class="nav-link-text ps-1">Dépenses</span>
            </div>
          </a>
          <!-- parent pages--><a class="nav-link" href="app/chat.html" role="button" aria-expanded="false">
            <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-comments"></span></span><span class="nav-link-text ps-1">Fournisseurs</span>
            </div>
          </a> --}}
          <!-- parent pages-->
            {{-- <a class="nav-link" href="{{route('depenses.index')}}" role="button" aria-expanded="false">
                <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fab fa-trello"></span></span><span class="nav-link-text ps-1">Dépenses</span>
                </div>
            </a>

            <a class="nav-link" href="{{route('entreprise.fournisseurs.list')}}" role="button" aria-expanded="false">
                <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fab fa-trello"></span></span><span class="nav-link-text ps-1">Fournisseurs</span>
                </div>
            </a> --}}
            <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                <div class="col-auto navbar-vertical-label">Paramètres
                </div>
                <div class="col ps-0">
                  <hr class="mb-0 navbar-vertical-divider" />
                </div>
              </div>

              <li class="nav-item">
                <!-- parent pages--><a class="nav-link " href="{{route('admin.parametres')}}" role="button"  aria-controls="dashboard">
                  <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-chart-pie"></span></span><span class="nav-link-text ps-1">Paramètres</span>
                  </div>
                </a>

              </li>

          <!-- parent pages-->
          {{-- <a class="nav-link dropdown-indicator" href="#events" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="events">
            <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-calendar-day"></span></span><span class="nav-link-text ps-1">Clients</span>
            </div>
          </a>
          <ul class="nav collapse false" id="events">
            <li class="nav-item"><a class="nav-link" href="{{route('entreprise.clients')}}" aria-expanded="false">
                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Liste des clients</span>
                </div>
              </a>
              <!-- more inner pages-->
            </li>
            <li class="nav-item"><a class="nav-link" href="{{route('entreprise.client.add')}}" aria-expanded="false">
                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Ajouter un client</span>
                </div>
              </a>
              <!-- more inner pages-->
            </li>
            {{-- <li class="nav-item"><a class="nav-link" href="{{route('entreprise.client.type')}}" aria-expanded="false">
                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Type de client</span>
                </div>
              </a>
              <!-- more inner pages-->
            </li>
          </ul>
            <a class="nav-link" href="{{route('factures.index')}}" role="button" aria-expanded="false">
                <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fab fa-trello"></span></span><span class="nav-link-text ps-1">Factures</span>
                </div>
            </a>
            {{-- <a class="nav-link" href="{{route('depenses.index')}}" role="button" aria-expanded="false">
                <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fab fa-trello"></span></span><span class="nav-link-text ps-1">Devis</span>
                </div>
            </a>

            <a class="nav-link" href="{{route('depenses.index')}}" role="button" aria-expanded="false">
                <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fab fa-trello"></span></span><span class="nav-link-text ps-1">Règlements</span>
                </div>
            </a> --}}
          <!-- parent pages-->
          {{-- <a class="nav-link dropdown-indicator" href="#e-commerce" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="e-commerce">
            <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-shopping-cart"></span></span><span class="nav-link-text ps-1">Produits & services</span>
            </div>
          </a>
          <ul class="nav collapse false" id="e-commerce">


            <li class="nav-item"><a class="nav-link" href="{{route('entreprise.commerciale.produits')}}" aria-expanded="false">
                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Produits</span>
                </div>
              </a> --}}
              <!-- more inner pages-->
            {{-- </li>
            <li class="nav-item"><a class="nav-link" href="{{route('entreprise.commerciale.services')}}" aria-expanded="false">
                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Services</span>
                </div>
              </a> --}}
              <!-- more inner pages-->
            {{-- </li>
            <li class="nav-item"><a class="nav-link" href="{{route('entreprise.commerciale.categories')}}" aria-expanded="false">
                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Catégories</span>
                </div>
              </a>
              <!-- more inner pages-->
            </li> --}}

          {{-- </ul>
            <a class="nav-link dropdown-indicator" href="#social" role="button"
                  data-bs-toggle="collapse" aria-expanded="false" aria-controls="social">
                  <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                        class="fas fa-share-alt"></span></span><span class="nav-link-text ps-1">Contrats</span>
                  </div>
            </a>
            <ul class="nav collapse false" id="social">
                <li class="nav-item"><a class="nav-link" href="{{route('entreprise.contrats.liste')}}" aria-expanded="false">
                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Liste des contrats</span>
                    </div>
                </a>
                <!-- more inner pages-->
                </li>
                <li class="nav-item"><a class="nav-link" href="{{route('entreprise.type-contrat.liste')}}"
                    aria-expanded="false">
                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Type de contrat</span>
                    </div>
                </a>
                <!-- more inner pages-->
                </li>
                <li class="nav-item"><a class="nav-link" href="{{route('entreprise.models-contrat.liste')}}"
                    aria-expanded="false">
                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Modèles contrat</span>
                    </div>
                </a>
                <!-- more inner pages-->
                </li>

            </ul>

            <!-- parent pages--><a class="nav-link" href="{{route('entreprise.finances')}}" role="button" aria-expanded="false">
                <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="far fa-money-bill-alt"></span></span><span class="nav-link-text ps-1">Caisses & Banques</span>
                </div>
              </a>

            {{-- <a class="nav-link dropdown-indicator" href="#social" role="button"
                  data-bs-toggle="collapse" aria-expanded="false" aria-controls="social">
                  <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                        class="fas fa-share-alt"></span></span><span class="nav-link-text ps-1">Devis</span>
                  </div>
            </a>

            <ul class="nav collapse false" id="social">

                <li class="nav-item"><a class="nav-link" href="../../../app/social/activity-log.html"
                    aria-expanded="false">
                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Ajouter un devis</span>
                    </div>
                    </a>
                </li>
                <li class="nav-item"><a class="nav-link" href="../../../app/social/feed.html" aria-expanded="false">
                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Liste des devis</span>
                    </div>
                </a>
                <!-- more inner pages-->
                </li>


            </ul>

        </li> --}}
        {{-- <li class="nav-item">
          <!-- label-->
          <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
            <div class="col-auto navbar-vertical-label">Ressources Humaines
            </div>
            <div class="col ps-0">
              <hr class="mb-0 navbar-vertical-divider" />
            </div>
          </div>

            <a class="nav-link" href="{{route('entreprise.employes')}}" role="button" aria-expanded="false">
                <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fab fa-trello"></span></span><span class="nav-link-text ps-1">Employés</span>
                </div>
            </a>
            <a class="nav-link" href="{{route('depenses.index')}}" role="button" aria-expanded="false">
                <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fab fa-trello"></span></span><span class="nav-link-text ps-1">Paie</span>
                </div>
            </a>
            <a class="nav-link" href="{{route('depenses.index')}}" role="button" aria-expanded="false">
                <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fab fa-trello"></span></span><span class="nav-link-text ps-1">Taxe</span>
                </div>
            </a>
             <!-- parent pages--><a class="nav-link" href="{{route('entreprise.finances')}}" role="button" aria-expanded="false">
                <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="far fa-money-bill-alt"></span></span><span class="nav-link-text ps-1">Caisses & Banques</span>
                </div>
              </a>

            <a class="nav-link dropdown-indicator" href="#comptable" role="button"
                  data-bs-toggle="collapse" aria-expanded="false" aria-controls="comptable">
                  <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                        class="fas fa-share-alt"></span></span><span class="nav-link-text ps-1">Mon Comptable</span>
                  </div>
            </a>

            <ul class="nav collapse false" id="comptable">

                <li class="nav-item"><a class="nav-link" href="{{route('entreprise.comptable')}}"
                    aria-expanded="false">
                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Mon cabinet</span>
                    </div>
                    </a>
                </li>
                <li class="nav-item"><a class="nav-link" href="{{route('entreprise.invitations.crearte')}}" aria-expanded="false">
                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Invitation</span>
                    </div>
                </a>
                <!-- more inner pages-->
                </li>


            </ul>
            {{-- <a class="nav-link" href="{{route('entreprise.invitations.crearte')}}" role="button" aria-expanded="false">
                <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fab fa-trello"></span></span><span class="nav-link-text ps-1">Comptabilité</span>
                </div>
            </a>

            <a class="nav-link dropdown-indicator" href="#rapports" role="button"
                  data-bs-toggle="collapse" aria-expanded="false" aria-controls="rapports">
                  <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                        class="fas fa-share-alt"></span></span><span class="nav-link-text ps-1">Rapports</span>
                  </div>
            </a>

            <ul class="nav collapse false" id="rapports">

                <li class="nav-item"><a class="nav-link" href="{{route('entreprise.rapports')}}"
                    aria-expanded="false">
                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Rapports</span>
                    </div>
                    </a>
                </li>
                {{-- <li class="nav-item"><a class="nav-link" href="{{route('entreprise.performances')}}" aria-expanded="false">
                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Performances</span>
                    </div>
                </a>
                <!-- more inner pages-->
                </li>


            </ul>
        </li>

        <li class="nav-item">
          <!-- label-->
          <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
            <div class="col-auto navbar-vertical-label">Paramètres
            </div>
            <div class="col ps-0">
              <hr class="mb-0 navbar-vertical-divider" />
            </div>
          </div>
          <!-- parent pages--><a class="nav-link" href="{{route('entreprise.monCompte')}}" role="button" aria-expanded="false">
            <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-rocket"></span></span><span class="nav-link-text ps-1">Mon Compte</span>
            </div>
          </a>

          <!-- parent pages--><a class="nav-link" href="{{route('entreprise.infos')}}" role="button" aria-expanded="false">
            <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-rocket"></span></span><span class="nav-link-text ps-1">Infos Entreprise</span>
            </div>
          </a>

        </li>
      </ul>
      {{-- <div class="settings mb-3">
        <div class="card alert p-0 shadow-none" role="alert">
          <div class="btn-close-falcon-container">
            <div class="btn-close-falcon" aria-label="Close" data-bs-dismiss="alert"></div>
          </div>
          <div class="card-body text-center"><img src="{{asset('assets/admin/img/icons/spot-illustrations/navbar-vertical.png')}}" alt="" width="50" />
            <p class="fs--2 mt-2">Nouveau compte ? <br />Cliquez ici pour changer de mot de passe</p>
            <div class="d-grid"><a class="btn btn-sm btn-purchase" href="{{route('entreprise.monCompte')}}" target="_blank">Changer</a></div>
          </div>
        </div>
      </div> --}}
      <div class="settings mb-3">
        <div class="card alert m-2 p-0 shadow-none" role="alert">

            <div class="d-grid">
                <a class="btn btn-sm btn-danger" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                Déconnexion
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
      </div>
    </div>
  </div>
