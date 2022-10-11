@extends('layouts.front.front')


@section('content')

<section class="py-0 overflow-hidden light" id="banner" style="height: 40vh !important">

    <div class="bg-holder overlay"
        style="background-image:url({{asset('assets/admin/img/generic/bg-2.jpg')}});background-position: center bottom; ">
    </div>
    <!--/.bg-holder-->

    <div class="container">
        <div class="row flex-center " style="padding-top: 6em !important; padding-bottom: 3em !importan">
            <div class="col-md-11 col-lg-8 col-xl-4 pb-7 pb-xl-9 text-center text-xl-start">
                <h1 class="text-white fw-light">Optez <span class="typed-text fw-bold"
                        data-typed-text='["le meilleur","du professionnalisme","la simplicité","Bilan Pro"]'></span><br />pour
                    votre entreprise.</h1>

            </div>
            <div class="col-xl-7 offset-xl-1 align-self-end mt-4 mt-xl-0"><a class=" rounded"
                    href="{{route('front.register')}}"><img class="img-fluid"
                        src="{{asset('assets/admin/img/generic/dashboard-alt.jpg')}}" style="height: 0vh !important"
                        alt="" /></a></div>
        </div>
    </div>
    <!-- end of .container-->

</section>

<section>
    <div class="container d-flex justify-content-center">


        <div class="col-md-8 h-100">
            @include('front.messages')
            <div class="d-flex mb-4"><span class="fa-stack me-2 ms-n1"><svg
                        class="svg-inline--fa fa-circle fa-w-16 fa-stack-2x text-300" aria-hidden="true"
                        focusable="false" data-prefix="fas" data-icon="circle" role="img"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                        <path fill="currentColor"
                            d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path>
                    </svg><!-- <i class="fas fa-circle fa-stack-2x text-300"></i> Font Awesome fontawesome.com --><svg
                        class="svg-inline--fa fa-check-double fa-w-16 fa-inverse fa-stack-1x text-primary"
                        aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check-double" role="img"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                        <path fill="currentColor"
                            d="M505 174.8l-39.6-39.6c-9.4-9.4-24.6-9.4-33.9 0L192 374.7 80.6 263.2c-9.4-9.4-24.6-9.4-33.9 0L7 302.9c-9.4 9.4-9.4 24.6 0 34L175 505c9.4 9.4 24.6 9.4 33.9 0l296-296.2c9.4-9.5 9.4-24.7.1-34zm-324.3 106c6.2 6.3 16.4 6.3 22.6 0l208-208.2c6.2-6.3 6.2-16.4 0-22.6L366.1 4.7c-6.2-6.3-16.4-6.3-22.6 0L192 156.2l-55.4-55.5c-6.2-6.3-16.4-6.3-22.6 0L68.7 146c-6.2 6.3-6.2 16.4 0 22.6l112 112.2z">
                        </path>
                    </svg>
                    <!-- <i class="fa-inverse fa-stack-1x text-primary fas fa-check-double"></i> Font Awesome fontawesome.com --></span>
                <div class="col">
                    <h5 class="mb-0 text-primary position-relative"><span class="bg-200 dark__bg-1100 pe-3">Ouverture de compte
                            </span><span
                            class="border position-absolute top-50 translate-middle-y w-100 start-0 z-index--1"></span>
                    </h5>
                    <p class="mb-0">Formulaire d'inscription à un pack</p>
                </div>
            </div>
            <div class="card theme-wizard h-100 mb-5">
                <div class="card-header bg-light pt-3 pb-2">
                    <ul class="nav justify-content-between nav-wizard">
                        <li class="nav-item"><a class="nav-link active fw-semi-bold"
                                href="#bootstrap-wizard-validation-tab1" data-bs-toggle="tab"
                                data-wizard-step="data-wizard-step"><span class="nav-item-circle-parent"><span
                                        class="nav-item-circle"><i class="fas fa-building"></i>
                                        <!-- <span class="fas fa-lock"></span> Font Awesome fontawesome.com --></span></span><span
                                    class="d-none d-md-block mt-1 fs--1">Informations entreprises</span></a></li>
                        <li class="nav-item"><a class="nav-link fw-semi-bold" href="#bootstrap-wizard-validation-tab2"
                                data-bs-toggle="tab" data-wizard-step="data-wizard-step"><span
                                    class="nav-item-circle-parent"><span class="nav-item-circle"><i class="fas fa-id-card-alt"></i>
                                        <!-- <span class="fas fa-user"></span> Font Awesome fontawesome.com --></span></span><span
                                    class="d-none d-md-block mt-1 fs--1">Informations personnelles</span></a></li>
                        <li class="nav-item"><a class="nav-link fw-semi-bold" href="#bootstrap-wizard-validation-tab3"
                                data-bs-toggle="tab" data-wizard-step="data-wizard-step"><span
                                    class="nav-item-circle-parent"><span class="nav-item-circle"><i class="fas fa-box-open"></i>
                                        <!-- <span class="fas fa-dollar-sign"></span> Font Awesome fontawesome.com --></span></span><span
                                    class="d-none d-md-block mt-1 fs--1">Choix de pack</span></a></li>
                        <li class="nav-item"><a class="nav-link fw-semi-bold" href="#bootstrap-wizard-validation-tab4"
                                data-bs-toggle="tab" data-wizard-step="data-wizard-step"><span
                                    class="nav-item-circle-parent"><span class="nav-item-circle"><i class="fas fa-check-circle"></i>
                                        <!-- <span class="fas fa-thumbs-up"></span> Font Awesome fontawesome.com --></span></span><span
                                    class="d-none d-md-block mt-1 fs--1">Validation</span></a></li>
                    </ul>
                </div>
                <div class="card-body py-4" id="wizard-controller">
                    <form class="needs-validation was-validated" action="{{route('front.payment')}}"
                        method="post" novalidate="novalidate"> @csrf



                        <div class="tab-content">
                            <div class="tab-pane active px-sm-3 px-md-5" role="tabpanel"
                                aria-labelledby="bootstrap-wizard-validation-tab1"
                                id="bootstrap-wizard-validation-tab1">
                                <div class="mb-3">
                                    <label class="form-label" for="nom_entreprise">Nom de votre entreprise</label>
                                    <input class="form-control" type="text" name="nom_entreprise" value="{{ old('nom_entreprise') }}"
                                        placeholder="exemple: Tractosen" id="nom_entreprise">
                                    @error('nom_entreprise')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="email_entreprise">Email Professionnel
                                        entreprise*</label>
                                    <input class="form-control" type="email" name="email_entreprise" value="{{ old('email_entreprise') }}"
                                        placeholder="Email address"
                                        pattern="^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$"
                                        required="required" id="email_entreprise" data-wizard-validate-email="true">
                                    @error('email_entreprise')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="telephone_entreprise">Téléphone Entreprise</label>
                                    <input class="form-control" type="text" name="telephone_entreprise" value="{{ old('telephone_entreprise') }}"
                                        placeholder="exemple: Tractosen" id="telephone_entreprise">
                                    @error('telephone_entreprise')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="row g-2" hidden>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label"
                                                for="bootstrap-wizard-validation-wizard-password">Password*</label>
                                            <input class="form-control" type="password" name="passdddword" value="dd"
                                                placeholder="Password" required="required"
                                                id="bootstrap-wizard-validation-wizard-password"
                                                data-wizard-validate-password="true">
                                            <div class="invalid-feedback">Please enter password</div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label"
                                                for="bootstrap-wizard-validation-wizard-confirm-password">Confirm
                                                Password*</label>
                                            <input class="form-control" type="password" name="confidddrmPassword"
                                                value="ddd" placeholder="Confirm Password" required="required"
                                                id="bootstrap-wizard-validation-wizard-confirm-password"
                                                data-wizard-validate-confirm-password="true">
                                            <div class="invalid-feedback">Passwords need to match</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="terms" required="required"
                                        checked="checked" id="bootstrap-wizard-validation-wizard-checkbox">
                                    <label class="form-check-label"
                                        for="bootstrap-wizard-validation-wizard-checkbox">J'accepte les <a
                                            href="#!">termes </a>& <a href="#!">Conditions</a></label>
                                </div>

                            </div>
                            <div class="tab-pane px-sm-3 px-md-5" role="tabpanel"
                                aria-labelledby="bootstrap-wizard-validation-tab2"
                                id="bootstrap-wizard-validation-tab2">

                                <div class="mb-3">
                                    <label class="form-label" for="bootstrap-wizard-validation-wizard-phone">Votre
                                        prénom</label>
                                    <input class="form-control" type="text" name="prenom" placeholder="prenom" value="{{ old('prenom') }}"
                                        id="bootstrap-wizard-validation-wizard-phone">
                                    @error('prenom')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="bootstrap-wizard-validation-wizard-phone">Nom</label>
                                    <input class="form-control" type="text" name="nom" placeholder="Nom" value="{{ old('nom') }}"
                                        id="bootstrap-wizard-validation-wizard-phone">
                                    @error('nom')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label"
                                        for="bootstrap-wizard-validation-wizard-phone">Email</label>
                                    <input class="form-control" type="text" name="email" placeholder="Email" value="{{ old('email') }}"
                                        id="bootstrap-wizard-validation-wizard-phone">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label"
                                        for="bootstrap-wizard-validation-wizard-phone">Téléphone</label>
                                    <input class="form-control" type="text" name="telephone" placeholder="téléphone" value="{{ old('telephone') }}"
                                        id="bootstrap-wizard-validation-wizard-phone">
                                    @error('telephone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="row g-2">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label"
                                                for="bootstrap-wizard-validation-wizard-password">Mot de passe*</label>
                                            <input class="form-control" type="password" name="password" value="{{ old('password') }}"
                                                placeholder="mot de passe" required="required"
                                                id="bootstrap-wizard-validation-wizard-password"
                                                data-wizard-validate-password="true">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label"
                                                for="bootstrap-wizard-validation-wizard-confirm-password">Confirmation
                                                mot de passe*</label>
                                            <input class="form-control" type="password" name="password_confirmation"
                                                placeholder="Confirmation de mot de passe" required="required" value="{{ old('password_confirmation') }}"
                                                id="bootstrap-wizard-validation-wizard-confirm-password"
                                                data-wizard-validate-confirm-password="true">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane px-sm-3 px-md-5 text-center" role="tabpanel"
                                aria-labelledby="bootstrap-wizard-validation-tab3"
                                id="bootstrap-wizard-validation-tab3">
                                <div class="d-flex justify-content-between">
                                    @foreach ($Packageslist as $package)
                                    <div class="col-md-4">
                                        <div class="col-md-12">{{$package->nom}}</div>
                                        <div class="col-md-12">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" id="{{$package->stripe_id}}" type="radio"
                                                    name="pack" value="{{$package->stripe_id}}" required/>
                                                <input type="hidden" name="priceId" value="{{$package->stripe_id}}" />
                                                <label class="form-check-label" for="{{$package->stripe_id}}">Choisir</label>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>
                                @error('pack')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror


                            </div>
                            <div class="tab-pane text-center px-sm-3 px-md-5" role="tabpanel"
                                aria-labelledby="bootstrap-wizard-validation-tab4"
                                id="bootstrap-wizard-validation-tab4">
                                <div class="d-flex justify-content-center">
                                   <img src="{{asset('assets/completed.jpeg')}}" style="width: 50%" alt="">
                                </div>
                                <h4 class="mb-3">Nous y sommes presque vous pouvez cliquez sur le boutton ci-dessous pour terminer le processus d'inscription!</h4>
                                <p>Nous vous sohaitons d'avance la bienvenue et une bonne expérience sur votre nouveau expace de travail Bilan pro</p>
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-success px-5 my-3" type="submit"> Valider L'inscription</button>
                                    <button onClick="window.location.reload();" class="btn px-5 my-3 btn-danger">Revenir en arrière</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer bg-light">
                    <div class="px-sm-3 px-md-5">
                        <ul class="pager wizard list-inline mb-0">
                            <li class="previous">
                                <button class="btn btn-link ps-0 d-none" type="button"><svg
                                        class="svg-inline--fa fa-chevron-left fa-w-10 me-2" data-fa-transform="shrink-3"
                                        aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-left"
                                        role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                                        data-fa-i2svg="" style="transform-origin: 0.3125em 0.5em;">
                                        <g transform="translate(160 256)">
                                            <g transform="translate(0, 0)  scale(0.8125, 0.8125)  rotate(0 0 0)">
                                                <path fill="currentColor"
                                                    d="M34.52 239.03L228.87 44.69c9.37-9.37 24.57-9.37 33.94 0l22.67 22.67c9.36 9.36 9.37 24.52.04 33.9L131.49 256l154.02 154.75c9.34 9.38 9.32 24.54-.04 33.9l-22.67 22.67c-9.37 9.37-24.57 9.37-33.94 0L34.52 272.97c-9.37-9.37-9.37-24.57 0-33.94z"
                                                    transform="translate(-160 -256)"></path>
                                            </g>
                                        </g>
                                    </svg>
                                    <!-- <span class="fas fa-chevron-left me-2" data-fa-transform="shrink-3"></span> Font Awesome fontawesome.com -->Précédent</button>
                            </li>
                            <li class="next">
                                <button class="btn btn-primary px-5 px-sm-6" type="submit">Etape suivante<svg
                                        class="svg-inline--fa fa-chevron-right fa-w-10 ms-2"
                                        data-fa-transform="shrink-3" aria-hidden="true" focusable="false"
                                        data-prefix="fas" data-icon="chevron-right" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""
                                        style="transform-origin: 0.3125em 0.5em;">
                                        <g transform="translate(160 256)">
                                            <g transform="translate(0, 0)  scale(0.8125, 0.8125)  rotate(0 0 0)">
                                                <path fill="currentColor"
                                                    d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"
                                                    transform="translate(-160 -256)"></path>
                                            </g>
                                        </g>
                                    </svg>
                                    <!-- <span class="fas fa-chevron-right ms-2" data-fa-transform="shrink-3"> </span> Font Awesome fontawesome.com --></button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

@section('scripts')
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
    $(function() {
    var $form = $(".require-validation");
    $('form.require-validation').bind('submit', function(e) {
        var $form = $(".require-validation"),
            inputSelector = ['input[type=email]', 'input[type=password]',
                'input[type=text]', 'input[type=file]',
                'textarea'
            ].join(', '),
            $inputs = $form.find('.required').find(inputSelector),
            $errorMessage = $form.find('div.error'),
            valid = true;
        $errorMessage.addClass('hide');
        $('.has-error').removeClass('has-error');
        $inputs.each(function(i, el) {
            var $input = $(el);
            if ($input.val() === '') {
                $input.parent().addClass('has-error');
                $errorMessage.removeClass('hide');
                e.preventDefault();
            }
        });
        if (!$form.data('cc-on-file')) {
            e.preventDefault();
            Stripe.setPublishableKey($form.data('stripe-publishable-key'));
            Stripe.createToken({
                number: $('.card-number').val(),
                cvc: $('.card-cvc').val(),
                exp_month: $('.card-expiry-month').val(),
                exp_year: $('.card-expiry-year').val()
            }, stripeResponseHandler);
        }
    });
    function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            /* token contains id, last4, and card type */
            var token = response['id'];
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
});
</script>
@endsection
