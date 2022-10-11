@extends('layouts.front.front')


@section('content')
 <!-- <section> begin ============================-->
    <section class="py-0 overflow-hidden light" id="banner">

        <div class="bg-holder overlay"
            style="background-image:url({{asset('assets/admin/img/generic/bg-2.jpg')}});background-position: center bottom;">
        </div>
        <!--/.bg-holder-->

        <div class="container">
            <div class="row flex-center pt-8 pt-lg-10 pb-lg-9 pb-xl-0">
                <div class="col-md-11 col-lg-8 col-xl-4 pb-7 pb-xl-9 text-center text-xl-start"><a
                        class="btn btn-outline-danger mb-4 fs--1 border-2 rounded-pill" href="#pricings"><span class="me-2"
                            role="img" aria-label="Gift">🎁</span>Voir nos Offres {{getInfosSystem()->id}}</a>
                    <h1 class="text-white fw-light">{{getWebsite()->debut}} <span class="typed-text fw-bold"
                            data-typed-text='["le meilleur","la simplicité","Bilan Pro"]'></span><br />{{getWebsite()->complement}}.</h1>
                    <p class="lead text-white opacity-75">{{getWebsite()->description}}.</p><a
                        class="btn btn-outline-light border-2 rounded-pill btn-lg mt-4 fs-0 py-2"
                        href="{{getWebsite()->link1}}">{{getWebsite()->btn1}}<span class="fas fa-play ms-2"
                            data-fa-transform="shrink-6 down-1"></span></a>
                </div>
                <div class="col-xl-7 offset-xl-1 align-self-end mt-4 mt-xl-0"><a class="img-landing-banner rounded"
                        href="{{route('front.register')}}"><img class="img-fluid"
                            src="{{asset('assets/admin/img/generic/dashboard-alt.jpg')}}" alt="" /></a></div>
            </div>
        </div>
        <!-- end of .container-->

    </section>
    <!-- <section> close ============================-->
    <!-- ============================================-->




    <!-- ============================================-->
    <!-- <section> begin ============================-->
    <section class="py-3 bg-light shadow-sm">

        <div class="container">
            <div class="row flex-center">
                <div class="col-3 col-sm-auto my-1 my-sm-3 px-card"><img class="landing-cta-img" height="40"
                        src="https://bilan-pro.com/public/logowhite.png" alt="" /></div>
                <div class="col-3 col-sm-auto my-1 my-sm-3 px-card"><img class="landing-cta-img" height="45"
                        src="https://bilan-pro.com/public/logowhite.png" alt="" /></div>
                <div class="col-3 col-sm-auto my-1 my-sm-3 px-card"><img class="landing-cta-img" height="30"
                        src="https://bilan-pro.com/public/logowhite.png" alt="" /></div>
                <div class="col-3 col-sm-auto my-1 my-sm-3 px-card"><img class="landing-cta-img" height="30"
                        src="https://bilan-pro.com/public/logowhite.png" alt="" /></div>
                <div class="col-3 col-sm-auto my-1 my-sm-3 px-card"><img class="landing-cta-img" height="35"
                        src="https://bilan-pro.com/public/logowhite.png" alt="" /></div>
                <div class="col-3 col-sm-auto my-1 my-sm-3 px-card"><img class="landing-cta-img" height="40"
                        src="https://bilan-pro.com/public/logowhite.png" alt="" /></div>
                <div class="col-3 col-sm-auto my-1 my-sm-3 px-card"><img class="landing-cta-img" height="40"
                        src="https://bilan-pro.com/public/logowhite.png" alt="" /></div>
            </div>
        </div>
        <!-- end of .container-->

    </section>
    <!-- <section> close ============================-->
    <!-- ============================================-->


    @yield('content')
    <!-- ============================================-->
    <!-- <section> begin ============================-->

    <div class="container text-center mb-3 mt-4" id="services">
        <div class="row">
            <div class="col">
                <h1 class="fs-2 fs-sm-4 fs-md-5">{{getWebsite()->serviceIntro}}</h1>
                <p class="lead">{{getWebsite()->serviceText}}</p>
            </div>
        </div>
        <div class="row mt-6">
            <div class="col-lg-3">
                <div class="card card-span h-100">
                    <div class="card-span-img"><span class="fab fa-sass fs-4 text-info"></span></div>
                    <div class="card-body pt-6 pb-4">
                        <h5 class="mb-2">Gestion Clients</h5>
                        <p>Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre
                            provisoire pour calibrer une mise en page, le texte définitif venant remplacer le
                            faux-texte dès qu'il est prêt ou que la mise en page est achevée.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mt-6 mt-lg-0">
                <div class="card card-span h-100">
                    <div class="card-span-img"><span class="fab fa-node-js fs-5 text-success"></span></div>
                    <div class="card-body pt-6 pb-4">
                        <h5 class="mb-2">Inventaires & Stock</h5>
                        <p>Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre
                            provisoire pour calibrer une mise en page, le texte définitif venant remplacer le
                            faux-texte dès qu'il est prêt ou que la mise en page est achevée.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mt-6 mt-lg-0">
                <div class="card card-span h-100">
                    <div class="card-span-img"><span class="fab fa-gulp fs-6 text-danger"></span></div>
                    <div class="card-body pt-6 pb-4">
                        <h5 class="mb-2">Gestion des Dépenses</h5>
                        <p>Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre
                            provisoire pour calibrer une mise en page, le texte définitif venant remplacer le
                            faux-texte dès qu'il est prêt ou que la mise en page est achevée.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 mt-6 mt-lg-0">
                <div class="card card-span h-100">
                    <div class="card-span-img"><span class="fab fa-gulp fs-6 text-danger"></span></div>
                    <div class="card-body pt-6 pb-4">
                        <h5 class="mb-2">Facturations</h5>
                        <p>Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre
                            provisoire pour calibrer une mise en page, le texte définitif venant remplacer le
                            faux-texte dès qu'il est prêt ou que la mise en page est achevée.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- end of .container-->


    <!-- <section> close ============================-->
    <!-- ============================================-->

    <div class="col-md-12 row">
        <div class="col-md-6" style="padding: 0px !important">
            <div class="overlay"
                style="background-image:url('{{asset(getWebsite()->image2 ?? 'assets/admin/img/login_lg.jpeg')}}');background-position: center top; height: 40vh">
                <div class=" mt-3 mb-4" style="padding-top: 2em !important; padding-bottom: 2em !important">
                    <div class="row justify-content-start ">

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6" style="padding: 0px !important">
            <div class="overlay">
                <div class=" mt-3 mb-4" style="padding-top: 2em !important; padding-bottom: 2em !important">
                    <div class="row justify-content-start ">
                        <div class="col-lg-8" style="margin-left: 3em !important">
                            <p class="fs-3 fs-sm-4 text-dark">{{getWebsite()->content2}}.</p>
                            <a href="{{getWebsite()->link2}}" class="btn btn-outline-dark border-2 rounded-pill btn-lg mt-4 fs-0 py-2"
                                type="button">{{getWebsite()->btn2}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="col-md-12 row">

        <div class="col-md-6" style="padding: 0px !important">
            <div class="overlay">
                <div class=" mt-3 mb-4" style="padding-top: 2em !important; padding-bottom: 2em !important">
                    <div class="row justify-content-start ">
                        <div class="col-lg-8" style="margin-left: 3em !important">
                            <p class="fs-3 fs-sm-4 text-dark">{{getWebsite()->content3}}.</p>
                            <a href="{{getWebsite()->link3}}" class="btn btn-outline-dark border-2 rounded-pill btn-lg mt-4 fs-0 py-2"
                                type="button">{{getWebsite()->btn3}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6" style="padding: 0px !important">
            <div class="overlay"
                style="background-image:url('{{asset(getWebsite()->image3 ?? 'assets/admin/img/login_lg.jpeg')}}');background-position: center top; height: 40vh">
                <div class=" mt-3 mb-4" style="padding-top: 2em !important; padding-bottom: 2em !important">
                    <div class="row justify-content-start ">

                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- ============================================-->
    <!-- <section> begin ============================-->

    <div class="row justify-content-center">
        <div class="col-12 text-center mb-4">
            <div class="fs-1">{{getWebsite()->packIntro}}</div>
            <h3 class="fs-2 fs-md-3">{{getWebsite()->packText}}</h3>
            <div class="d-flex justify-content-center">
                <label class="form-check-label me-2" for="customSwitch1">Paiement par Mois</label>
                <div class="form-check form-switch">
                    <input class="form-check-input" id="customSwitch1" type="checkbox" disabled>
                    <label class="form-check-label align-top" for="customSwitch1">Paiement parAnnée</label>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-9 col-xl-10 col-xxl-8">
            <div class="row">
                <div class="col-md-4">
                    <div class="border rounded-3 overflow-hidden mb-3 mb-md-0">
                        <div class="d-flex flex-between-center p-4">
                            <div>
                                <h3 class="fw-light fs-5 mb-0 text-primary">
                                    {{$Packages->where('prix' , '=', 0)->first()->nom}}</h3>
                                <h2 class="fw-light mt-0 text-primary"><sup class="fs-1">$</sup><span
                                        class="fs-3">{{$Packages->where('prix' , '=', 0)->first()->prix}}</span><span
                                        class="fs--2 mt-1">/ mois</span></h2>
                            </div>
                            <div class="pe-3"><img src="{{asset('assets/admin/img/icons/free.svg')}}" width="70"
                                    alt=""></div>
                        </div>
                        <div class="p-4 bg-light">
                            <ul class="list-unstyled">

                                <li class="border-bottom py-2"> <svg
                                        class="svg-inline--fa fa-check fa-w-16 text-primary"
                                        data-fa-transform="shrink-2" aria-hidden="true" focusable="false"
                                        data-prefix="fas" data-icon="check" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""
                                        style="transform-origin: 0.5em 0.5em;">
                                        <g transform="translate(256 256)">
                                            <g transform="translate(0, 0)  scale(0.875, 0.875)  rotate(0 0 0)">
                                                <path fill="currentColor"
                                                    d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"
                                                    transform="translate(-256 -256)"></path>
                                            </g>
                                        </g>
                                    </svg>
                                    <!-- <span class="fas fa-check text-primary" data-fa-transform="shrink-2"> </span> Font Awesome fontawesome.com -->
                                    Unlimited Broadcasts</li>
                                <li class="border-bottom py-2"> <svg
                                        class="svg-inline--fa fa-check fa-w-16 text-primary"
                                        data-fa-transform="shrink-2" aria-hidden="true" focusable="false"
                                        data-prefix="fas" data-icon="check" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""
                                        style="transform-origin: 0.5em 0.5em;">
                                        <g transform="translate(256 256)">
                                            <g transform="translate(0, 0)  scale(0.875, 0.875)  rotate(0 0 0)">
                                                <path fill="currentColor"
                                                    d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"
                                                    transform="translate(-256 -256)"></path>
                                            </g>
                                        </g>
                                    </svg>
                                    <!-- <span class="fas fa-check text-primary" data-fa-transform="shrink-2"></span> Font Awesome fontawesome.com -->
                                    Unlimited Sequences</li>
                                <li class="py-2 border-bottom"><svg
                                        class="svg-inline--fa fa-check fa-w-16 text-primary"
                                        data-fa-transform="shrink-2" aria-hidden="true" focusable="false"
                                        data-prefix="fas" data-icon="check" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""
                                        style="transform-origin: 0.5em 0.5em;">
                                        <g transform="translate(256 256)">
                                            <g transform="translate(0, 0)  scale(0.875, 0.875)  rotate(0 0 0)">
                                                <path fill="currentColor"
                                                    d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"
                                                    transform="translate(-256 -256)"></path>
                                            </g>
                                        </g>
                                    </svg>
                                    <!-- <span class="fas fa-check text-primary" data-fa-transform="shrink-2"></span> Font Awesome fontawesome.com -->
                                    Advanced marketing </li>
                                <li class="py-2 border-bottom"><svg
                                        class="svg-inline--fa fa-check fa-w-16 text-primary"
                                        data-fa-transform="shrink-2" aria-hidden="true" focusable="false"
                                        data-prefix="fas" data-icon="check" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""
                                        style="transform-origin: 0.5em 0.5em;">
                                        <g transform="translate(256 256)">
                                            <g transform="translate(0, 0)  scale(0.875, 0.875)  rotate(0 0 0)">
                                                <path fill="currentColor"
                                                    d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"
                                                    transform="translate(-256 -256)"></path>
                                            </g>
                                        </g>
                                    </svg>
                                    <!-- <span class="fas fa-check text-primary" data-fa-transform="shrink-2"></span> Font Awesome fontawesome.com -->
                                    Api &amp; Developer Tools</li>
                                <li class="py-2 border-bottom text-300"><svg class="svg-inline--fa fa-check fa-w-16"
                                        data-fa-transform="shrink-2" aria-hidden="true" focusable="false"
                                        data-prefix="fas" data-icon="check" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""
                                        style="transform-origin: 0.5em 0.5em;">
                                        <g transform="translate(256 256)">
                                            <g transform="translate(0, 0)  scale(0.875, 0.875)  rotate(0 0 0)">
                                                <path fill="currentColor"
                                                    d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"
                                                    transform="translate(-256 -256)"></path>
                                            </g>
                                        </g>
                                    </svg>
                                    <!-- <span class="fas fa-check" data-fa-transform="shrink-2"></span> Font Awesome fontawesome.com -->
                                    Integrations</li>
                                <li class="py-2 border-bottom text-300"><svg class="svg-inline--fa fa-check fa-w-16"
                                        data-fa-transform="shrink-2" aria-hidden="true" focusable="false"
                                        data-prefix="fas" data-icon="check" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""
                                        style="transform-origin: 0.5em 0.5em;">
                                        <g transform="translate(256 256)">
                                            <g transform="translate(0, 0)  scale(0.875, 0.875)  rotate(0 0 0)">
                                                <path fill="currentColor"
                                                    d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"
                                                    transform="translate(-256 -256)"></path>
                                            </g>
                                        </g>
                                    </svg>
                                    <!-- <span class="fas fa-check" data-fa-transform="shrink-2"></span> Font Awesome fontawesome.com -->
                                    Payments </li>
                                <li class="py-2 border-bottom text-300"><svg class="svg-inline--fa fa-check fa-w-16"
                                        data-fa-transform="shrink-2" aria-hidden="true" focusable="false"
                                        data-prefix="fas" data-icon="check" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""
                                        style="transform-origin: 0.5em 0.5em;">
                                        <g transform="translate(256 256)">
                                            <g transform="translate(0, 0)  scale(0.875, 0.875)  rotate(0 0 0)">
                                                <path fill="currentColor"
                                                    d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"
                                                    transform="translate(-256 -256)"></path>
                                            </g>
                                        </g>
                                    </svg>
                                    <!-- <span class="fas fa-check" data-fa-transform="shrink-2"></span> Font Awesome fontawesome.com -->
                                    Payments</li>
                                <li class="py-2 text-300"><svg class="svg-inline--fa fa-check fa-w-16"
                                        data-fa-transform="shrink-2" aria-hidden="true" focusable="false"
                                        data-prefix="fas" data-icon="check" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""
                                        style="transform-origin: 0.5em 0.5em;">
                                        <g transform="translate(256 256)">
                                            <g transform="translate(0, 0)  scale(0.875, 0.875)  rotate(0 0 0)">
                                                <path fill="currentColor"
                                                    d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"
                                                    transform="translate(-256 -256)"></path>
                                            </g>
                                        </g>
                                    </svg>
                                    <!-- <span class="fas fa-check" data-fa-transform="shrink-2"></span> Font Awesome fontawesome.com -->
                                    Unlimted Tags</li>
                            </ul>
                            <a href="{{route('front.register')}}" class="btn btn-outline-primary d-block w-100" type="button">Commencer à
                                tester</a>
                        </div>
                    </div>
                </div>
                @foreach ($Packages->where('prix', '!=', 0) as $PaidPack)
                <div class="col-md-4">
                    <div class="border rounded-3 overflow-hidden">
                        <div class="d-flex flex-between-center p-4">
                            <div>
                                <h3 class="fw-light text-primary fs-5 mb-0">{{$PaidPack->nom}}</h3>
                                <h2 class="fw-light text-primary mt-0"><sup class="fs-1">$</sup><span
                                        class="fs-3">{{$PaidPack->prix}}</span><span class="fs--2 mt-1">/
                                        mois</span></h2>
                            </div>
                            <div class="pe-3"><img src="../../assets/img/icons/pro.svg" width="70" alt=""></div>
                        </div>
                        <div class="p-4 bg-light">
                            <ul class="list-unstyled">
                                @foreach ($PaidPack->modulePacks as $features)
                                <li class="border-bottom py-2"> <svg
                                        class="svg-inline--fa fa-check fa-w-16 text-primary"
                                        data-fa-transform="shrink-2" aria-hidden="true" focusable="false"
                                        data-prefix="fas" data-icon="check" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""
                                        style="transform-origin: 0.5em 0.5em;">
                                        <g transform="translate(256 256)">
                                            <g transform="translate(0, 0)  scale(0.875, 0.875)  rotate(0 0 0)">
                                                <path fill="currentColor"
                                                    d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"
                                                    transform="translate(-256 -256)"></path>
                                            </g>
                                        </g>
                                    </svg>
                                    <!-- <span class="fas fa-check text-primary" data-fa-transform="shrink-2"> </span> Font Awesome fontawesome.com -->
                                    {{$features->module->nom}}</li>
                                @endforeach
                            </ul>
                            <a href="{{route('front.register')}}" class="btn btn-primary d-block w-100" type="button">Profiter de l'offre</a>
                        </div>
                    </div>
                </div>
                @endforeach


            </div>
        </div>
        {{-- <div class="col-12 text-center">
            <h5 class="mt-5">Looking for personal or small team task management?</h5>
            <p class="fs-1">Try the <a href="#">basic version</a> of Falcon</p>
        </div> --}}
    </div>
    <!-- <section> close ============================-->
    <!-- ============================================-->
    <!-- ============================================-->
    <!-- <section> begin ============================-->
    <section class="bg-200 text-center">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9 col-xl-8">
                    <div class="swiper-container theme-slider"
                        data-swiper='{"autoplay":true,"spaceBetween":5,"loop":true,"loopedSlides":5,"slideToClickedSlide":true}'>
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="px-5 px-sm-6">
                                    <p class="fs-sm-1 fs-md-2 fst-italic text-dark">Le lorem ipsum est, en
                                        imprimerie, une suite de mots sans signification utilisée à titre provisoire
                                        pour calibrer une mise en page, le texte définitif venant remplacer le
                                        faux-texte dès qu'il est prêt ou que la mise en page est achevée.</p>
                                    <p class="fs-0 text-600">- Pape Ndiouga, Web Developer</p><img
                                        class="w-auto mx-auto"
                                        src="https://illugraph-ic.com/wp-content/uploads/2020/11/logo2.png" alt=""
                                        height="45" />
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="px-5 px-sm-6">
                                    <p class="fs-sm-1 fs-md-2 fst-italic text-dark">Le lorem ipsum est, en
                                        imprimerie, une suite de mots sans signification utilisée à titre provisoire
                                        pour calibrer une mise en page, le texte définitif venant remplacer le
                                        faux-texte dès qu'il est prêt ou que la mise en page est achevée.</p>
                                    <p class="fs-0 text-600">- Baba Ly, Developer</p><img class="w-auto mx-auto"
                                        src="https://illugraph-ic.com/wp-content/uploads/2020/11/logo2.png" alt=""
                                        height="30" />
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="px-5 px-sm-6">
                                    <p class="fs-sm-1 fs-md-2 fst-italic text-dark">Le lorem ipsum est, en
                                        imprimerie, une suite de mots sans signification utilisée à titre provisoire
                                        pour calibrer une mise en page, le texte définitif venant remplacer le
                                        faux-texte dès qu'il est prêt ou que la mise en page est achevée.</p>
                                    <p class="fs-0 text-600">- Mouhamed Fall, Designer</p><img
                                        class="w-auto mx-auto" src="{{asset('assets/admin/img/logos/paypal.png')}}"
                                        alt="" height="45" />
                                </div>
                            </div>
                        </div>
                        <div class="swiper-nav">
                            <div class="swiper-button-next swiper-button-white"></div>
                            <div class="swiper-button-prev swiper-button-white"> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of .container-->

    </section>
    <!-- <section> close ============================-->
    <!-- ============================================-->




    <!-- ============================================-->
    <!-- <section> begin ============================-->
    <section class="light">

        <div class="bg-holder overlay"
            style="background-image:url('{{asset(getWebsite()->image4 ?? 'assets/admin/img/login_lg.jpeg')}}');background-position: center top;">
        </div>
        <!--/.bg-holder-->

        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <p class="fs-3 fs-sm-4 text-white">{{getWebsite()->content4}}.</p>
                    <a href="{{getWebsite()->link4}}" class="btn btn-outline-light border-2 rounded-pill btn-lg mt-4 fs-0 py-2"
                        type="button">{{getWebsite()->btn4}}</a>
                </div>
            </div>
        </div>
        <!-- end of .container-->

    </section>
    <!-- <section> close ============================-->
    <!-- ============================================-->




    <!-- ============================================-->
    <!-- <section> begin ============================-->
    <section class="bg-dark pt-8 pb-4 light">

        <div class="container">
            <div class="position-absolute btn-back-to-top bg-dark"><a class="text-600" href="#banner"
                    data-bs-offset-top="0" data-scroll-to="#banner"><span class="fas fa-chevron-up"
                        data-fa-transform="rotate-45"></span></a></div>
            <div class="row">
                <div class="col-lg-4">
                    <h5 class="text-uppercase text-white opacity-85 mb-3">Our Mission</h5>
                    <p class="text-600">Le lorem ipsum est, en imprimerie, une suite de mots sans signification
                        utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant
                        remplacer le faux-texte dès qu'il est prêt ou que la mise en page est achevée. Généralement,
                        on utilise un texte en faux latin, le Lorem ipsum ou Lipsum.</p>
                    <div class="icon-group mt-4"><a class="icon-item bg-white text-facebook" href="#!"><span
                                class="fab fa-facebook-f"></span></a><a class="icon-item bg-white text-twitter"
                            href="#!"><span class="fab fa-twitter"></span></a><a
                            class="icon-item bg-white text-google-plus" href="#!"><span
                                class="fab fa-google-plus-g"></span></a><a class="icon-item bg-white text-linkedin"
                            href="#!"><span class="fab fa-linkedin-in"></span></a><a class="icon-item bg-white"
                            href="#!"><span class="fab fa-medium-m"></span></a></div>
                </div>
                <div class="col ps-lg-6 ps-xl-8">
                    <div class="row mt-5 mt-lg-0">
                        <div class="col-6 col-md-3">
                            <h5 class="text-uppercase text-white opacity-85 mb-3">Company</h5>
                            <ul class="list-unstyled">
                                <li class="mb-1"><a class="link-600" href="#!">About</a></li>
                                <li class="mb-1"><a class="link-600" href="#!">Contact</a></li>
                                <li class="mb-1"><a class="link-600" href="#!">Careers</a></li>
                                <li class="mb-1"><a class="link-600" href="#!">Blog</a></li>
                                <li class="mb-1"><a class="link-600" href="#!">Terms</a></li>
                                <li class="mb-1"><a class="link-600" href="#!">Privacy</a></li>
                                <li><a class="link-600" href="#!">Imprint</a></li>
                            </ul>
                        </div>
                        <div class="col-6 col-md-3">
                            <h5 class="text-uppercase text-white opacity-85 mb-3">Product</h5>
                            <ul class="list-unstyled">
                                <li class="mb-1"><a class="link-600" href="#!">Features</a></li>
                                <li class="mb-1"><a class="link-600" href="#!">Roadmap</a></li>
                                <li class="mb-1"><a class="link-600" href="#!">Changelog</a></li>
                                <li class="mb-1"><a class="link-600" href="#!">Pricing</a></li>
                                <li class="mb-1"><a class="link-600" href="#!">Docs</a></li>
                                <li class="mb-1"><a class="link-600" href="#!">System Status</a></li>
                                <li class="mb-1"><a class="link-600" href="#!">Agencies</a></li>
                                <li class="mb-1"><a class="link-600" href="#!">Enterprise</a></li>
                            </ul>
                        </div>
                        <div class="col mt-5 mt-md-0">
                            <h5 class="text-uppercase text-white opacity-85 mb-3">From the Blog</h5>
                            <ul class="list-unstyled">
                                <li>
                                    <h5 class="fs-0 mb-0"><a class="link-600" href="#!"> Interactive graphs and
                                            charts</a></h5>
                                    <p class="text-600 opacity-50">Jan 15 &bull; 8min read </p>
                                </li>
                                <li>
                                    <h5 class="fs-0 mb-0"><a class="link-600" href="#!"> Lifetime free updates</a>
                                    </h5>
                                    <p class="text-600 opacity-50">Jan 5 &bull; 3min read &starf;</p>
                                </li>
                                <li>
                                    <h5 class="fs-0 mb-0"><a class="link-600" href="#!"> Merry Christmas From us</a>
                                    </h5>
                                    <p class="text-600 opacity-50">Dec 25 &bull; 2min read</p>
                                </li>
                                <li>
                                    <h5 class="fs-0 mb-0"><a class="link-600" href="#!"> The New Falcon Theme</a>
                                    </h5>
                                    <p class="text-600 opacity-50">Dec 23 &bull; 10min read </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of .container-->

    </section>
    <!-- <section> close ============================-->
    <!-- ============================================-->




    <!-- ============================================-->
    <!-- <section> begin ============================-->
    <section class="py-0 bg-dark light">

        <div>
            <hr class="my-0 text-600 opacity-25" />
            <div class="container py-3">
                <div class="row justify-content-between fs--1">
                    <div class="col-12 col-sm-auto text-center">
                        <p class="mb-0 text-600 opacity-85">Bilan Pro<span class="d-none d-sm-inline-block">|
                            </span><br class="d-sm-none" /> 2021 - 2022 &copy; </p>
                    </div>
                    <div class="col-12 col-sm-auto text-center">
                        <p class="mb-0 text-600 opacity-85">v1.0.0</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of .container-->

    </section>
    <!-- <section> close ============================-->
    <!-- ============================================-->


@endsection
