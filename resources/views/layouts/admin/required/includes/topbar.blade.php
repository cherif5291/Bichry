<button class="btn navbar-toggler-humburger-icon navbar-toggler me-1 me-sm-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
            <a class="navbar-brand me-1 me-sm-3" href="index.html">
              <div class="d-flex align-items-center"><img class="me-2" src="{{asset('logowhite.png')}}" alt="" width="140" />
              </div>
            </a>
            <ul class="navbar-nav align-items-center d-none d-lg-block navbar-nav-icons flex-row align-items-center">
                @if (Auth::user()->role == "cabinet" && $Session == 1)

                <li class="nav-item dropdown">
                    <a class="nav-link btn-sm btn-danger text-white" id="navbarDropdownNotification" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Session Entreprise
                    </a>
                    <div class="dropdown-menu dropdown-menu-start dropdown-menu-card dropdown-menu-notification" aria-labelledby="navbarDropdownNotification" style="">
                      <div class="card card-notification shadow-none">
                        <div class="card-header">
                          <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                              <h6 class="card-header-title mb-0">Entreprises</h6>
                            </div>
                            <div class="col-auto ps-0 ps-sm-3"><a class="card-link fw-normal text-danger" href="{{route('entreprise.session.end')}}"><strong>Retourner au cabinet</strong></a></div>
                          </div>
                        </div>
                        <div class="scrollbar-overlay" style="max-height:19rem; ">
                          <div class="list-group list-group-flush fw-normal fs--1">


                            @if (getControls())

                            @foreach (getControls() as $control)
                                <div class="list-group-item">
                                    <a class="notification notification-flush notification-unread" href="{{route('entreprise.session.new', $control->id)}}">
                                    <div class="notification-avatar">
                                        <div class="avatar avatar-2xl me-3">
                                        <img class="rounded-circle" src="{{asset(getEntreprises()->find($control->entreprise_controled_id)->logo?? 'assets/no-image.jpg')}}" alt="" />

                                        </div>
                                    </div>
                                    <div class="notification-body">
                                        <p class="mb-1"><strong>{{getEntreprises()->find($control->entreprise_controled_id)->nom_entreprise}}</strong> </p>

                                    </div>
                                    </a>

                                </div>

                            @endforeach

                            @endif
                          </div>
                        </div>
                      </div>
                    </div>

                  </li>


                @endif
            </ul>
            <ul class="navbar-nav navbar-nav-icons ms-auto flex-row align-items-center">

                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="dashboards">
                     @if (getLang()->code == "fr") <img src="{{asset('assets/icons/france.png')}}" style="height: 20px !important" alt=""> @elseif (getLang()->code == "en") <img src="{{asset('assets/icons/anglais.png')}}" style="height: 20px !important" alt=""> @endif {{ getLang()->nom }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-card border-0 mt-0" aria-labelledby="dashboards">
                      <div class="bg-white dark__bg-1000 rounded-3 py-2">
                        @foreach (Config::get('languages') as $lang => $language)
                            @if ($lang)

                                    <a class="dropdown-item link-600 fw-medium" href="{{ route('lang.switch', $lang) }}">  @if ($lang == "fr") <img src="{{asset('assets/icons/france.png')}}" style="height: 20px !important" alt=""> @elseif ($lang == "en") <img src="{{asset('assets/icons/anglais.png')}}" style="height: 20px !important" alt=""> @endif {{$language['display']}}</a>
                            @endif
                        @endforeach
                      </div>
                    </div>
                  </li>
              <li class="nav-item">
                <div class="theme-control-toggle fa-icon-wait px-2">
                  <input class="form-check-input ms-0 theme-control-toggle-input" id="themeControlToggle" type="checkbox" data-theme-control="theme" value="dark" />
                  <label class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch to light theme"><span class="fas fa-sun fs-0"></span></label>
                  <label class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch to dark theme"><span class="fas fa-moon fs-0"></span></label>
                </div>
              </li>


              <li class="nav-item dropdown">
                <a class="nav-link notification-indicator notification-indicator-primary px-0 fa-icon-wait" id="navbarDropdownNotification" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fas fa-bell" data-fa-transform="shrink-6" style="font-size: 33px;"></span></a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-card dropdown-menu-notification" aria-labelledby="navbarDropdownNotification">
                  <div class="card card-notification shadow-none">
                    <div class="card-header">
                      <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                          <h6 class="card-header-title mb-0">Notifications</h6>
                        </div>
                        <div class="col-auto ps-0 ps-sm-3"><a class="card-link fw-normal" href="#">Marquer comme lu</a></div>
                      </div>
                    </div>
                    <div class="scrollbar-overlay" style="max-height:19rem">
                      <div class="list-group list-group-flush fw-normal fs--1">
                        {{-- <div class="list-group-title border-bottom">NEW</div> --}}
                        {{-- <div class="list-group-item">
                          <a class="notification notification-flush notification-unread" href="#!">
                            <div class="notification-avatar">
                              <div class="avatar avatar-2xl me-3">
                                <img class="rounded-circle" src="assets/img/team/1-thumb.png" alt="" />

                              </div>
                            </div>
                            <div class="notification-body">
                              <p class="mb-1"><strong>Emma Watson</strong> replied to your comment : "Hello world 😍"</p>
                              <span class="notification-time"><span class="me-2" role="img" aria-label="Emoji">💬</span>Just now</span>

                            </div>
                          </a>

                        </div> --}}

                      </div>
                    </div>
                    <div class="card-footer text-center border-top"><a class="card-link d-block" href="app/social/notifications.html">Vous n'avez pas de notification</a></div>
                  </div>
                </div>

              </li>


              <li class="nav-item dropdown"><a class="nav-link pe-0" id="navbarDropdownUser" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <div class="avatar avatar-xl">
                    <img class="rounded-circle" src="{{asset(Auth::user()->avatar ?? 'assets/no-image.jpg')}}" alt="" />

                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end py-0" aria-labelledby="navbarDropdownUser">
                  <div class="bg-white dark__bg-1000 rounded-2 py-2">

                    <a class="dropdown-item fw-bold text-warning" href="#"><span class="fas fa-crown me-1"></span><span>Changer de plan</span></a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Besoin d'aide </a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="pages/user/settings.html">Mon compte</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                    Déconnexion
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                  </div>
                </div>
              </li>
            </ul>
