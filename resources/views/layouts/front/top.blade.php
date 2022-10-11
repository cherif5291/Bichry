<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Bilan Pro | Accueil</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/admin/img/favicons/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/admin/img/favicons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/admin/img/favicons/favicon-16x16.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/admin/img/favicons/favicon.ico')}}">
    <link rel="manifest" href="{{asset('assets/admin/img/favicons/manifest.json')}}">
    <meta name="msapplication-TileImage" content="../assets/img/favicons/mstile-150x150.png')}}">
    <meta name="theme-color" content="#ffffff">
    <script src="{{asset('assets/admin/js/config.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/overlayscrollbars/OverlayScrollbars.min.js')}}"></script>


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="{{asset('assets/admin/vendors/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap"
        rel="stylesheet">
    <link href="{{asset('assets/admin/vendors/overlayscrollbars/OverlayScrollbars.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin/css/theme-rtl.min.css')}}" rel="stylesheet" id="style-rtl">
    <link href="{{asset('assets/admin/css/theme.min.css')}}" rel="stylesheet" id="style-default">
    <link href="{{asset('assets/admin/css/user-rtl.min.css')}}" rel="stylesheet" id="user-style-rtl">
    <link href="{{asset('assets/admin/css/user.min.css')}}" rel="stylesheet" id="user-style-default">
    <script>
        var isRTL = JSON.parse(localStorage.getItem('isRTL'));
        if (isRTL) {
            var linkDefault = document.getElementById('style-default');
            var userLinkDefault = document.getElementById('user-style-default');
            linkDefault.setAttribute('disabled', true);
            userLinkDefault.setAttribute('disabled', true);
            document.querySelector('html').setAttribute('dir', 'rtl');
        } else {
            var linkRTL = document.getElementById('style-rtl');
            var userLinkRTL = document.getElementById('user-style-rtl');
            linkRTL.setAttribute('disabled', true);
            userLinkRTL.setAttribute('disabled', true);
        }

    </script>

    @yield('styles')
</head>


<body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
        <nav class="navbar navbar-standard navbar-expand-lg fixed-top navbar-dark"
            data-navbar-darken-on-scroll="data-navbar-darken-on-scroll">
            <div class="container"><a class="navbar-brand" href="../index.html"><span
                        class="text-white dark__text-white">Bilan Pro</span></a>
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarStandard" aria-controls="navbarStandard" aria-expanded="false"
                    aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse scrollbar" id="navbarStandard">
                    <ul class="navbar-nav" data-top-nav-dropdowns="data-top-nav-dropdowns">

                        {{-- <a class="text-600" href="#banner" data-bs-offset-top="0" data-scroll-to="#banner">
                </a> --}}

                        <li class="nav-item "><a class="nav-link " href="#banner" data-bs-offset-bottom="0"
                                data-scroll-to="#banner">Accueil</a>
                        <li class="nav-item "><a class="nav-link " href="#services" data-bs-offset-bottom="0"
                                data-scroll-to="#services">Services</a>
                        <li class="nav-item "><a class="nav-link " href="#pricings" data-bs-offset-bottom="0"
                                data-scroll-to="#pricings">Abonnement & Tarifs</a>
                        <li class="nav-item "><a class="nav-link " href="#testimonial" data-bs-offset-bottom="0"
                                data-scroll-to="#testimonial">Témoignages</a>

                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                id="dashboards">Mode</a>
                            <div class="dropdown-menu dropdown-menu-card border-0 mt-0" aria-labelledby="dashboards">
                                <div class="bg-white dark__bg-1000 rounded-3 py-2">
                                    <div class="col-6">
                                        <input class="btn-check" id="themeSwitcherLight" name="theme-color" type="radio"
                                            value="light" data-theme-control="theme" />
                                        <label class="btn d-inline-block btn-navbar-style fs--1"
                                            for="themeSwitcherLight">
                                            Clair</label>
                                    </div>
                                    <div class="col-6">
                                        <input class="btn-check" id="themeSwitcherDark" name="theme-color" type="radio"
                                            value="dark" data-theme-control="theme" />
                                        <label class="btn d-inline-block btn-navbar-style fs--1"
                                            for="themeSwitcherDark">Sombre</label>
                                    </div>
                                </div>
                            </div>
                        </li>
                        {{-- <li class="nav-item"><a class="nav-link" href="../index.html"><span class="d-none d-lg-inline-block" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Dashboard"><span class="fas fa-chart-pie"></span></span><span class="d-lg-none">Dashboard</span></a></li>
              <li class="nav-item"><a class="nav-link" href="../app/social/feed.html"><span class="d-none d-lg-inline-block" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Feed"><span class="fas fa-list-alt"></span></span><span class="d-lg-none">Feed</span></a></li> --}}
                        {{-- <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" id="navbarDropdownLogin" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Connexion</a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-card" aria-labelledby="navbarDropdownLogin">
                  <div class="card shadow-none navbar-card-login">
                    <div class="card-body fs--1 p-4 fw-normal">
                      <div class="row text-start justify-content-between align-items-center mb-2">
                        <div class="col-auto">
                          <h5 class="mb-0">Log in</h5>
                        </div>
                        <div class="col-auto">
                          <p class="fs--1 text-600 mb-0">or <a href="../pages/authentication/simple/register.html">Create an account</a></p>
                        </div>
                      </div>
                      <form>
                        <div class="mb-3">
                          <input class="form-control" type="email" placeholder="Email address" />
                        </div>
                        <div class="mb-3">
                          <input class="form-control" type="password" placeholder="Password" />
                        </div>
                        <div class="row flex-between-center">
                          <div class="col-auto">
                            <div class="form-check mb-0">
                              <input class="form-check-input" type="checkbox" id="modal-checkbox" />
                              <label class="form-check-label mb-0" for="modal-checkbox">Remember me</label>
                            </div>
                          </div>
                          <div class="col-auto"><a class="fs--1" href="../pages/authentication/simple/forgot-password.html">Forgot Password?</a></div>
                        </div>
                        <div class="mb-3">
                          <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">Log in</button>
                        </div>
                      </form>
                      <div class="position-relative mt-4">
                        <hr class="bg-300" />
                        <div class="divider-content-center">or log in with</div>
                      </div>
                      <div class="row g-2 mt-2">
                        <div class="col-sm-6"><a class="btn btn-outline-google-plus btn-sm d-block w-100" href="#"><span class="fab fa-google-plus-g me-2" data-fa-transform="grow-8"></span> google</a></div>
                        <div class="col-sm-6"><a class="btn btn-outline-facebook btn-sm d-block w-100" href="#"><span class="fab fa-facebook-square me-2" data-fa-transform="grow-8"></span> facebook</a></div>
                      </div>
                    </div>
                  </div>
                </div>
              </li> --}}

                        <li class="nav-item"><a class="nav-link" href="{{route('login')}}">Connexion</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body p-4">
                        <div class="row text-start justify-content-between align-items-center mb-2">
                            <div class="col-auto">
                                <h5 id="modalLabel">Register</h5>
                            </div>
                            <div class="col-auto">
                                <p class="fs--1 text-600 mb-0">Have an account? <a
                                        href="../pages/authentication/simple/login.html">Login</a></p>
                            </div>
                        </div>
                        <form>
                            <div class="mb-3">
                                <input class="form-control" type="text" autocomplete="on" placeholder="Name" />
                            </div>
                            <div class="mb-3">
                                <input class="form-control" type="email" autocomplete="on"
                                    placeholder="Email address" />
                            </div>
                            <div class="row gx-2">
                                <div class="mb-3 col-sm-6">
                                    <input class="form-control" type="password" autocomplete="on"
                                        placeholder="Password" />
                                </div>
                                <div class="mb-3 col-sm-6">
                                    <input class="form-control" type="password" autocomplete="on"
                                        placeholder="Confirm Password" />
                                </div>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="modal-register-checkbox" />
                                <label class="form-label" for="modal-register-checkbox">I accept the <a href="#!">terms
                                    </a>and <a href="#!">privacy policy</a></label>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary d-block w-100 mt-3" type="submit"
                                    name="submit">Register</button>
                            </div>
                        </form>
                        <div class="position-relative mt-4">
                            <hr class="bg-300" />
                            <div class="divider-content-center">or register with</div>
                        </div>
                        <div class="row g-2 mt-2">
                            <div class="col-sm-6"><a class="btn btn-outline-google-plus btn-sm d-block w-100"
                                    href="#"><span class="fab fa-google-plus-g me-2" data-fa-transform="grow-8"></span>
                                    google</a></div>
                            <div class="col-sm-6"><a class="btn btn-outline-facebook btn-sm d-block w-100"
                                    href="#"><span class="fab fa-facebook-square me-2"
                                        data-fa-transform="grow-8"></span> facebook</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
